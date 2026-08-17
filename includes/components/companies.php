<?php
$COMPANY_NAMES = ['Kōwhai Legal', 'Aoraki Health', 'Pounamu Finance', 'Tāwhaki Tech', 'Waitaha Group', 'Southern Cross Trade', 'Harbour Immigration', 'Rimu Manufacturing'];
function company_initials(string $name): string
{
    $parts = explode(' ', $name);
    $init = '';
    foreach ($parts as $p) { $init .= mb_substr($p, 0, 1); }
    return mb_strtoupper(mb_substr($init, 0, 2));
}
$track = array_merge($COMPANY_NAMES, $COMPANY_NAMES);
?>
<section class="companies section-tight">
  <div class="container">
    <p class="companies-title"><?= htmlspecialchars(t('companies.title')) ?></p>
  </div>
  <div class="logo-marquee">
    <div class="logo-track">
      <?php foreach ($track as $name): ?>
        <span class="logo-chip">
          <span class="logo-chip-badge"><?= htmlspecialchars(company_initials($name)) ?></span>
          <?= htmlspecialchars($name) ?>
        </span>
      <?php endforeach; ?>
    </div>
  </div>
</section>
