<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('pages.industries.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('pages.industries.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('pages.industries.title'));
$hero_subtitle = htmlspecialchars(t('pages.industries.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';
require __DIR__ . '/includes/components/industries-grid.php';
require __DIR__ . '/includes/footer.php';
