# ManasAI website

A PHP website for **ManasAI Technology Private Limited**, focused on SakshiSense research wearables and raw signals for personalised wellness AI. No Node server, database, or frontend build is needed in production.

## Local preview

Requirements: PHP 8.1+ with `mbstring`, Python 3 for export/checks.

```sh
php -S 127.0.0.1:8765 scripts/serve.php
```

Visit http://127.0.0.1:8765. The local router mirrors public page routes; production uses Apache/LiteSpeed `.htaccess`.

## Validate and export

```sh
python3 scripts/check_site.py
python3 scripts/check_contact.py
python3 scripts/export_hostinger.py
```

Runtime files are exported to `dist/hostinger/` and `dist/manasai-hostinger.zip`. Private correction images, development scripts, and rate-limit data are excluded. Company registration details are maintained in `config/company.php`.

## Publishing

Repository: https://github.com/manasaitech/ManasAI-Website

- `main`: source, documentation, and export workflow.
- `hostinger-deployment`: generated runtime files at the branch root.
- `.github/workflows/hostinger.yml`: validates and publishes runtime files after a push to `main`, or on manual dispatch. It preserves deployment branch history and never force-pushes.

See [DEPLOYMENT.md](DEPLOYMENT.md) for Hostinger setup and production verification. Publishing `main` can trigger a live update if Hostinger auto-deployment is enabled.

## Content structure

- Home: positioning, wearable concepts, current focus, four research directions, platform loop, contact.
- SakshiSense: programme status, target signals, lab workflow, FAQs.
- Platform: Sense → Infer → Guide → Learn; stress/anxiety and attention/distraction first.
- Research: an overview of all four verticals and the four supplied papers.
- Dedicated verticals: `/devices`, `/ai-applications`, `/consciousness-research`, and `/physical-ai`.
- The Physical AI vertical includes Lindblad-inspired and Chern–Simons reservoir computing.
- CPCSci at ISS Delhi is featured as the consciousness research partner.
- Shared research content and publication metadata: `config/research.php`.
- Company: company identity, existing team, external affiliations, registration details.
- Careers: the six existing tracks, removed from the home hero.
- Contact: validated enquiry form with CSRF, honeypots, rate limits, and truthful email failure handling.
- Privacy: website enquiry handling.

Legacy `/about` and `/team` redirect to Company. `/devices` is now the dedicated Low-cost AI-powered devices vertical; SakshiSense remains its product page.

The wearable drawing is an editable SVG concept, not a product photograph. Waveforms are deterministic illustrations, not recorded sensor data. Hardware specifications and availability are intentionally left unclaimed where unconfirmed.

The visual palette follows the logo: navy (#082b62), blue, and cyan (#0097b2), with cool neutral surfaces.
