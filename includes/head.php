<?php
/**
 * Expects $PAGE_TITLE and optionally $PAGE_DESCRIPTION to be set before include.
 */
$PAGE_TITLE = $PAGE_TITLE ?? SITE_NAME;
$PAGE_DESCRIPTION = $PAGE_DESCRIPTION ?? t('hero.subtitle');
?><!DOCTYPE html>
<html lang="<?= htmlspecialchars($HTML_LANG) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BZXX656MV6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BZXX656MV6');
</script>

<title><?= htmlspecialchars($PAGE_TITLE) ?></title>
<meta name="description" content="<?= htmlspecialchars($PAGE_DESCRIPTION) ?>">
<link rel="icon" type="image/png" href="<?= asset('images/favicon-48x48.png') ?>">
<link rel="icon" type="image/svg+xml" href="<?= asset('images/favicon-48x48.svg') ?>">

<!-- Global site styles (ported 1:1 from the React build) -->
<link rel="stylesheet" href="<?= asset('css/global.css') ?>?v=<?= filemtime(SITE_ROOT . '/assets/css/global.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Header.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Footer.css') ?>">
<link rel="stylesheet" href="<?= asset('css/BackToHomeBar.css') ?>">
<link rel="stylesheet" href="<?= asset('css/FloatButtons.css') ?>">
<link rel="stylesheet" href="<?= asset('css/PopupForm.css') ?>">
<link rel="stylesheet" href="<?= asset('css/SuccessPopup.css') ?>">
<link rel="stylesheet" href="<?= asset('css/AboutSection.css') ?>?v=<?= filemtime(SITE_ROOT . '/assets/css/AboutSection.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Companies.css') ?>">
<link rel="stylesheet" href="<?= asset('css/CtaBanner.css') ?>">
<link rel="stylesheet" href="<?= asset('css/FaqAccordion.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Hero.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Herophonemockup.css') ?>">
<link rel="stylesheet" href="<?= asset('css/IndustriesGrid.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Process.css') ?>">
<link rel="stylesheet" href="<?= asset('css/ServicesGrid.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Stats.css') ?>">
<link rel="stylesheet" href="<?= asset('css/TestimonialsSection.css') ?>">
<link rel="stylesheet" href="<?= asset('css/WhyChooseUs.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Aichatfloat.css') ?>">
<link rel="stylesheet" href="<?= asset('css/ChatbotFloat.css') ?>">
<link rel="stylesheet" href="<?= asset('css/TopBar.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Blog.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Contact.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Languages.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Legal.css') ?>">
<link rel="stylesheet" href="<?= asset('css/NotFound.css') ?>">
<link rel="stylesheet" href="<?= asset('css/site-extra.css') ?>?v=<?= filemtime(SITE_ROOT . '/assets/css/site-extra.css') ?>">
<link rel="stylesheet" href="<?= asset('css/Tawkchat.css') ?>">
</head>
<body class="lang-<?= htmlspecialchars($CURRENT_LANG) ?>">