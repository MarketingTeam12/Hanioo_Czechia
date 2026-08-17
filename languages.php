<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$PAGE_TITLE = t('languagesPage.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('languagesPage.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('languagesPage.title'));
$hero_subtitle = htmlspecialchars(t('languagesPage.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';

$LANGUAGES = [
    ['English', '🇬🇧', true], ['Czech', '🇨🇿', true],
    ['Arabic', '🇸🇦', true], ['Chinese (Mandarin)', '🇨🇳', true],
    ['French', '🇫🇷', true], ['German', '🇩🇪', true],
    ['Hindi', '🇮🇳', true], ['Tamil', '🇮🇳', true],
    ['Malayalam', '🇮🇳', true], ['Telugu', '🇮🇳', true],
    ['Spanish', '🇪🇸', true], ['Japanese', '🇯🇵', true],
    ['Italian', '🇮🇹', true], ['Russian', '🇷🇺', true],
    ['Korean', '🇰🇷', false], ['Portuguese', '🇵🇹', false], ['Vietnamese', '🇻🇳', false],
    ['Thai', '🇹🇭', false], ['Indonesian', '🇮🇩', false], ['Samoan', '🇼🇸', false],
    ['Tongan', '🇹🇴', false], ['Fijian', '🇫🇯', false], ['Dutch', '🇳🇱', false],
    ['Polish', '🇵🇱', false], ['Turkish', '🇹🇷', false], ['Punjabi', '🇮🇳', false],
    ['Bengali', '🇧🇩', false], ['Urdu', '🇵🇰', false], ['Filipino', '🇵🇭', false],
    ['Swahili', '🇰🇪', false],
];
$popular = array_filter($LANGUAGES, fn($l) => $l[2]);
$alphabet = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
?>

<section class="section">
  <div class="container">
    <div class="lang-search">
      <?php icon('HiMagnifyingGlass', 18); ?>
      <input type="text" placeholder="<?= htmlspecialchars(t('languagesPage.searchPlaceholder')) ?>" id="lang-search-input">
    </div>

    <div class="alphabet-filter" id="lang-alphabet-filter">
      <button type="button" class="active" data-letter=""><?= htmlspecialchars(t('languagesPage.all')) ?></button>
      <?php foreach ($alphabet as $a): ?>
        <button type="button" data-letter="<?= $a ?>"><?= $a ?></button>
      <?php endforeach; ?>
    </div>

    <div id="lang-popular-block">
      <h2 class="lang-section-title"><?= htmlspecialchars(t('languagesPage.popular')) ?></h2>
      <div class="lang-grid">
        <?php foreach ($popular as [$name, $flag]): ?>
          <div class="lang-card"><span class="flag"><?= $flag ?></span><?= htmlspecialchars($name) ?></div>
        <?php endforeach; ?>
      </div>
      <h2 class="lang-section-title"><?= htmlspecialchars(t('languagesPage.all')) ?></h2>
    </div>

    <div class="lang-grid" id="lang-all-grid">
      <?php foreach ($LANGUAGES as [$name, $flag]): ?>
        <div class="lang-card" data-lang-name="<?= htmlspecialchars(mb_strtolower($name)) ?>"><span class="flag"><?= $flag ?></span><?= htmlspecialchars($name) ?></div>
      <?php endforeach; ?>
    </div>
    <p class="lang-empty" id="lang-empty-msg" hidden><?= htmlspecialchars(t('languagesPage.noResults')) ?></p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
