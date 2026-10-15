<?php
defined('ABSPATH') || exit;
add_filter('query_vars', function ($vars) { $vars[] = 'ote_page'; return $vars; });
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('ote-original', get_template_directory_uri() . '/assets/styles.css', [], filemtime(get_template_directory() . '/assets/styles.css'));
    wp_enqueue_script('ote-original', get_template_directory_uri() . '/assets/app.js', [], '1.0.0', ['strategy' => 'defer', 'in_footer' => true]);
});
function ote_data() {
    static $data;
    if (!isset($data)) {
        $fallback = json_decode(file_get_contents(get_template_directory() . '/defaults.json'), true);
        $data = get_option('ote_content', $fallback);
    }
    return $data;
}
function ote_url($page) { return $page === 'index' ? home_url('/') : add_query_arg('ote_page', $page, home_url('/')); }
function ote_photo($key, $file) { return ote_data()['photos'][$key] ?: get_template_directory_uri() . '/assets/' . $file; }
function ote_schedule_image() { return ote_data()['schedule_image'] ?: get_template_directory_uri() . '/assets/monthly-schedule.png'; }
function ote_month_title() { $d = ote_data(); return ($d['year'] !== '' ? $d['year'] . '年' : '') . $d['month'] . '月のレッスン予定'; }
function ote_news() {
    foreach (ote_data()['news'] as $n) {
        if (!$n['published']) continue;
        $linked = trim($n['url']) !== '';
        echo $linked ? '<a class="news-row" href="' . esc_url($n['url']) . '">' : '<div class="news-row">';
        echo '<span class="news-type">' . esc_html($n['label']) . '</span><span>' . esc_html($n['text']) . '</span>';
        if ($linked) echo '<span class="arrow" aria-hidden="true">↗</span>';
        echo $linked ? '</a>' : '</div>';
    }
}
function ote_faq() {
    foreach (ote_data()['faq'] as $f) echo '<details><summary>' . esc_html($f['question']) . '</summary><p>' . nl2br(esc_html($f['answer'])) . '</p></details>';
}
function ote_days() {
    foreach (ote_data()['days'] as $d) {
        echo '<div class="month-day"><div class="month-date"><strong>' . esc_html($d['day']) . '</strong><span>' . esc_html($d['weekday']) . '曜日</span></div><div>';
        if (!$d['events']) echo '<p class="month-rest">' . esc_html($d['note']) . '</p>';
        foreach ($d['events'] as $e) {
            echo '<div class="month-event"><time>' . esc_html($e['time'] ?: '時刻未記載') . '</time><span>' . esc_html($e['name']) . '</span>';
            if ($e['note'] !== '') echo '<small>' . esc_html($e['note']) . '</small>';
            echo '</div>';
        }
        echo '</div></div>';
    }
}
function ote_amount($amount) { return is_numeric($amount) ? number_format((float) $amount) : $amount; }
function ote_entry() {
    foreach (ote_data()['entry'] as $r) echo '<div><span class="eyebrow">' . esc_html($r['name']) . '</span><p class="price">' . esc_html(ote_amount($r['amount'])) . ' <small>' . esc_html($r['unit']) . '</small></p></div>';
}
function ote_fees($group) {
    foreach (ote_data()[$group] as $r) echo '<tr><td>' . esc_html($r['name']) . '</td><td>' . esc_html(ote_amount($r['amount'])) . '<small> ' . esc_html($r['unit']) . '</small></td></tr>';
}
