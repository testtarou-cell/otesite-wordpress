<?php
// Isolated renderer: validates theme output without a database. Not a WordPress substitute.
define('ABSPATH', __DIR__);
$theme = realpath(__DIR__ . '/../theme/ote-dance');
$scenario = $argv[2] ?? 'default';
$data = json_decode(file_get_contents($theme . '/defaults.json'), true);
function add_filter(...$args) {}
function add_action(...$args) {}
function get_template_directory() { global $theme; return $theme; }
function get_template_directory_uri() { return '/theme/ote-dance'; }
function get_option($name, $fallback) { global $data; return $data; }
function home_url($s) { return 'https://example.test' . $s; }
function add_query_arg($key,$val,$url) { return $url . '?' . $key . '=' . $val; }
function esc_html($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function esc_attr($v) { return esc_html($v); }
function esc_url($v) { return esc_html($v); }
function wp_head() { echo '<link rel="stylesheet" href="/theme/ote-dance/assets/styles.css">'; }
function wp_footer() { echo '<script src="/theme/ote-dance/assets/app.js" defer></script>'; }
function body_class() {}
function wp_body_open() {}
function sanitize_textarea_field($v) { return strip_tags($v); }
function esc_url_raw($v,$protocols) { return preg_match('~^https?://~',$v) ? $v : ''; }
function add_settings_error(...$args) {}
require $theme . '/functions.php';
require __DIR__ . '/../plugin/ote-content/ote-content.php';
if ($scenario === 'empty') {
    foreach (['news','faq','days','entry','general','junior','family','other'] as $g) $data[$g]=[];
}
if ($scenario === 'edited') {
    $data['faq'][] = ['question'=>'<script>alert(1)</script>テスト質問','answer'=>'回答'];
    $data['news'][] = ['label'=>'TEST','text'=>'追加のお知らせ','url'=>'https://example.test/news','published'=>true];
    $data['general'][]=['name'=>'追加コース','amount'=>'要相談','unit'=>''];
    $data['photos']['kids']='https://example.test/photo.jpg';
    $data['schedule_image']='https://example.test/schedule.jpg';
    $data['month']='12';
    $data['days'][]=['day'=>'31','weekday'=>'木','note'=>'追加予定','events'=>[]];
}
if ($scenario === 'sanitize') {
    $input=$data;$input['photos']['kids']='javascript:alert(1)';
    $clean=ote_clean_data(json_encode($input));
    if ($clean['photos']['kids'] !== '') throw new Exception('Unsafe URL retained');
    $input=$data;$input['days'][]=$input['days'][0];
    if (ote_clean_data($input) !== $data) throw new Exception('Duplicate day accepted');
    $input=$data;$input['year']='2026';$input['month']='2';$input['days']=[['day'=>'30','weekday'=>'月','note'=>'','events'=>[]]];
    if (ote_clean_data($input) !== $data) throw new Exception('Invalid calendar date accepted');
    foreach (['news','faq','days','entry','general','junior','family','other'] as $g) $input[$g]=[];
    $input['month']='2';$input['year']='';
    if (ote_clean_data($input)['faq'] !== []) throw new Exception('Empty list not saved');
    echo "Sanitization checks passed\n";exit;
}
$page=$argv[1] ?? 'index';
if (!in_array($page,['index','about','join','schedule','fees','privacy'],true)) exit(1);
require $theme . '/templates/' . $page . '.php';
