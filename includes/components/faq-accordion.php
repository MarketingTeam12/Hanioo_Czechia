<?php
/** Optional $showFilters (default true) may be set before include. */
$showFilters = $showFilters ?? true;
$faqItems = t_arr('faq.items');
$faqCategories = t_arr('faq.categories');
?>
<div class="faq-block" data-faq-block>
  <?php if ($showFilters): ?>
    <div class="faq-filters">
      <div class="faq-search">
        <?php icon('HiOutlineMagnifyingGlass', 18); ?>
        <input type="text" placeholder="<?= htmlspecialchars(t('faq.searchPlaceholder')) ?>" data-faq-search>
      </div>
      <div class="faq-categories">
        <button type="button" class="active" data-faq-category="all">
          <?= $faqCategories['all'] ?? 'All' ?>
        </button>
        <?php foreach ($faqCategories as $key => $label): if ($key === 'all') continue; ?>
          <button type="button" data-faq-category="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></button>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="faq-list">
    <?php foreach ($faqItems as $i => $item): ?>
      <div class="faq-item <?= $i === 0 ? 'open' : '' ?>" data-faq-item data-category="<?= htmlspecialchars($item['category'] ?? '') ?>" data-question="<?= htmlspecialchars(mb_strtolower($item['q'] ?? '')) ?>" data-answer="<?= htmlspecialchars(mb_strtolower($item['a'] ?? '')) ?>">
        <button type="button" class="faq-question" data-faq-toggle>
          <span><?= htmlspecialchars($item['q'] ?? '') ?></span>
          <?php icon('HiChevronDown', 20, 'faq-chevron'); ?>
        </button>
        <div class="faq-answer">
          <p><?= htmlspecialchars($item['a'] ?? '') ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
