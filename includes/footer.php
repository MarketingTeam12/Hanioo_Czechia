<?php
$isCz = is_maori();
$year = date('Y');
$CONTACT_EMAIL = 'sales@honeytranslations.com';
$CONTACT_PHONE = '+91 72990 05577';
$CONTACT_PHONE_TEL = 'tel:+917299005577';
$OFFICE_HOURS = $isCz ? 'Po - So, 8:00 - 18:00' : 'Mon - Sat, 8:00 AM - 6:00 PM';

$quickLinks = [
    [url(), t('nav.home')],
    [url('about.php'), $isCz ? 'O nás' : 'About Us'],
    [url('services.php'), t('nav.services')],
    [url('blog.php'), t('nav.blog')],
    [url('contact.php'), t('nav.contact')],
    [url('faq.php'), t('nav.faq')],
    [url('testimonials.php'), t('nav.testimonials')],
    [url('about-detail.php?key=why-choose-us'), $isCz ? 'Proč my' : 'Why Choose Us'],
];

$coreServices = [
    ['language-training', t('services.items.language-training.title') !== 'services.items.language-training.title' ? t('services.items.language-training.title') : 'Language Training', 'HiOutlineAcademicCap', 'blue'],
    ['translation-service', t('services.items.translation-service.title') !== 'services.items.translation-service.title' ? t('services.items.translation-service.title') : 'Translation Service', 'HiOutlineLanguage', 'blue'],
    ['offline-meetings-travel-booking', t('services.items.offline-meetings-travel-booking.title') !== 'services.items.offline-meetings-travel-booking.title' ? t('services.items.offline-meetings-travel-booking.title') : 'Offline Meetings & Travel Booking', 'HiOutlineBriefcase', 'green'],
    ['business-interpretation', t('services.items.business-interpretation.title') !== 'services.items.business-interpretation.title' ? t('services.items.business-interpretation.title') : 'Business Interpretation', 'HiOutlineBriefcase', 'pink'],
    ['conference-interpretation', t('services.items.conference-interpretation.title') !== 'services.items.conference-interpretation.title' ? t('services.items.conference-interpretation.title') : 'Conference Interpretation', 'HiOutlineMicrophone', 'gold'],
    ['medical-interpretation', t('services.items.medical-interpretation.title') !== 'services.items.medical-interpretation.title' ? t('services.items.medical-interpretation.title') : 'Medical Interpretation', 'HiOutlineHeart', 'pink'],
    ['community-interpretation', t('services.items.community-interpretation.title') !== 'services.items.community-interpretation.title' ? t('services.items.community-interpretation.title') : 'Community Interpretation', 'HiOutlineUsers', 'green'],
    ['secure-private', t('services.items.secure-private.title') !== 'services.items.secure-private.title' ? t('services.items.secure-private.title') : 'Secure & Private', 'HiOutlineShieldCheck', 'blue'],
];

