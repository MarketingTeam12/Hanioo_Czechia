<?php
// Reusable icon grid for the "Why Choose Us" items — used on the home page
// section and on the about-detail.php?key=why-choose-us page.
$WHY_ITEMS = $WHY_ITEMS ?? [
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
<div class="why-grid" style="margin-top:6px;">
  <?php foreach ($WHY_ITEMS as [$key, $ic, $color]): ?>
    <div class="why-card" style="--why-color:<?= $color ?>;">
      <div class="why-icon" style="background:<?= $color ?>;box-shadow:0 10px 22px <?= $color ?>40;">
        <?php icon($ic, 24); ?>
      </div>
      <h3><?= htmlspecialchars(t("whyChooseUs.items.$key.title")) ?></h3>
      <p><?= htmlspecialchars(t("whyChooseUs.items.$key.desc")) ?></p>
    </div>
  <?php endforeach; ?>
</div>