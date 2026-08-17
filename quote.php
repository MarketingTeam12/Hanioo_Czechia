<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('pages.quote.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('pages.quote.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('pages.quote.title'));
$hero_subtitle = htmlspecialchars(t('pages.quote.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';
?>
<section class="section">
  <div class="container">
    <div class="quote-layout">
      <div class="contact-form glass-card">
        <?php require __DIR__ . '/includes/zoho-form.php'; ?>
      </div>
      <div class="quote-image-wrap">
        <img src="<?= asset('images/lang-team-1.jpg') ?>" alt="Team working together" class="quote-image">
      </div>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
