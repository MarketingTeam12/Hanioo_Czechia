<?php
$INDUSTRY_ITEMS = [
    ['healthcare', 'HiHeart'], ['legal', 'HiScale'],
    ['engineering', 'HiCog6Tooth'], ['education', 'HiAcademicCap'],
    ['government', 'HiBuildingLibrary'], ['finance', 'HiBanknotes'],
    ['insurance', 'HiShieldCheck'], ['construction', 'HiBuildingOffice2'],
    ['realEstate', 'HiHome'], ['travel', 'HiPaperAirplane'],
    ['tourism', 'HiMapPin'], ['automobile', 'HiTruck'],
    ['it', 'HiComputerDesktop'], ['software', 'HiCodeBracket'],
    ['manufacturing', 'HiCube'], ['media', 'HiFilm'],
    ['retail', 'HiShoppingBag'], ['food', 'HiCake'],
    ['energy', 'HiBolt'],
];
$items = isset($limit) ? array_slice($INDUSTRY_ITEMS, 0, $limit) : $INDUSTRY_ITEMS;
?>
<section class="industries-section section">
  <div class="container">
    <div class="section-header center">
      <span class="eyebrow"><?= htmlspecialchars(t('industries.eyebrow')) ?></span>
      <h2 class="section-title"><?= htmlspecialchars(t('industries.title')) ?></h2>
      <p class="section-subtitle"><?= htmlspecialchars(t('industries.subtitle')) ?></p>
    </div>
    <div class="industries-grid">
      <?php foreach ($items as [$key, $ic]): ?>
        <div class="industry-chip">
          <span class="industry-icon-badge"><?php icon($ic, 22); ?></span>
          <span><?= htmlspecialchars(t("industries.items.$key")) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
