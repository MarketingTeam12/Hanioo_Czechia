<?php
/**
 * Premium pre-footer CTA banner. Include right before <footer> so it
 * appears on every page. Requires $PLAYSTORE_URL to be defined (already
 * set in header.php) — falls back to the known Play Store link if not.
 */
$ctaIsCz = function_exists('is_maori') ? is_maori() : false;
$ctaPlaystore = $PLAYSTORE_URL ?? 'https://play.google.com/store/apps/details?id=com.honey.hanioo&hl=en_IN';
$ctaBadges = $ctaIsCz
    ? ['500+ firem', '119+ jazyků', 'Podpora 24/7', '99,8 % úspěšnost']
    : ['500+ businesses', '119+ languages', '24/7 support', '99.8% success rate'];
?>
<section class="cta-banner-pro">
  <div class="cta-banner-pro-glow cta-banner-pro-glow--gold" aria-hidden="true"></div>
  <div class="cta-banner-pro-glow cta-banner-pro-glow--white" aria-hidden="true"></div>
  <div class="cta-banner-pro-dots" aria-hidden="true"></div>
  <div class="container cta-banner-pro-inner">
    <div class="cta-banner-pro-content">
      <span class="cta-banner-pro-badge">
        <?php icon('HiOutlineShieldCheck', 13); ?>
        <?= $ctaIsCz ? 'PRÉMIOVÁ PODPORA' : 'PREMIUM SUPPORT' ?>
      </span>
      <h2><?= $ctaIsCz ? 'Potřebujete profesionálního tlumočníka?' : 'Need a Professional Interpreter?' ?></h2>
      <p>
        <?= $ctaIsCz
            ? 'Rezervujte certifikované tlumočníky ve 119+ jazycích pro obchod, právo, medicínu, konference a státní správu.'
            : 'Book certified interpreters in 119+ languages for business, legal, medical, conference, and government communication.' ?>
      </p>
      <div class="cta-banner-pro-tags">
        <?php foreach ($ctaBadges as $tag): ?>
          <span><?= htmlspecialchars($tag) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="cta-banner-pro-actions">
      <a href="<?= url('contact.php') ?>" class="cta-banner-pro-btn cta-banner-pro-btn--primary">
        <?php icon('HiArrowRight', 16); ?>
        <?= $ctaIsCz ? 'Vyžádat nabídku' : 'Request Quote' ?>
      </a>
      <a href="<?= $ctaPlaystore ?>" target="_blank" rel="noopener noreferrer" class="cta-banner-pro-btn cta-banner-pro-btn--ghost">
        <?php icon('HiOutlineArrowDownTray', 16); ?>
        <?= $ctaIsCz ? 'Stáhnout aplikaci' : 'Download App' ?>
      </a>
    </div>
  </div>
</section>