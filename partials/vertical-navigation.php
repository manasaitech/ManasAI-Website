<?php require_once __DIR__ . '/research-library.php'; ?>
<nav class="vertical-nav" aria-label="Research verticals">
  <?php foreach (research_library()['verticals'] as $slug => $item): ?>
  <a href="/<?= research_escape($slug) ?>" <?= ($vertical_slug ?? '') === $slug ? 'aria-current="page"' : '' ?>><span><?= research_escape($item['number']) ?></span> <?= research_escape($item['short']) ?></a>
  <?php endforeach; ?>
</nav>
