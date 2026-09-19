# Hostinger deployment

## Branches

Source repository: `manasaitech/ManasAI-Website`. Use `main` for edits and `hostinger-deployment` for Hostinger. The included workflow checks the PHP files, runs structural checks, exports a runtime-only site, and commits it to `hostinger-deployment`.

Enable GitHub Actions with repository content-write permission if the repository settings restrict it. A protected deployment branch must permit this workflow to update it. The workflow never force-pushes existing history.

## Shared hosting

Use PHP 8.1 or later with `mbstring`, Apache/LiteSpeed rewrite support, and PHP sessions. There is no Node runtime or build step on Hostinger.

Connect Hostinger Git deployment to this repository and branch `hostinger-deployment`, with the branch contents deployed to the website document root (usually `public_html`). If using automatic deployment, use the webhook mechanism shown by the Hostinger Git panel. Keep its secret URL out of the repository.

Use the host's HTTPS/SSL controls to enable and enforce HTTPS. The checked-in configuration does not assume a proxy-specific HTTPS header.

The deployment branch includes only runtime files. It does **not** include corrections, source scripts, documentation, local settings, or enquiry logs. `storage/` must be writable by PHP and is denied public access. Keep runtime `storage/ratelimit.json` untracked; do not use a deployment cleanup that deletes live runtime data.

## Email

The contact form sends to `admin@manasai.tech`, using `website@manasai.tech` as From and the visitor's email as Reply-To. Configure/verify that sender on the hosting account and ensure the domain's mail authentication and PHP mail transport are working. A successful PHP `mail()` result indicates transport acceptance, not confirmed inbox delivery. Failure is shown to the visitor with their text preserved.

The local QA uses an isolated fake mail transport. No real enquiry is sent during automated testing. After deployment, verify actual delivery with an authorised test message.

## Deployment checks

- Home and all five navigation destinations return correctly.
- `/about` and `/team` redirect to Company and Company#team.
- `/devices`, `/ai-applications`, `/consciousness-research`, and `/physical-ai` open dedicated vertical pages.
- An unknown route returns a genuine 404.
- `/storage/ratelimit.json`, `/config/company.php`, and `/partials/header.php` are denied.
- Test both the contact form and actual receipt at the destination mailbox.
- Confirm HTTPS and the 390px mobile layout.

For a manual upload, unpack `dist/manasai-hostinger.zip` into the document root. Preserve `.htaccess` files.

## Source truth

The company name, CIN, address, contact email, and branch name are reproduced from the owner's supplied details. The four modalities are target scope across the programme; sensor combinations, sample rates, interfaces, accuracy, battery life, delivery dates, and prices must be confirmed before making specifications public.
