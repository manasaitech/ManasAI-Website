<?php require_once __DIR__ . '/research-library.php'; ?>
<div class="pillar-grid">
  <?php foreach (research_library()['verticals'] as $slug => $vertical): ?>
  <a class="pillar" href="/<?= research_escape($slug) ?>"><span class="pillar-number"><?= research_escape($vertical['number']) ?> <span aria-hidden="true">↗</span></span><h3><?= research_escape($vertical['name']) ?></h3><p><?= research_escape(implode(' · ', $vertical['tags'])) ?></p><span class="pillar__link">Explore the vertical <span aria-hidden="true">→</span></span></a>
  <?php endforeach; ?>
</div>
