<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('testimonials.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('testimonials.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('testimonials.title'));
$hero_subtitle = htmlspecialchars(t('testimonials.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';
?>
<?php $hideSectionHeader = true; require __DIR__ . '/includes/components/testimonials-section.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>