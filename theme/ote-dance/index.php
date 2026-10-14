<?php
defined('ABSPATH') || exit;
$page = get_query_var('ote_page', 'index');
if (!in_array($page, ['index','about','join','schedule','fees','privacy'], true)) { $page = 'index'; }
require get_template_directory() . '/templates/' . $page . '.php';
