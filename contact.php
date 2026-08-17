<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('contact.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('contact.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('contact.title'));
$hero_subtitle = htmlspecialchars(t('contact.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';

$inPage = false;
require __DIR__ . '/includes/components/contact-form.php';
require __DIR__ . '/includes/footer.php';
