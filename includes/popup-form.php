<?php $isCz = is_maori(); ?>
<div class="popup-backdrop" id="popup-backdrop" hidden>
  <div class="popup-overlay" id="popup-overlay"></div>

  <div class="popup-card-wrapper" id="popup-card-wrapper">
    <div class="popup-card">
      <button class="popup-close-btn" id="popup-close-btn" aria-label="Close popup">
        <?php icon('HiX', 20); ?>
      </button>

      <div class="popup-header">
        <img src="<?= asset('images/logo-notext.png') ?>" alt="Hanioo" class="popup-logo">
        <h2><?= $isCz ? 'Váš důvěryhodný překladatelský partner v České republice' : 'Trusted Interpreter Partner For Czechia' ?></h2>
      </div>

      <div class="popup-success-message" id="popup-success-message" hidden>
        <div class="success-icon">✓</div>
        <h3><?= $isCz ? 'Děkujeme!' : 'Thank you!' ?></h3>
        <p><?= $isCz ? 'Váš požadavek byl úspěšně odeslán. Náš tým vás bude brzy kontaktovat.' : 'Your request has been submitted successfully. Our team will contact you shortly.' ?></p>
      </div>

      <form class="popup-form" id="popup-form">
        <div class="popup-error" id="popup-error" hidden></div>

        <div class="form-group">
          <label for="popup-fullName"><span class="label-notch"></span><?= $isCz ? 'Jméno' : 'Name' ?> <span class="req-star">*</span></label>
          <input id="popup-fullName" type="text" name="fullName" placeholder="<?= $isCz ? 'Zadejte své jméno' : 'Enter Your Name' ?>" required>
        </div>

        <div class="form-group">
          <label for="popup-phone"><span class="label-notch"></span><?= $isCz ? 'Mobilní telefon' : 'Mobile' ?> <span class="req-star">*</span></label>
          <input id="popup-phone" type="tel" name="phone" placeholder="<?= $isCz ? 'Zadejte své telefonní číslo' : 'Enter Your Mobile Number' ?>" required>
        </div>

        <div class="form-group">
          <label for="popup-email"><span class="label-notch"></span><?= $isCz ? 'E-mail' : 'Email' ?></label>
          <input id="popup-email" type="email" name="email" placeholder="<?= $isCz ? 'Zadejte svůj e-mail' : 'Enter Your Email' ?>">
        </div>

        <div class="form-group">
          <label for="popup-city"><span class="label-notch"></span><?= $isCz ? 'Město' : 'City' ?> <span class="req-star">*</span></label>
          <input id="popup-city" type="text" name="city" placeholder="<?= $isCz ? 'Zadejte své město' : 'Enter Your City' ?>" required>
        </div>

        <div class="form-group">
          <label for="popup-message"><span class="label-notch"></span><?= $isCz ? 'Zpráva (volitelné)' : 'Message (Optional)' ?></label>
          <textarea id="popup-message" name="message" placeholder="<?= $isCz ? 'Zadejte svou zprávu' : 'Enter Your Message' ?>" rows="3"></textarea>
        </div>

        <div class="recaptcha-real-wrapper">
          <div id="popup-recaptcha-container"></div>
        </div>

        <p class="privacy-note">
          <?= $isCz ? 'Odesláním tohoto formuláře souhlasíte s našimi ' : 'By submitting this form, you agree to our ' ?>
          <a href="<?= url() ?>privacy-policy.php"><?= $isCz ? 'Zásadami ochrany osobních údajů' : 'Privacy Policy' ?></a>.
        </p>

        <button type="submit" class="btn popup-submit-btn btn-solid" id="popup-submit-btn">
          <?= $isCz ? 'Odeslat dotaz' : 'Send Enquiry' ?>
        </button>
      </form>

    </div>
  </div>
</div>