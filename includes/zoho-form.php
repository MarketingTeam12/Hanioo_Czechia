<?php
/**
 * Quote-request form markup. Submission is NOT handled here — this form
 * has no action/method because assets/js/main.js (initQuoteForm) hijacks
 * the submit event, validates the fields + reCAPTCHA, and posts the lead
 * straight to Zoho CRM (Web-to-Lead) via a hidden iframe (see
 * submitToZohoLead() and ZOHO_HIDDEN_FIELDS in main.js, and the
 * #zoho-lead-target iframe in includes/footer.php). The popup form and
 * the contact form work the same way. If you ever regenerate the Zoho
 * Web-to-Lead embed code, update ZOHO_HIDDEN_FIELDS and
 * ZOHO_RECAPTCHA_SITE_KEY in main.js to match the new values.
 */
$isCzQuote = is_maori();
?>
<form class="quote-request-form" id="quote-request-form" method="POST" novalidate>
  <div class="form-field">
    <label for="quote-fullName"><?= $isCzQuote ? 'Celé jméno' : 'Full Name' ?> <span class="req-star">*</span></label>
    <input id="quote-fullName" name="fullName" type="text" required>
  </div>

  <div class="form-field">
    <label for="quote-mobile"><?= $isCzQuote ? 'Mobilní telefon' : 'Mobile' ?> <span class="req-star">*</span></label>
    <input id="quote-mobile" name="mobile" type="tel" required>
  </div>

  <div class="form-field">
    <label for="quote-city"><?= $isCzQuote ? 'Město' : 'City' ?> <span class="req-star">*</span></label>
    <input id="quote-city" name="city" type="text" required>
  </div>

  <div class="form-field">
    <label for="quote-email"><?= $isCzQuote ? 'E-mail' : 'Email' ?></label>
    <input id="quote-email" name="email" type="email">
  </div>

  <div class="form-field">
    <label for="quote-description"><?= $isCzQuote ? 'Popis' : 'Description' ?></label>
    <textarea id="quote-description" name="description" rows="4"></textarea>
  </div>

  <div class="recaptcha-real-wrapper">
    <div id="quote-recaptcha-container"></div>
  </div>

  <button type="submit" class="btn btn-primary submit-btn"><?= $isCzQuote ? 'Odeslat' : 'Submit' ?></button>
</form>