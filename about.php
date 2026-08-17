<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('pages.about.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('pages.about.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('pages.about.title'));
$hero_subtitle = htmlspecialchars(t('pages.about.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';
require __DIR__ . '/includes/components/about-section.php';
require __DIR__ . '/includes/components/stats.php';
require __DIR__ . '/includes/components/why-choose-us.php';
require __DIR__ . '/includes/footer.php';
