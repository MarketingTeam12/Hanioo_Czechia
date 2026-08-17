<?php
$STATS_ITEMS = [
    [120, '+', t('stats.languages')],
    [25000, '+', t('stats.translators')],
    [100000, '+', t('stats.projects')],
    [98, '%', t('stats.satisfaction')],
];
?>
<section class="stats-band">
  <div class="container stats-grid">
    <?php foreach ($STATS_ITEMS as [$end, $suffix, $label]): ?>
      <div class="stat-item">
        <strong class="js-countup" data-end="<?= $end ?>" data-suffix="<?= htmlspecialchars($suffix) ?>">0<?= htmlspecialchars($suffix) ?></strong>
        <span><?= htmlspecialchars($label) ?></span>
      </div>
    <?php endforeach; ?>
  </div>
</section>
