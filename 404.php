<?php
http_response_code(404);
$page = '404';
$page_title = 'Page not found — ManasAI';
include __DIR__ . '/partials/header.php';
?>
<section class="container page-intro"><span class="eyebrow">404 / Page not found</span><h1>A little<br><em>off course.</em></h1><p>The page may have moved. Explore SakshiSense or return to the homepage.</p><div class="actions"><a class="btn btn--primary" href="/">Back to home ↗</a><a class="text-link" href="/sakshisense">Explore SakshiSense →</a></div></section>
<?php include __DIR__ . '/partials/footer.php'; ?>
