<?php
$REVIEWS = [
    ['Eliška N.', 'Immigration Client, Prague', 'My visa documents were translated quickly and accepted without a single issue. Genuinely relieved I found this team.', 5, '#1E3A8A'],
    ['Jakub T.', 'Operations Manager, Brno', 'We localised our entire product manual set across six languages. Communication was clear from quote to delivery.', 5, '#0F766E'],
    ['Petra S.', 'HR Director, Ostrava', 'The certified translators understood our compliance requirements immediately. Highly recommend for legal documents.', 5, '#B45309'],
    ['Tomáš K.', 'Small Business Owner, Plzeň', 'Fast, friendly, and the pricing was upfront with no surprises. This is now our go-to translation partner.', 4, '#7E22CE'],
];
?>
<section class="testimonials-section section">
  <div class="container">
    <div class="section-header center">
      <span class="eyebrow"><?= htmlspecialchars(t('testimonials.eyebrow')) ?></span>
      <h2 class="section-title"><?= htmlspecialchars(t('testimonials.title')) ?></h2>
      <p class="section-subtitle"><?= htmlspecialchars(t('testimonials.subtitle')) ?></p>
    </div>

    <div class="site-carousel" data-autoplay="5000">
      <div class="site-carousel-track">
        <?php foreach ($REVIEWS as [$name, $role, $text, $rating, $color]): ?>
          <div class="site-carousel-slide">
            <div class="review-card">
              <div class="review-stars">
                <?php for ($s = 0; $s < 5; $s++): ?>
                  <?php icon('HiStar', 18, $s < $rating ? 'star-filled' : 'star-empty'); ?>
                <?php endfor; ?>
              </div>
              <p class="review-text">"<?= htmlspecialchars($text) ?>"</p>
              <div class="review-author">
                <div class="review-avatar" style="background:<?= $color ?>;"><?= htmlspecialchars(mb_substr($name, 0, 1)) ?></div>
                <div><strong><?= htmlspecialchars($name) ?></strong><span><?= htmlspecialchars($role) ?></span></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="site-carousel-pagination swiper-pagination"></div>
    </div>
  </div>
</section>
