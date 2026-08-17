<?php
/** Optional $limit variable (defaults to 8) may be set before include. */
$limit = $limit ?? 8;
$hideHeader = $hideHeader ?? false;
$hideCta = $hideCta ?? false;

$SERVICE_IMAGES = [
    'language-training' => 'images/services/svc-language-training.jpg',
    'translation-service' => 'images/services/svc-translation-service.jpg',
    'offline-meetings-travel-booking' => 'images/services/svc-offline-meetings.jpg',
    'business-interpretation' => 'images/services/svc-business-interpretation.jpg',
    'conference-interpretation' => 'images/services/svc-conference-interpretation.jpg',
    'medical-interpretation' => 'images/services/svc-medical-interpretation.jpg',
    'community-interpretation' => 'images/services/svc-community-interpretation.jpg',
    'secure-private' => 'images/services/svc-secure-private.jpg',
];
$SERVICE_ICONS = [
    'language-training' => 'HiOutlineAcademicCap',
    'translation-service' => 'HiOutlineLanguage',
    'offline-meetings-travel-booking' => 'HiOutlineBriefcase',
    'business-interpretation' => 'HiOutlineBriefcase',
    'conference-interpretation' => 'HiOutlineMicrophone',
    'medical-interpretation' => 'HiOutlineHeart',
    'community-interpretation' => 'HiOutlineUsers',
    'secure-private' => 'HiOutlineShieldCheck',
];
$SERVICE_HIGHLIGHTS = [
    'language-training' => ['Structured learning tracks', 'Certified language trainers', 'Progress tracking'],
    'translation-service' => ['Document translation', 'Certified translators', 'Fast turnaround'],
    'offline-meetings-travel-booking' => ['On-site interpreter booking', 'Travel & logistics support', 'Dedicated coordinator'],
    'business-interpretation' => ['Business meeting support', 'Industry-specific vocabulary', 'On-site or remote'],
    'conference-interpretation' => ['Simultaneous interpretation', 'Multi-language events', 'Professional equipment'],
    'medical-interpretation' => ['Clinic & hospital support', 'Patient-consultation interpreting', 'Compassionate, trained interpreters'],
    'community-interpretation' => ['Community & public services', 'Cultural sensitivity', 'Flexible scheduling'],
    'secure-private' => ['Confidential handling', 'Secure data practices', 'NDA-backed engagements'],
];
$keys = array_slice(array_keys($SERVICE_IMAGES), 0, $limit);
?>
<section class="services-grid-section section">
  <div class="container">
    <?php if (!$hideHeader): ?>
    <div class="section-header center">
      <span class="eyebrow"><?= htmlspecialchars(t('services.eyebrow')) ?></span>
      <h2 class="section-title"><?= htmlspecialchars(t('services.title')) ?></h2>
      <p class="section-subtitle"><?= htmlspecialchars(t('services.subtitle')) ?></p>
    </div>
    <?php endif; ?>

    <div class="services-grid">
      <?php foreach ($keys as $key): ?>
        <a href="<?= url() ?>service-detail.php?key=<?= urlencode($key) ?>" class="service-card">
          <div class="service-image">
            <img src="<?= asset($SERVICE_IMAGES[$key]) ?>" alt="<?= htmlspecialchars(t("services.items.$key.title")) ?>" loading="lazy">
            <div class="service-card-base">
              <h3><?= htmlspecialchars(t("services.items.$key.title")) ?></h3>
            </div>
            <div class="service-card-hover">
              <span class="service-hover-icon"><?php icon($SERVICE_ICONS[$key], 26); ?></span>
              <h3><?= htmlspecialchars(t("services.items.$key.title")) ?></h3>
              <p><?= htmlspecialchars(t("services.items.$key.desc")) ?></p>
              <ul class="service-hover-list">
                <?php foreach ($SERVICE_HIGHLIGHTS[$key] ?? [] as $point): ?>
                  <li><?php icon('HiCheck', 14); ?><span><?= htmlspecialchars($point) ?></span></li>
                <?php endforeach; ?>
              </ul>
              <span class="service-hover-btn"><?= htmlspecialchars(t('services.learnMore')) ?> <?php icon('HiArrowRight', 15); ?></span>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if (!$hideCta): ?>
    <div class="services-cta">
      <a href="<?= url() ?>services.php" class="btn btn-solid"><?= htmlspecialchars(t('services.viewAll')) ?></a>
    </div>
    <?php endif; ?>
  </div>
</section>