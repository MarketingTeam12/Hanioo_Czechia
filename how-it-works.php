<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('process.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('process.eyebrow');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('process.title'));
$hero_subtitle = htmlspecialchars(t('process.eyebrow'));
require __DIR__ . '/includes/components/page-hero.php';

$showHeader = false;
require __DIR__ . '/includes/components/process.php';
require __DIR__ . '/includes/footer.php';