$whyChooseUs = [
    t('whyChooseUs.items.certified.title') !== 'whyChooseUs.items.certified.title' ? t('whyChooseUs.items.certified.title') : 'Certified & Trusted Translation Experts',
    t('whyChooseUs.items.native.title') !== 'whyChooseUs.items.native.title' ? t('whyChooseUs.items.native.title') : 'Native Human Translators',
    t('whyChooseUs.items.fast.title') !== 'whyChooseUs.items.fast.title' ? t('whyChooseUs.items.fast.title') : 'Fast Turnaround Time',
    t('whyChooseUs.items.secure.title') !== 'whyChooseUs.items.secure.title' ? t('whyChooseUs.items.secure.title') : 'Confidential & Secure',
    t('whyChooseUs.items.pricing.title') !== 'whyChooseUs.items.pricing.title' ? t('whyChooseUs.items.pricing.title') : 'Affordable & Transparent Pricing',
    t('whyChooseUs.items.support.title') !== 'whyChooseUs.items.support.title' ? t('whyChooseUs.items.support.title') : '24/7 Customer Support',
];
?>
<?php require __DIR__ . '/components/cta-banner.php'; ?>
<footer class="site-footer">
  <div class="footer-edge-accent" aria-hidden="true"><span></span></div>

  <div class="footer-top">
    <div class="container footer-top-inner footer-top-inner--wide">
      <div class="footer-brand-block">
        <div class="footer-logo-card">
          <img src="<?= asset('images/logo-notext.png') ?>" alt="Hanioo Language Translation Services" class="footer-logo-img">
        </div>
        <p class="footer-tagline">
          <?= $isCz ? 'Propojujeme lidi prostřednictvím jazyka ' : 'Connecting people through language ' ?>
          <em><?= $isCz ? 'globálně.' : 'globally.' ?></em>
        </p>
        <span class="footer-live-badge">
          <span class="footer-live-dot" aria-hidden="true"></span>
          <?= $isCz ? 'Živě tlumočíme do češtiny' : 'Interpreting into Czech, live' ?>
        </span>
        <div class="social-row">
          <a href="https://www.facebook.com/profile.php?id=61592876055095" target="_blank" rel="noopener noreferrer" class="facebook" aria-label="Facebook"><?php icon('FaFacebookF', 16); ?></a>
          <a href="https://www.instagram.com/hanioo_app/" target="_blank" rel="noopener noreferrer" class="instagram" aria-label="Instagram"><?php icon('FaInstagram', 16); ?></a>
          <a href="mailto:<?= $CONTACT_EMAIL ?>" class="mail" aria-label="Email"><?php icon('HiOutlineEnvelope', 18); ?></a>
        </div>

        <div class="app-block">
          <h5><?= $isCz ? 'ZÍSKEJTE APLIKACI' : 'GET THE APP' ?></h5>
          <div class="store-badges">
            <a href="https://apkpure.com/hanioo/com.honey.hanioo" target="_blank" rel="noopener noreferrer" class="store-badge" aria-label="Get it on Google Play">
              <?php require SITE_ROOT . '/includes/svg/google-play.php'; ?>
              <span><em><?= $isCz ? 'ZÍSKAT NA' : 'GET IT ON' ?></em>Google Play</span>
            </a>
            <a href="<?= $APPSTORE_URL ?>" target="_blank" rel="noopener noreferrer" class="store-badge" aria-label="Download on the App Store">
              <?php require SITE_ROOT . '/includes/svg/app-store.php'; ?>
              <span><em><?= $isCz ? 'Stáhnout z' : 'DOWNLOAD ON THE' ?></em>App Store</span>
            </a>
          </div>
        </div>
      </div>

      <div class="footer-col footer-links-col">
        <h4><span class="footer-heading-ico"><?php icon('HiOutlineLink', 18); ?></span> <?= htmlspecialchars(t('footer.quickLinks')) ?></h4>
        <ul class="footer-link-list">
          <?php foreach ($quickLinks as [$path, $label]): ?>
            <li><a href="<?= htmlspecialchars($path) ?>"><?= htmlspecialchars($label) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="footer-col footer-services-col">
        <h4><span class="footer-heading-ico"><?php icon('HiOutlineBriefcase', 18); ?></span> <?= $isCz ? 'Naše služby' : 'Our Services' ?></h4>
        <ul class="footer-icon-list">
          <?php foreach ($coreServices as [$key, $label, $ic, $color]): ?>
            <li><a href="<?= url() ?>service-detail.php?key=<?= urlencode($key) ?>">
              <span class="footer-icon-list-ico footer-icon-list-ico--<?= $color ?>"><?php icon($ic, 16); ?></span>
              <span><?= htmlspecialchars($label) ?></span>
            </a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="footer-col footer-why-col">
        <h4><span class="footer-heading-ico"><?php icon('HiCheckCircle', 18); ?></span> <?= $isCz ? 'Proč my?' : 'Why Choose Us?' ?></h4>
        <ul class="footer-check-list">
          <?php foreach ($whyChooseUs as $label): ?>
            <li><?php icon('HiCheckCircle', 16, 'footer-check-list-ico'); ?><span><?= htmlspecialchars($label) ?></span></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="footer-col footer-contact-col">
        <h4><span class="footer-heading-ico">☎</span> <?= $isCz ? 'Kontaktujte nás' : 'Get In Touch' ?></h4>
        <ul class="footer-contact-list">
          <li><span class="contact-list-icon"><?php icon('HiOutlineGlobeAlt', 16); ?></span>
            <div><span class="contact-nowrap"><?= $isCz ? 'Globálně — dostupné po celém světě' : 'Global — Available Worldwide' ?></span></div></li>
          <li><span class="contact-list-icon"><?php icon('HiOutlinePhone', 16); ?></span>
            <div><a href="<?= $CONTACT_PHONE_TEL ?>" class="contact-nowrap"><?= $CONTACT_PHONE ?></a></div></li>
          <li><span class="contact-list-icon"><?php icon('HiOutlineEnvelope', 16); ?></span>
            <div><a href="mailto:<?= $CONTACT_EMAIL ?>" class="contact-nowrap"><?= $CONTACT_EMAIL ?></a></div></li>
        </ul>

        <div class="enrolled-row">
          <div class="enrolled-avatars">
            <span class="enrolled-avatar enrolled-avatar--pink"><?php icon('HiOutlineUser', 14); ?></span>
            <span class="enrolled-avatar enrolled-avatar--gold"><?php icon('HiOutlineUser', 14); ?></span>
            <span class="enrolled-avatar enrolled-avatar--green"><?php icon('HiOutlineUser', 14); ?></span>
            <span class="enrolled-avatar enrolled-avatar--blue"><?php icon('HiOutlineUser', 14); ?></span>
          </div>
          <p class="enrolled-text"><strong>1000+</strong> <?= $isCz ? 'lidí se zaregistrovalo' : 'Peoples are Enrolled' ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container footer-bottom-inner">
      <span>© <?= $year ?> Hanioo. <?= htmlspecialchars(t('footer.rights')) ?></span>
      <div class="footer-legal">
        <a href="<?= url() ?>privacy-policy.php"><?= htmlspecialchars(t('footer.privacy')) ?></a>
        <a href="<?= url() ?>terms.php"><?= htmlspecialchars(t('footer.terms')) ?></a>
      </div>
    </div>
  </div>
</footer>

<?php require SITE_ROOT . '/includes/floats.php'; ?>
<iframe name="zoho-lead-target" id="zoho-lead-target" style="display:none;" aria-hidden="true"></iframe>
<script>window.SITE_BASE = '<?= addslashes(base_url()) ?>';</script>
<script src="<?= asset('js/main.js') ?>" defer></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6a83f308273ff734411790f3/1k09mqmds';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>