#!/usr/bin/env python3
"""Check contact validation and delivery outcomes without sending real email."""
from pathlib import Path
import tempfile, shutil, subprocess, json, base64
from export_hostinger import ROOT, FILES

with tempfile.TemporaryDirectory(prefix='manasai-contact-') as tmp:
    root = Path(tmp)
    for name in FILES:
        dest = root/name
        dest.parent.mkdir(parents=True, exist_ok=True)
        shutil.copy2(ROOT/name, dest)
    sessions = root/'sessions'; sessions.mkdir()
    base = dict(name='QA Researcher',email='qa@example.invalid',org='Test Lab',topic='Research kit',message='Local QA only. This message must never leave the machine.',csrf='local-test-token')
    def run(data, transport='/usr/bin/true'):
        payload = base64.b64encode(json.dumps(data).encode()).decode()
        script = "session_id('manasai-qa'); session_start(); $_SESSION=['csrf'=>'local-test-token']; session_write_close(); $_SERVER['REQUEST_METHOD']='POST'; $_SERVER['REQUEST_URI']='/contact'; $_SERVER['REMOTE_ADDR']='127.0.0.1'; $_POST=json_decode(base64_decode('%s'),true); require '%s';" % (payload, root/'contact.php')
        result = subprocess.run(['php','-d',f'session.save_path={sessions}','-d',f'sendmail_path={transport}','-r',script], capture_output=True,text=True,check=True)
        assert not result.stderr, result.stderr
        return result.stdout
    cases = [
      ({'csrf':'wrong'}, 'session has expired'),
      ({'email':'invalid'}, 'valid email address'),
      ({'name':''}, 'fill in your name'),
      ({'name':'Injected\r\nBcc: anyone@example.invalid'}, 'remove line breaks'),
      ({'website':'spam'}, 'could not submit'),
      ({'topic':'Invented'}, 'choose a topic'),
      ({'message':'x'*5001}, 'shorten your message'),
      ({'name':['malformed']}, 'fill in your name'),
    ]
    for patch, expected in cases:
        html = run(base | patch)
        assert expected in html, (patch, expected)
    html=run(base | {'name':'<script>alert(1)</script>'}, '/usr/bin/false')
    assert 'could not send your message' in html
    assert '&lt;script&gt;' in html and '<script>alert(1)</script>' not in html
    assert base['message'] in html
    assert run(base) == '', 'Successful post should redirect before rendering'
    session = next(sessions.glob('sess_*')).read_text()
    assert 'contact_success|b:1' in session
    # Verify rate limit and absence of a false-success state.
    storage = root/'storage'/'ratelimit.json'
    records=json.loads(storage.read_text())
    for key,times in records.items(): records[key]=times*5
    storage.write_text(json.dumps(records))
    assert 'several enquiries' in run(base)
print('PASS: contact validation, CSRF, honeypot, input escaping, header injection, limits, delivery failure, successful redirect/session, rate limit. No email sent.')
