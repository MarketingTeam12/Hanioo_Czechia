<?php $checklist = t_arr('about.checklist'); $isCz = is_maori(); ?>
<section class="about-section section" id="about">
  <div class="container about-grid">
    <div class="about-image-wrap">
      <img src="<?= asset('images/about-illustration.png') ?>" alt="<?= htmlspecialchars(t('about.imageAlt')) ?>">
      <a href="<?= url() ?>about-detail.php?key=about-us" class="about-image-link" aria-label="<?= htmlspecialchars(t('nav.about')) ?>"></a>
      <div class="about-badge glass-card">
        <strong>120+</strong>
        <span><?= htmlspecialchars(t('about.experience')) ?></span>
      </div>
    </div>

    <div>
      <span class="eyebrow"><?= htmlspecialchars(t('about.eyebrow')) ?></span>
      <h2 class="section-title"><?= htmlspecialchars(t('about.title')) ?></h2>
      <p class="section-subtitle"><?= htmlspecialchars(t('about.description')) ?></p>

      <ul class="about-checklist">
        <?php foreach ($checklist as $item): ?>
          <li><?php icon('HiOutlineCheckCircle', 19, 'about-checklist-icon'); ?><span><?= htmlspecialchars($item) ?></span></li>
        <?php endforeach; ?>
      </ul>

      <a href="<?= url() ?>contact.php" class="btn btn-solid about-cta-btn"><?= htmlspecialchars(t('about.cta')) ?></a>
    </div>
  </div>
</section>