<?php
$isCz = is_maori(); // true when current language is Czech
$PLAYSTORE_URL = 'https://play.google.com/store/apps/details?id=com.honey.hanioo&hl=en_IN';
$APPSTORE_URL = 'https://apps.apple.com/in/iphone/search?term=hanioo';
?>
<header class="site-header" id="site-header">
  <div class="container header-inner">
    <a href="<?= url() ?>" class="logo" data-home-link>
      <img src="<?= asset('images/logo-notext.png') ?>" alt="Honey Language Translation Services LLC" class="brand-logo-img">
    </a>

    <nav class="main-nav" id="main-nav">
      <button type="button" class="nav-link-btn" data-home-link><?= htmlspecialchars(t('nav.home')) ?></button>
      <a class="nav-link-btn" href="<?= url() ?>about.php"><?= htmlspecialchars(t('nav.about')) ?></a>
      <a class="nav-link-btn" href="<?= url() ?>services.php"><?= htmlspecialchars(t('nav.services')) ?></a>
      <a class="nav-link-btn" href="<?= url() ?>how-it-works.php"><?= htmlspecialchars(t('nav.howItWorks')) ?></a>
      <a class="nav-link-btn" href="<?= url() ?>blog.php"><?= htmlspecialchars(t('nav.blog')) ?></a>
      <a class="nav-link-btn" href="<?= url() ?>contact.php"><?= htmlspecialchars(t('nav.contact')) ?></a>

      <div class="mobile-only header-mobile-store-badges">
        <a href="<?= $PLAYSTORE_URL ?>" target="_blank" rel="noopener noreferrer" class="header-store-badge" aria-label="Get it on Google Play">
          <?php require SITE_ROOT . '/includes/svg/google-play.php'; ?>
          <span><em><?= $isCz ? 'ZÍSKAT NA' : 'GET IT ON' ?></em>Google Play</span>
        </a>
        <a href="<?= $APPSTORE_URL ?>" target="_blank" rel="noopener noreferrer" class="header-store-badge" aria-label="Download on the App Store">
          <?php require SITE_ROOT . '/includes/svg/app-store.php'; ?>
          <span><em><?= $isCz ? 'Stáhnout z' : 'DOWNLOAD ON THE' ?></em>App Store</span>
        </a>
      </div>
    </nav>

    <div class="header-actions">
      <div class="lang-switch" id="lang-switch">
        <button type="button" class="lang-btn" id="lang-btn" aria-haspopup="listbox" aria-expanded="false">
          <?php icon('HiOutlineGlobeAlt', 16); ?>
          <span><?= $isCz ? 'Jazyk' : 'Language' ?></span>
          <?php icon('HiChevronDown', 13); ?>
        </button>
        <ul class="lang-dropdown" id="lang-dropdown" role="listbox" hidden>
          <li><a href="<?= lang_switch_url('en') ?>" class="<?= $CURRENT_LANG === 'en' ? 'active' : '' ?>">
            <span class="lang-flag-wrap" aria-hidden="true"><?php require SITE_ROOT . '/includes/svg/flag-gb.php'; ?></span>English</a></li>
          <li><a href="<?= lang_switch_url('cz') ?>" class="<?= $CURRENT_LANG === 'cz' ? 'active' : '' ?>">
            <span class="lang-flag-wrap" aria-hidden="true"><?php require SITE_ROOT . '/includes/svg/flag-cz.php'; ?></span>Čeština</a></li>
        </ul>
      </div>

      <div class="header-store-badges desktop-only">
        <a href="<?= $PLAYSTORE_URL ?>" target="_blank" rel="noopener noreferrer" class="header-store-badge" aria-label="Get it on Google Play">
          <?php require SITE_ROOT . '/includes/svg/google-play.php'; ?>
          <span><em><?= $isCz ? 'ZÍSKAT NA' : 'GET IT ON' ?></em>Google Play</span>
        </a>
        <a href="<?= $APPSTORE_URL ?>" target="_blank" rel="noopener noreferrer" class="header-store-badge" aria-label="Download on the App Store">
          <?php require SITE_ROOT . '/includes/svg/app-store.php'; ?>
          <span><em><?= $isCz ? 'Stáhnout z' : 'DOWNLOAD ON THE' ?></em>App Store</span>
        </a>
      </div>

      <button class="menu-toggle" id="menu-toggle" aria-label="Toggle menu">
        <?php icon('HiMenu', 26); ?>
      </button>
    </div>
  </div>
</header>

<?php require SITE_ROOT . '/includes/back-home-bar.php'; ?>
<?php require SITE_ROOT . '/includes/popup-form.php'; ?>