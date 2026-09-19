<?php
$page = $page ?? 'home';
$page_title = $page_title ?? 'ManasAI — Intelligence for inner wellbeing';
$page_desc = $page_desc ?? 'ManasAI is developing research wearables and a raw-signal platform for personalised wellness AI.';
$company = require __DIR__ . '/../config/company.php';
$nav = [
  'sakshisense' => ['/sakshisense', 'SakshiSense'],
  'platform' => ['/platform', 'Platform'],
  'research' => ['/research', 'Research'],
  'company' => ['/company', 'Company'],
  'contact' => ['/contact', 'Contact'],
];
$canonical_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="theme-color" content="#f5f8fc">
  <link rel="canonical" href="https://manasai.tech<?= htmlspecialchars($canonical_path) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://manasai.tech<?= htmlspecialchars($canonical_path) ?>">
  <meta property="og:image" content="https://manasai.tech/logo.png">
  <meta property="og:image:alt" content="ManasAI Technology">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <link rel="apple-touch-icon" href="/assets/img/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;450;500;550;600;650;700&family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/main.css?v=4">
</head>
<body class="page-<?= htmlspecialchars($page) ?>">
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header" id="site-header">
  <div class="container site-header__inner">
    <a href="/" class="brand" aria-label="ManasAI home"><img src="/app_icon.png" alt="" width="38" height="38"><span>Manas<span class="brand-ai">AI</span></span></a>
    <nav aria-label="Primary">
      <button class="nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="nav-list"><span></span><span></span></button>
      <ul class="nav-list" id="nav-list">
        <?php foreach ($nav as $key => [$href, $label]): ?>
        <li><a href="<?= $href ?>" class="<?= $page === $key ? 'is-active' : '' ?> <?= $key === 'contact' ? 'nav-contact' : '' ?>" <?= $page === $key ? 'aria-current="page"' : '' ?>><?= $label ?><?= $key === 'contact' ? ' <span aria-hidden="true">↗</span>' : '' ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
<main id="main">
