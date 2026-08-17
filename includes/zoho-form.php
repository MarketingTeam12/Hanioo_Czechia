<?php
/**
 * Plain quote-request form. Zoho CRM Web-to-Lead wiring has been removed —
 * plug your own CRM/email endpoint into the <form action="..."> below (or
 * handle the POST in a small PHP script) when you're ready to go live.
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
