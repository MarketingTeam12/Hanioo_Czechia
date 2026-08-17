<?php
$isHome = ($CURRENT_PATH === '/' || $CURRENT_PATH === '/index.php')
  || basename($_SERVER['SCRIPT_NAME'] ?? '') === 'index.php';
?>
<?php if (!$isHome): ?>
<div class="back-home-bar" id="back-home-bar">
  <div class="container back-home-inner">
    <a class="back-home-link" href="<?= url() ?>">
      <?php icon('HiOutlineArrowLeft', 16); ?>
      <?= is_maori() ? 'Zpět' : 'Back' ?>
    </a>
  </div>
</div>
<?php endif; ?>
