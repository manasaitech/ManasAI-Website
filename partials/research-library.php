<?php
function research_library(): array {
    static $data;
    return $data ??= require __DIR__ . '/../config/research.php';
}
function research_escape(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function research_papers(array $keys, bool $compact = false): void {
    $papers = research_library()['papers'];
    echo '<div class="publication-list' . ($compact ? ' publication-list--compact' : '') . '">';
    foreach ($keys as $key) {
        $p = $papers[$key];
        echo '<article class="publication"><div class="publication__meta"><span class="publication__status' . ($p['status'] === 'Preprint' ? ' is-preprint' : '') . '">' . research_escape($p['status']) . '</span><span>' . research_escape($p['venue']) . '</span></div>';
        echo '<h3><a href="' . research_escape($p['url']) . '" target="_blank" rel="noopener">' . research_escape($p['title']) . ' <span aria-hidden="true">↗</span></a></h3>';
        echo '<p class="publication__authors">' . research_escape($p['authors']) . '</p>';
        if (!$compact) {
            echo '<p>' . research_escape($p['summary']) . '</p><p class="publication__connection">' . research_escape($p['connection']) . '</p>';
        }
        echo '<a class="text-link" href="' . research_escape($p['url']) . '" target="_blank" rel="noopener">' . research_escape($p['link_label']) . ' <span aria-hidden="true">↗</span></a></article>';
    }
    echo '</div>';
}
