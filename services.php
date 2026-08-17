<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('pages.services.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('pages.services.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('pages.services.title'));
$hero_subtitle = htmlspecialchars(t('pages.services.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';

$limit = 8;
$hideCta = true;
require __DIR__ . '/includes/components/services-grid.php';

require __DIR__ . '/includes/footer.php';