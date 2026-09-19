<?php
declare(strict_types=1);
session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Lax', 'cookie_secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')]);
header('Cache-Control: no-store');
$page = 'contact';
$page_title = 'Contact — Research kits & collaborations | ManasAI';
$page_desc = 'Discuss a SakshiSense research kit, raw-signal requirements, personalised wellness AI, or a collaboration with ManasAI.';
$topics = ['Research kit', 'Platform collaboration', 'Research enquiry', 'Collaboration', 'Internship', 'Device pilot', 'Bulk order', 'Press', 'Other'];
function field(array $source, string $key): string { return isset($source[$key]) && is_string($source[$key]) ? trim($source[$key]) : ''; }
function esc(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function rate_limited(): bool {
    $dir = __DIR__ . '/storage';
    if (!is_dir($dir) && !@mkdir($dir, 0700, true)) return false;
    $handle = @fopen($dir . '/ratelimit.json', 'c+');
    if (!$handle || !flock($handle, LOCK_EX)) return false;
    $now = time();
    $data = json_decode(stream_get_contents($handle) ?: '{}', true);
    if (!is_array($data)) $data = [];
    foreach ($data as $key => $times) {
        $data[$key] = is_array($times) ? array_values(array_filter($times, fn($t) => is_int($t) && $t > $now - 3600)) : [];
        if (!$data[$key]) unset($data[$key]);
    }
    // Trust the server's peer address, not arbitrary forwarded headers.
    $key = hash('sha256', ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . '|manasai-rate-limit');
    $limited = count($data[$key] ?? []) >= 5;
    if (!$limited) $data[$key][] = $now;
    rewind($handle);
    ftruncate($handle, 0);
    fwrite($handle, json_encode($data));
    fflush($handle);
    flock($handle, LOCK_UN);
    fclose($handle);
    return $limited;
}
$_SESSION['csrf'] ??= bin2hex(random_bytes(24));
$status = $_SESSION['contact_success'] ?? false;
unset($_SESSION['contact_success']);
$err = null;
$default_topic = field($_GET, 'topic');
$old = ['name' => '', 'email' => '', 'org' => '', 'topic' => in_array($default_topic, $topics, true) ? $default_topic : 'Research kit', 'message' => ''];
$limits = ['name' => 120, 'email' => 200, 'org' => 160, 'topic' => 60, 'message' => 5000];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = false;
    foreach ($old as $key => $_) $old[$key] = field($_POST, $key);
    if (!hash_equals($_SESSION['csrf'], field($_POST, 'csrf'))) {
        $err = 'Your form session has expired. Please try sending your message again.';
    } elseif (field($_POST, 'website') !== '' || field($_POST, 'address2') !== '') {
        $err = 'We could not submit this form. Please email admin@manasai.tech if you need help.';
    } elseif ($old['name'] === '' || $old['email'] === '' || $old['message'] === '') {
        $err = 'Please fill in your name, email, and message.';
    } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $err = 'Please enter a valid email address.';
    } elseif (!in_array($old['topic'], $topics, true)) {
        $err = 'Please choose a topic from the list.';
    } elseif (preg_match('/[\r\n]/', $old['email'] . $old['name'] . $old['topic'])) {
        $err = 'Please remove line breaks from your name, email, and topic.';
    } else {
        foreach ($limits as $key => $limit) {
            if (mb_strlen($old[$key]) > $limit) { $err = 'Please shorten your ' . $key . ' to ' . $limit . ' characters or fewer.'; break; }
        }
        if (!$err && preg_match_all('~https?://|www\.~i', $old['message']) > 5) $err = 'Please include no more than five links in your message.';
        if (!$err && rate_limited()) $err = 'There have been several enquiries from this connection. Please try again later or email admin@manasai.tech.';
        if (!$err) {
            $body = "Name: {$old['name']}\nEmail: {$old['email']}\nOrganisation: {$old['org']}\nTopic: {$old['topic']}\n\n{$old['message']}\n";
            $sent = @mail('admin@manasai.tech', 'ManasAI website — ' . $old['topic'], $body, ['From' => 'website@manasai.tech', 'Reply-To' => $old['email']]);
            if ($sent) {
                $_SESSION['contact_success'] = true;
                $_SESSION['csrf'] = bin2hex(random_bytes(24));
                header('Location: /contact?sent=1', true, 303);
                exit;
            }
            $err = 'The website could not send your message. Your text is still below. Please email admin@manasai.tech directly.';
        }
    }
}
include __DIR__ . '/partials/header.php';
?>
<section class="container page-intro"><span class="eyebrow">Let’s talk research</span><h1>Your question.<br><em>Our starting point.</em></h1><p>Planning a study, exploring raw-signal access, or building a personalised wellness model? Tell us what you need and we’ll discuss what’s possible.</p></section>
<section class="container section section--compact"><div class="contact-layout"><div>
<?php if ($status): ?>
<div class="card form-success" role="status"><h2 style="font-size:30px">Thank you for getting in touch.</h2><p>Your enquiry has been submitted. You can also reach our team at <a href="mailto:admin@manasai.tech">admin@manasai.tech</a>.</p><a class="text-link" href="/contact">Send another enquiry →</a></div>
<?php else: ?>
<?php if ($err): ?><div class="form-alert" role="alert"><?= esc($err) ?></div><?php endif; ?>
<form class="contact-form" method="post" action="/contact" autocomplete="on">
  <input type="hidden" name="csrf" value="<?= esc($_SESSION['csrf']) ?>">
  <div class="hp-field" aria-hidden="true"><label for="website">Website</label><input type="text" id="website" name="website" tabindex="-1" autocomplete="off"><label for="address2">Address line 2</label><input type="text" id="address2" name="address2" tabindex="-1" autocomplete="off"></div>
  <div class="contact-form__row"><div><label for="name">Your name *</label><input id="name" name="name" required maxlength="120" autocomplete="name" value="<?= esc($old['name']) ?>"></div><div><label for="email">Email *</label><input id="email" name="email" type="email" required maxlength="200" autocomplete="email" value="<?= esc($old['email']) ?>"></div></div>
  <div class="contact-form__row"><div><label for="org">Organisation <span>(optional)</span></label><input id="org" name="org" maxlength="160" autocomplete="organization" value="<?= esc($old['org']) ?>"></div><div><label for="topic">What would you like to discuss?</label><select id="topic" name="topic"><?php foreach ($topics as $topic): ?><option value="<?= esc($topic) ?>" <?= $old['topic'] === $topic ? 'selected' : '' ?>><?= esc($topic) ?></option><?php endforeach; ?></select></div></div>
  <div><label for="message">Your message *</label><textarea id="message" name="message" required maxlength="5000" placeholder="Tell us about your research question, required signals, preferred form factor, and timeline."><?= esc($old['message']) ?></textarea></div>
  <p class="form-note">We’ll use these details to respond to your enquiry. Please don’t include sensitive participant data. Read our <a href="/privacy">website privacy note</a>.</p>
  <div><button class="btn btn--primary" type="submit">Send enquiry <span aria-hidden="true">↗</span></button></div>
</form>
<?php endif; ?>
</div><aside><div class="card"><span class="card__tag">A direct line to the team</span><h3>Write to us</h3><p><a href="mailto:admin@manasai.tech">admin@manasai.tech ↗</a></p><p>For research kits, platform enquiries, and collaborations.</p></div><div class="card"><span class="card__tag">Useful details to include</span><h3>Help us scope your study.</h3><ul class="bullets"><li>Your research question and participant group.</li><li>Signals and raw-data access requirements.</li><li>Ring, wristband, or an open configuration.</li><li>Expected quantity and study timeline.</li></ul><p>SakshiSense is in development. Specifications, pricing, and availability are discussed directly.</p></div></aside></div></section>
<?php include __DIR__ . '/partials/footer.php'; ?>
