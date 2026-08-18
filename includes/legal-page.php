<?php
/** Expects $pageKey to be set before include (privacy | terms). */
$pageKey = $pageKey ?? 'privacy';
$PAGE_TITLE = t("pages.$pageKey.title") . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t("pages.$pageKey.subtitle");
require __DIR__ . '/head.php';
require __DIR__ . '/header.php';

$hero_title = htmlspecialchars(t("pages.$pageKey.title"));
$hero_subtitle = htmlspecialchars(t("pages.$pageKey.subtitle"));
require __DIR__ . '/components/page-hero.php';

$sections = t_arr("pages.$pageKey.sections");
$intro    = t_arr("pages.$pageKey.intro");
$contact  = t_arr("pages.$pageKey.contact");

// Richer schema (used by pages like Terms & Conditions / Privacy Policy) has
// numbered sub-items per section; older pages just have a single h/p per section.
$isRichFormat = !empty($sections) && (isset($sections[0]['items']) || isset($sections[0]['contactCard']));

/** Renders a bordered contact-details card (company name, address, email, phone). */
function render_legal_contact_card(array $card): void
{
    ?>
    <div class="legal-contact-card">
      <?php if (!empty($card['company'])): ?>
        <p class="legal-contact-company"><?= htmlspecialchars($card['company']) ?></p>
      <?php endif; ?>
      <ul class="legal-contact-list">
        <?php if (!empty($card['address'])): ?>
          <li><?php icon('HiOutlineMapPin', 18, 'legal-contact-icon'); ?><span><?= htmlspecialchars($card['address']) ?></span></li>
        <?php endif; ?>
        <?php if (!empty($card['email'])): ?>
          <li><?php icon('HiOutlineEnvelope', 18, 'legal-contact-icon'); ?><a href="mailto:<?= htmlspecialchars($card['email']) ?>"><?= htmlspecialchars($card['email']) ?></a></li>
        <?php endif; ?>
        <?php if (!empty($card['phone'])): ?>
          <li><?php icon('HiOutlinePhone', 18, 'legal-contact-icon'); ?><a href="tel:<?= htmlspecialchars(preg_replace('/\s+/', '', $card['phone'])) ?>"><?= htmlspecialchars($card['phone']) ?></a></li>
        <?php endif; ?>
      </ul>
    </div>
    <?php
}
?>
<section class="section">
  <div class="container legal-container">
    <p class="legal-updated"><?= htmlspecialchars(t("pages.$pageKey.updated")) ?></p>

    <?php if ($isRichFormat): ?>

      <?php if (!empty($sections)): ?>
        <nav class="legal-toc glass-card" aria-label="Table of contents">
          <p class="legal-toc-title">Table of Contents</p>
          <div class="legal-toc-grid">
            <?php foreach ($sections as $i => $s): ?>
              <a class="legal-toc-link" href="#<?= htmlspecialchars($s['id'] ?? ('section-' . ($i + 1))) ?>">
                <span class="legal-toc-num"><?= $i + 1 ?></span>
                <span><?= htmlspecialchars($s['h'] ?? '') ?></span>
              </a>
            <?php endforeach; ?>
          </div>
        </nav>
      <?php endif; ?>

      <?php foreach ($intro as $p): ?>
        <p class="legal-intro"><?= htmlspecialchars($p) ?></p>
      <?php endforeach; ?>

      <?php foreach ($sections as $i => $s): ?>
        <div class="legal-section legal-section--rich" id="<?= htmlspecialchars($s['id'] ?? ('section-' . ($i + 1))) ?>">
          <div class="legal-section-head">
            <span class="legal-section-num"><?= $i + 1 ?></span>
            <h2>
              <?php if (!empty($s['icon'])) icon($s['icon'], 20, 'legal-section-icon'); ?>
              <?= htmlspecialchars($s['h'] ?? '') ?>
            </h2>
          </div>

          <?php if (!empty($s['p'])): ?>
            <p class="legal-section-p"><?= htmlspecialchars($s['p']) ?></p>
          <?php endif; ?>

          <?php if (!empty($s['items'])): ?>
            <ol class="legal-items">
              <?php foreach ($s['items'] as $j => $item): ?>
                <?php
                  $isObj = is_array($item);
                  $label = $isObj ? ($item['label'] ?? '') : '';
                  $text  = $isObj ? ($item['text'] ?? '') : $item;
                ?>
                <li>
                  <span class="legal-item-num"><?= $i + 1 ?>.<?= $j + 1 ?></span>
                  <span class="legal-item-text">
                    <?php if ($label !== ''): ?><strong><?= htmlspecialchars($label) ?>:</strong> <?php endif; ?>
                    <?= htmlspecialchars($text) ?>
                  </span>
                </li>
              <?php endforeach; ?>
            </ol>
          <?php endif; ?>

          <?php if (!empty($s['note'])):
            $noteHtml = htmlspecialchars($s['note']);
            if (!empty($s['noteEmail'])) {
                $emailEsc = htmlspecialchars($s['noteEmail']);
                $noteHtml = str_replace(
                    $emailEsc,
                    '<a href="mailto:' . $emailEsc . '">' . $emailEsc . '</a>',
                    $noteHtml
                );
            }
          ?>
            <p class="legal-section-note"><?= $noteHtml ?></p>
          <?php endif; ?>

          <?php if (!empty($s['contactCard'])): ?>
            <?php render_legal_contact_card($s['contactCard']); ?>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>

      <?php if (!empty($contact)): ?>
        <div class="legal-contact glass-card">
          <h3><?= htmlspecialchars($contact['h'] ?? '') ?></h3>
          <?php if (!empty($contact['p'])): ?><p><?= htmlspecialchars($contact['p']) ?></p><?php endif; ?>
          <?php render_legal_contact_card($contact); ?>
        </div>
      <?php endif; ?>

    <?php else: ?>

      <?php foreach ($sections as $s): ?>
        <div class="legal-section">
          <h2><?= htmlspecialchars($s['h'] ?? '') ?></h2>
          <p><?= htmlspecialchars($s['p'] ?? '') ?></p>
        </div>
      <?php endforeach; ?>

    <?php endif; ?>
  </div>
</section>
<?php require __DIR__ . '/footer.php'; ?>