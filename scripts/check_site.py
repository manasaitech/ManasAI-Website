#!/usr/bin/env python3
"""Render every public PHP page and validate links, fragments, assets, and exports."""
from html.parser import HTMLParser
from pathlib import Path
from urllib.parse import urlsplit, unquote
import subprocess
from export_hostinger import ROOT, FILES, PAGES

class Page(HTMLParser):
    def __init__(self, content):
        super().__init__(convert_charrefs=True)
        self.ids, self.links, self.assets, self.h1, self.mains = set(), [], [], 0, 0
        self.feed(content)
    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        if 'id' in a:
            assert a['id'] not in self.ids, f'Duplicate id: {a["id"]}'
            self.ids.add(a['id'])
        if tag == 'a' and a.get('href'): self.links.append(a['href'])
        if tag in ('img', 'script') and a.get('src'): self.assets.append(a['src'])
        if tag == 'link' and a.get('rel') == 'stylesheet': self.assets.append(a['href'])
        if tag == 'h1': self.h1 += 1
        if tag == 'main': self.mains += 1

pages = {}
for name in PAGES:
    if name in ('about', 'team'): continue
    php = "$_SERVER['REQUEST_METHOD']='GET'; $_SERVER['REQUEST_URI']='/%s'; require '%s';" % ('' if name == 'index' else name, ROOT / (name+'.php'))
    result = subprocess.run(['php', '-d', 'session.save_path=/tmp', '-r', php], capture_output=True, text=True, check=True)
    assert not result.stderr, result.stderr
    page = Page(result.stdout)
    assert page.h1 == 1 and page.mains == 1, f'{name}: expected one h1 and main'
    assert 'Manas AI' not in result.stdout
    for phrase in ('Reserve a unit', 'Attentional Stability Index', 'Flagship · in field', 'now in the world', 'Founding institutions', 'Early practitioner'):
        assert phrase not in result.stdout, f'{name}: stale claim {phrase}'
    pages['/' if name == 'index' else '/'+name] = page
redirects = {'/about':'/company', '/team':'/company'}
for route, page in pages.items():
    for href in page.links:
        url = urlsplit(href)
        if url.scheme or url.netloc: continue
        destination = redirects.get(url.path, url.path) or route
        assert destination in pages, f'{route}: broken route {href}'
        if url.fragment: assert unquote(url.fragment) in pages[destination].ids, f'{route}: broken fragment {href}'
    for asset in page.assets:
        url = urlsplit(asset)
        if url.scheme or url.netloc: continue
        path = url.path.lstrip('/')
        assert path in FILES and (ROOT/path).is_file(), f'{route}: missing exported asset {path}'
assert all((ROOT/p).is_file() for p in FILES)
assert not any(p.startswith(('corrections/', 'docs/')) or p.endswith('ratelimit.json') for p in FILES)
print(f'PASS: {len(pages)} rendered pages, internal routes/anchors, referenced assets, one h1/main per page, stale claims, runtime export allowlist.')
