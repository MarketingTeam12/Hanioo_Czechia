<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

http_response_code(404);
$PAGE_TITLE = (is_maori() ? 'Stránka nenalezena' : 'Page Not Found') . ' — ' . SITE_NAME;
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<section class="not-found">
  <div class="container">
    <?php icon('HiOutlineFaceFrown', 64, 'not-found-icon'); ?>
    <h1>404</h1>
    <h2><?= htmlspecialchars(t('common.pageNotFound')) ?></h2>
    <p><?= htmlspecialchars(t('common.pageNotFoundText')) ?></p>
    <a href="<?= url() ?>" class="btn btn-primary"><?= htmlspecialchars(t('common.goHome')) ?></a>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
