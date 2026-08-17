<?php
/** Expects $pageKey to be set before include (privacy | terms | refund). */
$pageKey = $pageKey ?? 'privacy';
$PAGE_TITLE = t("pages.$pageKey.title") . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t("pages.$pageKey.subtitle");
require __DIR__ . '/head.php';
require __DIR__ . '/header.php';

$hero_title = htmlspecialchars(t("pages.$pageKey.title"));
$hero_subtitle = htmlspecialchars(t("pages.$pageKey.subtitle"));
require __DIR__ . '/components/page-hero.php';

$sections = t_arr("pages.$pageKey.sections");
?>
<section class="section">
  <div class="container legal-container">
    <p class="legal-updated"><?= htmlspecialchars(t("pages.$pageKey.updated")) ?></p>
    <?php foreach ($sections as $s): ?>
      <div class="legal-section">
        <h2><?= htmlspecialchars($s['h'] ?? '') ?></h2>
        <p><?= htmlspecialchars($s['p'] ?? '') ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php require __DIR__ . '/footer.php'; ?>
