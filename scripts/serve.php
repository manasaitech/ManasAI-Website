<?php
// Local PHP server router. Apache uses the production .htaccess instead.
$root = dirname(__DIR__);
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');
$pages = ['sakshisense','platform','research','company','careers','contact','privacy','about','team','devices','ai-applications','consciousness-research','physical-ai','404'];
if ($path === '/') { require $root . '/index.php'; return true; }
if (preg_match('~^/(assets/|app_icon\.png$|logo\.png$)~', $path)) {
    $file = realpath($root . $path);
    if ($file && str_starts_with($file, $root . DIRECTORY_SEPARATOR) && is_file($file)) return false;
}
$name = trim($path, '/');
if (in_array($name, $pages, true)) { require $root . '/' . $name . '.php'; return true; }
if (str_ends_with($name, '.php') && in_array(substr($name, 0, -4), array_merge($pages, ['index']), true)) {
    header('Location: /' . ($name === 'index.php' ? '' : substr($name, 0, -4)), true, 301); return true;
}
require $root . '/404.php';
