<?php
$WHY_ITEMS = [
    ['fast', 'HiOutlineBolt', '#D61F3A'],
    ['certified', 'HiOutlineCheckBadge', '#0A4FBF'],
    ['accuracy', 'HiOutlineShieldCheck', '#0F9D58'],
    ['pricing', 'HiOutlineCurrencyDollar', '#E8A317'],
    ['secure', 'HiOutlineLockClosed', '#041B47'],
    ['native', 'HiOutlineUserGroup', '#8E44AD'],
    ['support', 'HiOutlineClock', '#0891B2'],
    ['global', 'HiOutlineGlobeAlt', '#EA580C'],
];
?>
<section class="why-section section" style="background:var(--color-bg);">
  <div class="container">
    <div class="section-header center">
      <span class="eyebrow"><?= htmlspecialchars(t('whyChooseUs.eyebrow')) ?></span>
      <h2 class="section-title"><?= htmlspecialchars(t('whyChooseUs.title')) ?></h2>
    </div>
    <?php require __DIR__ . '/why-choose-us-grid.php'; ?>
  </div>
</section>