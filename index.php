<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = SITE_NAME . ' | ' . t('hero.title');
$PAGE_DESCRIPTION = t('hero.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<div id="home"><?php require __DIR__ . '/includes/components/hero.php'; ?></div>
<div id="about"><?php require __DIR__ . '/includes/components/about-section.php'; ?></div>
<?php require __DIR__ . '/includes/components/stats.php'; ?>
<div id="services"><?php $limit = 8; require __DIR__ . '/includes/components/services-grid.php'; ?></div>
<?php require __DIR__ . '/includes/components/why-choose-us.php'; ?>
<div id="how-it-works"><?php require __DIR__ . '/includes/components/process.php'; ?></div>
<div id="testimonials"><?php require __DIR__ . '/includes/components/testimonials-section.php'; ?></div>

<div id="faq">
  <div class="section-header center" style="margin-top:1.5rem;margin-bottom:0;">
    <span class="eyebrow"><?= htmlspecialchars(t('faq.eyebrow')) ?></span>
    <h2 class="section-title"><?= htmlspecialchars(t('faq.title')) ?></h2>
  </div>
  <section class="section-tight">
    <div class="container">
      <?php $showFilters = true; require __DIR__ . '/includes/components/faq-accordion.php'; ?>
    </div>
  </section>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>