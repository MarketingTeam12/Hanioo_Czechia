<?php
/** Expects $hero_title and $hero_subtitle to be set before include. */
$isCzHero = function_exists('is_maori') ? is_maori() : false;
$PAGE_HERO_GREETINGS = ['Hello', 'Bonjour', 'Hola', '你好', 'مرحبا', 'Guten Tag', 'Ciao', 'Привет'];
$pageHeroGreetingCount = count($PAGE_HERO_GREETINGS);
$pageHeroGreetingSlot = 16 / $pageHeroGreetingCount;
?>
<section class="page-hero">
  <div class="page-hero-lines" aria-hidden="true"></div>
  <div class="page-hero-rings" aria-hidden="true">
    <span class="page-hero-ring page-hero-ring--1"></span>
    <span class="page-hero-ring page-hero-ring--2"></span>
    <span class="page-hero-ring page-hero-ring--3"></span>
  </div>
  <div class="page-hero-orbit" aria-hidden="true">
    <span class="page-hero-orbit-dot" style="animation-delay:0s;"></span>
    <span class="page-hero-orbit-dot" style="animation-delay:-5s;"></span>
    <span class="page-hero-orbit-dot" style="animation-delay:-10s;"></span>
  </div>
  <div class="page-hero-glow page-hero-glow--gold" aria-hidden="true"></div>
  <div class="page-hero-glow page-hero-glow--blue" aria-hidden="true"></div>
  <div class="container" style="position:relative;z-index:2;">
    <span class="page-hero-badge">
      <?php icon('HiOutlineGlobeAlt', 14); ?>
      <?= $isCzHero ? 'Hanioo Česko' : 'Hanioo Czechia' ?>
    </span>
    <h1><?= $hero_title ?? '' ?></h1>
    <span class="page-hero-underline"></span>
    <p><?= $hero_subtitle ?? '' ?></p>
    <div class="page-hero-live">
      <span class="live-ticker">
        <span class="live-ticker-dot" aria-hidden="true"></span>
        <span class="live-ticker-label"><?= $isCzHero ? 'Živě tlumočíme z' : 'Live, interpreting from' ?></span>
        <span class="live-ticker-words" aria-hidden="true">
          <?php foreach ($PAGE_HERO_GREETINGS as $i => $word): ?>
            <span style="animation-delay:<?= round($i * $pageHeroGreetingSlot, 2) ?>s;"><?= htmlspecialchars($word) ?></span>
          <?php endforeach; ?>
        </span>
        <span class="live-ticker-label">&rarr; <?= $isCzHero ? 'češtiny' : 'Czech' ?></span>
      </span>
    </div>
  </div>
  <div class="page-hero-wave" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none">
      <path d="M0,32 C200,68 400,0 600,24 C800,48 1000,4 1200,30 L1200,60 L0,60 Z"></path>
    </svg>
  </div>
</section>