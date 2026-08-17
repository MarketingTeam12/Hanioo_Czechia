<?php
$isMaori = is_maori();

$HERO_FEATURES = [
    ['globe',   '120+',                 $isMaori ? 'Jazyků'            : 'Languages'],
    ['users',   $isMaori ? 'Odborní'     : 'Expert',        $isMaori ? 'tlumočníci'   : 'Interpreters'],
    ['shield',  $isMaori ? 'Přesné a'    : 'Accurate &',    $isMaori ? 'důvěrné'      : 'Confidential'],
    ['headset', $isMaori ? 'Osobně i'    : 'On-site &',     $isMaori ? 'na dálku'     : 'Remote'],
];
?>
<section class="hero-new" id="home">
  <div class="container hero-new-inner">
    <div class="hero-new-content">
      <h1 class="hero-new-title">
        <?= $isMaori ? 'Spojujeme jazyky.' : 'Bridging Language.' ?><br>
        <span class="hero-new-title-red"><?= $isMaori ? 'Propojujeme kultury.' : 'Connecting Cultures.' ?></span>
      </h1>

      <p class="hero-new-subtitle">
        <?php if ($isMaori): ?>
          Profesionální tlumočnické služby ve <strong class="hero-new-highlight">120+ jazycích</strong> pro bezproblémovou komunikaci po celém světě.
        <?php else: ?>
          Professional interpretation services in <strong class="hero-new-highlight">120+ languages</strong> for seamless communication worldwide.
        <?php endif; ?>
      </p>

      <div class="hero-new-ctas">
        <a href="<?= url() ?>contact.php" class="hero-new-btn hero-new-btn-primary">
          <?= $isMaori ? 'Kontaktujte nás' : 'Get in Touch' ?>
          <?php icon('HiOutlineArrowRight', 18); ?>
        </a>
        <a href="<?= url() ?>services.php" class="hero-new-btn hero-new-btn-outline">
          <?= $isMaori ? 'Naše služby' : 'Our Services' ?>
          <?php icon('HiOutlineArrowRight', 18); ?>
        </a>
      </div>

      <div class="hero-new-features">
        <?php foreach ($HERO_FEATURES as [$ic, $l1, $l2]): ?>
          <div class="hero-new-feature">
            <span class="hero-new-feature-icon">
              <?php if ($ic === 'globe'): ?>
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="9" stroke="#0D1B3D" stroke-width="1.6"/>
                  <path d="M3 12h18M12 3c2.5 2.4 3.8 5.6 3.8 9s-1.3 6.6-3.8 9c-2.5-2.4-3.8-5.6-3.8-9s1.3-6.6 3.8-9Z" stroke="#C41230" stroke-width="1.6"/>
                </svg>
              <?php elseif ($ic === 'users'): ?>
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="9.5" cy="8.5" r="3" stroke="#0D1B3D" stroke-width="1.6"/>
                  <path d="M3.75 19c0-3.1 2.6-5.3 5.75-5.3s5.75 2.2 5.75 5.3" stroke="#0D1B3D" stroke-width="1.6" stroke-linecap="round"/>
                  <circle cx="15.5" cy="7.5" r="2.5" stroke="#C41230" stroke-width="1.6"/>
                  <path d="M14.2 13.9c2.75.1 5.05 2.2 5.05 5.1" stroke="#C41230" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
              <?php elseif ($ic === 'shield'): ?>
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 3c2.4 1.7 4.8 2.2 7 2.4v6.4c0 5.2-3.9 8.3-7 9.7-3.1-1.4-7-4.5-7-9.7V5.4c2.2-.2 4.6-.7 7-2.4Z" stroke="#0D1B3D" stroke-width="1.6" stroke-linejoin="round"/>
                  <path d="M8.7 12.3l2.3 2.3 4.3-4.3" stroke="#C41230" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              <?php else: ?>
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 13v-1a8 8 0 0 1 16 0v1" stroke="#0D1B3D" stroke-width="1.6" stroke-linecap="round"/>
                  <rect x="3" y="13" width="4" height="5.5" rx="1.6" stroke="#0D1B3D" stroke-width="1.6"/>
                  <rect x="17" y="13" width="4" height="5.5" rx="1.6" stroke="#C41230" stroke-width="1.6"/>
                  <path d="M19 18.5v.5a3 3 0 0 1-3 3h-2.2" stroke="#C41230" stroke-width="1.6" stroke-linecap="round"/>
                  <circle cx="13.3" cy="22" r="1.1" fill="#C41230"/>
                </svg>
              <?php endif; ?>
            </span>
            <span class="hero-new-feature-text"><?= htmlspecialchars($l1) ?><br><?= htmlspecialchars($l2) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="hero-image-col">
      <div class="hero-image-frame">
        <img src="<?= asset('images/hero-video-call.png') ?>" alt="Hanioo certified interpreter on a live call" class="hero-video-image">
      </div>
    </div>
  </div>

  <div class="hero-new-wave" aria-hidden="true">
    <svg viewBox="0 0 1440 110" preserveAspectRatio="none">
      <defs>
        <linearGradient id="heroWaveNavy" x1="0" y1="0" x2="1440" y2="0" gradientUnits="userSpaceOnUse">
          <stop offset="0%" stop-color="#16305F"/>
          <stop offset="60%" stop-color="#0D1B3D"/>
          <stop offset="100%" stop-color="#0A1530"/>
        </linearGradient>
        <linearGradient id="heroWaveRed" x1="1160" y1="0" x2="1440" y2="110" gradientUnits="userSpaceOnUse">
          <stop offset="0%" stop-color="#E31E2C"/>
          <stop offset="100%" stop-color="#9C0D17"/>
        </linearGradient>
      </defs>

      <path d="M0,46 C280,72 620,14 960,34 C1160,46 1300,26 1440,38 L1440,110 L0,110 Z" fill="url(#heroWaveNavy)"></path>

      <path d="M1180,110 C1270,58 1370,42 1440,66 L1440,110 Z" fill="url(#heroWaveRed)"></path>

      <path d="M1180,110 C1270,58 1370,42 1440,66" fill="none" stroke="#E4C577" stroke-width="1" stroke-linecap="round" opacity="0.55"></path>
    </svg>
  </div>
</section>