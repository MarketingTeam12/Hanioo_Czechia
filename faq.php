<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('faq.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('faq.eyebrow');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('faq.title'));
$hero_subtitle = htmlspecialchars(t('faq.eyebrow'));
require __DIR__ . '/includes/components/page-hero.php';
?>
<section class="section">
  <div class="container">
    <?php $showFilters = true; require __DIR__ . '/includes/components/faq-accordion.php'; ?>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
