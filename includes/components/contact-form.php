<?php
$inPage = $inPage ?? false;
$isCz = is_maori();
/* Service selection intentionally omitted from the contact form. */
/*
$SERVICE_OPTIONS = $isCz ? [
    'certified' => 'Whakamāoritanga Whakamanatia',
    'legal' => 'Whakamāoritanga Ture',
    'medical' => 'Whakamāoritanga Hauora',
    'technical' => 'Whakamāoritanga Hangarau',
    'business' => 'Whakamāori Pakihi',
    'website' => 'Whakamāori Paetukutuku',
    'software' => 'Whakamāori Pūmanawa',
    'interpretation' => 'Whakamāoritanga ā-Waha',
    'document' => 'Whakamāori Tuhinga',
] : [
    'certified' => 'Certified Translation',
    'legal' => 'Legal Translation',
    'medical' => 'Medical Translation',
    'technical' => 'Technical Translation',
    'business' => 'Business Translation',
    'website' => 'Website Translation',
    'software' => 'Software Localisation',
    'interpretation' => 'Interpretation',
    'document' => 'Document Translation',
];
*/
$RECAPTCHA_SITE_KEY = '6LcB03ktAAAAAJyuFlYhHR1WezhheGXV-OdELW_u';
?>

<section class="section">
  <div class="container contact-grid">
    <div class="contact-info-col">
      <div class="contact-info-card glass-card">
        <?php icon('HiOutlinePhone', 22); ?>
        <div>
          <h4><?= htmlspecialchars(t('contact.info.phone')) ?></h4>
          <p>+91 72990 05577</p>
        </div>
      </div>
      <div class="contact-info-card glass-card">
        <?php icon('HiOutlineEnvelope', 22); ?>
        <div>
          <h4><?= htmlspecialchars(t('contact.info.email')) ?></h4>
          <p>sales@honeytranslations.com</p>
        </div>
      </div>

      <a href="https://wa.me/917299005577" target="_blank" rel="noopener noreferrer" class="btn btn-solid whatsapp-cta">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.52 0-10 4.48-10 10 0 1.77.46 3.45 1.27 4.9L2 22l5.25-1.38a9.96 9.96 0 0 0 4.79 1.22c5.52 0 10-4.48 10-10s-4.48-10-10-10Zm0 18.2c-1.53 0-3-.4-4.29-1.16l-.31-.18-3.12.82.83-3.04-.2-.32A8.17 8.17 0 0 1 3.84 12c0-4.53 3.68-8.2 8.2-8.2s8.2 3.68 8.2 8.2-3.68 8.2-8.2 8.2Zm4.5-6.12c-.25-.12-1.47-.72-1.7-.8-.23-.08-.39-.12-.56.12-.16.25-.64.8-.79.96-.14.16-.29.18-.54.06-.25-.12-1.04-.38-1.99-1.22-.73-.65-1.23-1.46-1.37-1.71-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43.12-.15.16-.25.25-.42.08-.16.04-.31-.02-.43-.06-.12-.56-1.35-.77-1.85-.2-.48-.41-.42-.56-.43h-.48c-.16 0-.43.06-.65.31-.23.25-.86.84-.86 2.04 0 1.2.88 2.36 1 2.52.12.16 1.73 2.64 4.2 3.7.59.25 1.05.4 1.41.52.59.19 1.13.16 1.55.1.47-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.1-.23-.16-.48-.28Z"/></svg>
        <?= htmlspecialchars(t('common.whatsapp')) ?>
      </a>

      <div class="contact-map">
        <iframe title="office-map" src="https://www.google.com/maps?q=Prague%2C%20Czech%20Republic&output=embed" width="100%" height="260" style="border:0;border-radius:var(--radius-md);" loading="lazy"></iframe>
      </div>
    </div>

    <form class="contact-form glass-card" id="contact-form" novalidate>
      <div class="form-row two">
        <div class="form-field">
          <label for="fullName"><?= htmlspecialchars(t('contact.form.fullName')) ?></label>
          <input id="fullName" name="fullName" required>
          <span class="field-error" data-error-for="fullName" hidden><?= htmlspecialchars(t('contact.form.errors.required')) ?></span>
        </div>
        <div class="form-field">
          <label for="email"><?= htmlspecialchars(t('contact.form.email')) ?></label>
          <input id="email" name="email" type="email" required>
          <span class="field-error" data-error-for="email" hidden><?= htmlspecialchars(t('contact.form.errors.required')) ?></span>
        </div>
      </div>

      <div class="form-row two">
        <div class="form-field">
          <label for="phone"><?= htmlspecialchars(t('contact.form.phone')) ?></label>
          <input id="phone" name="phone" required>
          <span class="field-error" data-error-for="phone" hidden><?= htmlspecialchars(t('contact.form.errors.required')) ?></span>
        </div>
        <div class="form-field">
          <label for="country"><?= htmlspecialchars(t('contact.form.country')) ?></label>
          <input id="country" name="country" required>
          <span class="field-error" data-error-for="country" hidden><?= htmlspecialchars(t('contact.form.errors.required')) ?></span>
        </div>
      </div>

      <!-- Service selector intentionally removed. -->
      <?php /* <div class="form-field">
        <label for="service"><?= htmlspecialchars(t('contact.form.service')) ?></label>
        <select id="service" name="service" required>
          <option value="" disabled selected><?= htmlspecialchars(t('contact.form.servicePlaceholder')) ?></option>
          <?php foreach ($SERVICE_OPTIONS as $key => $label): ?>
            <option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></option>
          <?php endforeach; ?>
        </select>
        <span class="field-error" data-error-for="service" hidden><?= htmlspecialchars(t('contact.form.errors.required')) ?></span>
      </div> */ ?>

      <div class="form-field">
        <label for="message"><?= htmlspecialchars(t('contact.form.message')) ?></label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <span class="field-error" data-error-for="message" hidden><?= htmlspecialchars(t('contact.form.errors.required')) ?></span>
      </div>

      <div class="captcha-row" style="flex-direction:column;align-items:flex-start;gap:8px;">
        <div class="recaptcha-real-wrapper">
          <div id="contact-recaptcha-container"></div>
        </div>
      </div>
      <span class="field-error" data-error-for="captcha" hidden><?= htmlspecialchars(t('contact.form.errors.captcha')) ?></span>
      <span class="field-error" data-error-for="submit" style="display:none;margin-top:8px;"></span>

      <button type="submit" class="btn btn-primary submit-btn"><?= htmlspecialchars(t('contact.form.submit')) ?></button>
    </form>

  </div>
</section>

<div class="success-popup-backdrop" id="contact-success-backdrop" hidden>
  <div class="success-popup-overlay" id="contact-success-overlay"></div>
  <div class="success-popup-card">
    <button class="success-popup-close" id="contact-success-close" aria-label="Close">&times;</button>
    <div class="success-popup-icon"><?php icon('HiCheck', 30); ?></div>
    <h3><?= $isCz ? 'Děkujeme!' : 'Thank you!' ?></h3>
    <p><?= htmlspecialchars(t('contact.form.success')) ?></p>
  </div>
</div>
