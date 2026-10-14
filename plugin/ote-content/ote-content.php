<?php
/**
 * Plugin Name: O・TE コンテンツ管理
 * Description: お知らせ・写真・FAQ・月間予定・料金の編集。テーマ変更後もデータを保持します。
 * Version: 1.0.0
 * Requires PHP: 8.0
 */
defined('ABSPATH') || exit;
function ote_content_defaults() { return json_decode(file_get_contents(__DIR__ . '/defaults.json'), true); }
function ote_clean_record($value, $schema) {
    $result = [];
    foreach ($schema as $key => $kind) {
        $v = $value[$key] ?? ($kind === 'bool' ? false : '');
        $result[$key] = $kind === 'bool' ? (bool) $v : ($kind === 'url' ? esc_url_raw(is_scalar($v) ? (string) $v : '', ['http', 'https']) : sanitize_textarea_field(is_scalar($v) ? (string) $v : ''));
    }
    return $result;
}
function ote_clean_data($input) {
    $old = get_option('ote_content', ote_content_defaults());
    $raw = is_string($input) ? json_decode($input, true) : $input;
    if (!is_array($raw)) { add_settings_error('ote_content', 'json', '入力データが不正です。保存しませんでした。'); return $old; }
    $schema = ['news'=>['label'=>'text','text'=>'text','url'=>'url','published'=>'bool'], 'faq'=>['question'=>'text','answer'=>'text']];
    foreach (['entry','general','junior','family','other'] as $g) $schema[$g] = ['name'=>'text','amount'=>'text','unit'=>'text'];
    $out = [];
    foreach ($schema as $group=>$fields) {
        if (!isset($raw[$group]) || !is_array($raw[$group])) { add_settings_error('ote_content', 'schema', '入力項目が不足しています。保存しませんでした。'); return $old; }
        $out[$group] = array_map(fn($r)=>ote_clean_record(is_array($r) ? $r : [], $fields), array_values($raw[$group]));
    }
    $out['photos'] = ote_clean_record(is_array($raw['photos'] ?? null) ? $raw['photos'] : [], ['kids'=>'url','general'=>'url','family'=>'url']);
    $out += ote_clean_record($raw, ['schedule_image'=>'url','schedule_alt'=>'text','year'=>'text','month'=>'text']);
    $m = filter_var($out['month'], FILTER_VALIDATE_INT);
    $y = $out['year'] === '' ? null : filter_var($out['year'], FILTER_VALIDATE_INT);
    if (!$m || $m < 1 || $m > 12 || ($y !== null && (!$y || $y < 1900 || $y > 9999))) { add_settings_error('ote_content','date','年月を確認してください。年は空欄でも保存できます。'); return $old; }
    if (!isset($raw['days']) || !is_array($raw['days'])) return $old;
    $out['days'] = [];
    $seen = [];
    foreach ($raw['days'] as $day) {
        if (!is_array($day)) return $old;
        $d = ote_clean_record($day, ['day'=>'text','weekday'=>'text','note'=>'text']);
        $number = filter_var($d['day'], FILTER_VALIDATE_INT);
        if (!$number || $number < 1 || $number > 31 || isset($seen[$number]) || !in_array($d['weekday'], ['月','火','水','木','金','土','日'], true) || ($y !== null && !checkdate($m, $number, $y))) { add_settings_error('ote_content','day','日付・曜日・重複を確認してください。保存しませんでした。'); return $old; }
        $seen[$number] = true;
        $d['events'] = array_map(fn($r)=>ote_clean_record(is_array($r) ? $r : [], ['time'=>'text','name'=>'text','note'=>'text']), array_values(is_array($day['events'] ?? null) ? $day['events'] : []));
        $out['days'][] = $d;
    }
    usort($out['days'], fn($a,$b)=>(int)$a['day'] <=> (int)$b['day']);
    return $out;
}
add_action('admin_init', function () { register_setting('ote_content_group','ote_content',['sanitize_callback'=>'ote_clean_data']); });
add_action('admin_menu', function () { add_menu_page('O・TE コンテンツ','O・TE コンテンツ','manage_options','ote-content','ote_content_screen','dashicons-edit-page'); });
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook !== 'toplevel_page_ote-content') return;
    wp_enqueue_media();
    wp_enqueue_script('ote-editor',plugins_url('editor.js',__FILE__),[], '1.0.0',true);
    wp_localize_script('ote-editor','oteEditor',['data'=>get_option('ote_content',ote_content_defaults())]);
});
function ote_content_screen() {
    if (!current_user_can('manage_options')) return;
    echo '<div class="wrap"><h1>O・TE コンテンツ</h1><p>初回は元サイトの内容を表示します。「変更を保存」で登録してください。追加・削除・並べ替え後も保存が必要です。</p><p>画像と日付別予定は別々に更新してください。年未確認の場合は年を空欄にできます。曜日は元資料に合わせて設定してください。</p>';
    settings_errors();
    echo '<form method="post" action="options.php" id="ote-form">';
    settings_fields('ote_content_group');
    echo '<div id="ote-editor"></div><textarea name="ote_content" id="ote-json" hidden></textarea><noscript>編集にはJavaScriptを有効にしてください。</noscript>';
    submit_button('変更を保存');
    echo '</form></div>';
}
