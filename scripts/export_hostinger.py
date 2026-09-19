#!/usr/bin/env python3
"""Export only runtime files for PHP shared hosting; no build dependencies."""
from pathlib import Path
import shutil
import zipfile

ROOT = Path(__file__).resolve().parents[1]
OUT = ROOT / 'dist' / 'hostinger'
PAGES = ['index', 'sakshisense', 'platform', 'research', 'company', 'careers', 'contact', 'privacy', 'about', 'team', 'devices', 'ai-applications', 'consciousness-research', 'physical-ai', '404']
FILES = ['.htaccess', 'app_icon.png', 'logo.png', 'config/company.php', 'config/research.php', 'storage/.htaccess', 'assets/css/main.css', 'assets/js/main.js', 'assets/img/favicon.png', 'assets/img/devices/sakshisense-concept.svg', 'assets/img/team/jyotiranjan-beuria.jpeg', 'assets/img/team/rajat-garg.jpg', 'assets/img/team/akash-sharma.jpeg']
FILES += [p + '.php' for p in PAGES]
FILES += [str(p.relative_to(ROOT)) for p in (ROOT / 'partials').glob('*.php')]

def export():
    # Only the generated export directory is replaced; never touch server storage.
    if OUT.exists(): shutil.rmtree(OUT)
    OUT.mkdir(parents=True)
    for relative in sorted(FILES):
        target = OUT / relative
        target.parent.mkdir(parents=True, exist_ok=True)
        shutil.copy2(ROOT / relative, target)
    archive = ROOT / 'dist' / 'manasai-hostinger.zip'
    with zipfile.ZipFile(archive, 'w', zipfile.ZIP_DEFLATED) as z:
        for p in sorted(OUT.rglob('*')):
            if p.is_file(): z.write(p, p.relative_to(OUT))
    print(f'Exported {len(FILES)} runtime files to {OUT}')
    print(f'Archive: {archive} ({archive.stat().st_size:,} bytes)')

if __name__ == '__main__': export()
