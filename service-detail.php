<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$services = require __DIR__ . '/data/services.php';
$key = $_GET['key'] ?? '';
$service = $services[$CURRENT_LANG][$key] ?? $services['en'][$key] ?? null;

/* The footer highlights interpretation specialties that share the same
 * booking flow as our core services. Keep their own readable URL and title
 * rather than sending visitors back to the general services page. */
$serviceAliases = [
    'en' => [
        'online-interpretation' => ['world-languages', 'Online Interpretation', 'Live, professional interpretation for calls, meetings, and remote conversations in the language you need.', 'images/services/svc-world-languages.jpg'],
        'medical-interpretation' => ['community-interpretation', 'Medical Interpretation', 'Clear, confidential interpretation support for appointments, consultations, and healthcare conversations.', 'images/services/svc-medical-interpretation.jpg'],
        'legal-interpretation' => ['translation-service', 'Legal Interpretation', 'Accurate, confidential interpretation for legal consultations, documents, and court-related conversations.', 'images/services/svc-translation-service.jpg'],
        'event-interpretation' => ['conference-interpretation', 'Event Interpretation', 'Professional multilingual interpretation that helps every event guest take part with confidence.', 'images/services/svc-conference-interpretation.jpg'],
        'interpreter-matching-booking' => ['world-languages', 'Interpreter Matching & Booking', 'Tell us your language and schedule, and we will match you with the right qualified interpreter.', 'images/services/svc-world-languages.jpg'],
    ],
    'cz' => [
        'online-interpretation' => ['world-languages', 'Online tlumočení', 'Živé, profesionální tlumočení pro hovory, schůzky a vzdálenou komunikaci v jazyce, který potřebujete.', 'images/services/svc-world-languages.jpg'],
        'medical-interpretation' => ['community-interpretation', 'Lékařské tlumočení', 'Jasná a důvěrná tlumočnická podpora pro schůzky, konzultace a rozhovory ve zdravotnictví.', 'images/services/svc-medical-interpretation.jpg'],
        'legal-interpretation' => ['translation-service', 'Právní tlumočení', 'Přesné a důvěrné tlumočení pro právní konzultace, dokumenty a soudní jednání.', 'images/services/svc-translation-service.jpg'],
        'event-interpretation' => ['conference-interpretation', 'Tlumočení akcí', 'Profesionální vícejazyčné tlumočení, díky kterému se může každý host akce sebejistě zapojit.', 'images/services/svc-conference-interpretation.jpg'],
        'interpreter-matching-booking' => ['world-languages', 'Vyhledání a rezervace tlumočníka', 'Sdělte nám jazyk a termín a my vás spojíme se správným kvalifikovaným tlumočníkem.', 'images/services/svc-world-languages.jpg'],
    ],
];

if (!$service && isset($serviceAliases[$CURRENT_LANG][$key])) {
    [$sourceKey, $title, $description, $image] = $serviceAliases[$CURRENT_LANG][$key];
    $service = $services[$CURRENT_LANG][$sourceKey] ?? $services['en'][$sourceKey] ?? null;
    if ($service) {
        $service['title'] = $title;
        $service['desc'] = $description;
        $service['image'] = $image;
    }
}

if (!$service) {
    header('Location: ' . url('services.php'));
    exit;
}

$isCz = is_maori();
$PAGE_TITLE = $service['title'] . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = $service['desc'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars($service['title']);
$hero_subtitle = htmlspecialchars($service['desc']);
require __DIR__ . '/includes/components/page-hero.php';
?>

<section class="section">
  <div class="container" style="max-width:1100px;margin:0 auto;">
    <div style="display:flex;flex-direction:column;gap:36px;">

      <div class="service-detail-top">
        <div class="service-detail-top-content">
          <h2 style="font-size:22px;color:var(--color-primary);margin-bottom:12px;font-weight:700;">
            <?= $isCz ? 'O službě' : 'About the Service' ?>
          </h2>
          <p style="font-size:15.5px;color:var(--color-text-light);line-height:1.8;">
            <?= htmlspecialchars($service['desc']) ?>
            <?= $isCz
                ? 'Spolupracujeme s prověřenými rodilými mluvčími s ověřenou odbornou kvalifikací, abychom dodali práci odpovídající odvětvové terminologii a místním standardům.'
                : 'We partner with vetted native-speaking translators who have verified domain credentials to deliver work that matches industry vocabulary and local standards.' ?>
          </p>
        </div>
        <a href="<?= url() ?>services.php" class="service-detail-top-image service-detail-top-visual">
          <img src="<?= asset($service['image']) ?>" alt="<?= htmlspecialchars($service['title']) ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block;">
        </a>
      </div>

      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;">
        <div class="glass-card" style="padding:24px;">
          <h3 style="font-size:18px;color:var(--color-primary);margin-bottom:16px;font-weight:700;"><?= $isCz ? 'Klíčové vlastnosti' : 'Key Features' ?></h3>
          <ul style="list-style:none;padding:0;display:grid;gap:12px;">
            <?php foreach ($service['features'] as $f): ?>
              <li style="display:flex;gap:10px;font-size:14.5px;color:var(--color-text-light);">
                <?php icon('HiOutlineCheckCircle', 20, ''); ?><span><?= htmlspecialchars($f) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="glass-card" style="padding:24px;">
          <h3 style="font-size:18px;color:var(--color-primary);margin-bottom:16px;font-weight:700;"><?= $isCz ? 'Hlavní výhody' : 'Core Benefits' ?></h3>
          <ul style="list-style:none;padding:0;display:grid;gap:12px;">
            <?php foreach ($service['benefits'] as $b): ?>
              <li style="display:flex;gap:10px;font-size:14.5px;color:var(--color-text-light);">
                <?php icon('HiOutlineCheckCircle', 20, ''); ?><span><?= htmlspecialchars($b) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <div>
        <h2 style="font-size:22px;color:var(--color-primary);margin-bottom:16px;font-weight:700;"><?= $isCz ? 'Průběh služby' : 'Service Workflow' ?></h2>
        <div style="display:grid;gap:16px;">
          <?php foreach ($service['workflow'] as $idx => $w): ?>
            <div class="glass-card" style="padding:16px 20px;display:flex;gap:16px;align-items:flex-start;">
              <div style="width:36px;height:36px;min-width:36px;border-radius:50%;background:var(--color-primary);color:#fff;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;"><?= $idx + 1 ?></div>
              <div>
                <h4 style="font-size:16px;color:var(--color-primary);margin-bottom:4px;font-weight:600;"><?= htmlspecialchars($w['title']) ?></h4>
                <p style="font-size:14px;color:var(--color-text-light);line-height:1.6;"><?= htmlspecialchars($w['desc']) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="glass-card" style="padding:28px;">
        <h3 style="font-size:18px;color:var(--color-primary);margin-bottom:16px;font-weight:700;">
          <?= $isCz ? 'Proč si vybrat nás pro ' . htmlspecialchars($service['title']) : 'Why Choose Us for ' . htmlspecialchars($service['title']) ?>
        </h3>
        <ul style="list-style:none;padding:0;display:grid;gap:12px;">
          <?php foreach ($service['whyChooseUs'] as $w): ?>
            <li style="display:flex;gap:10px;font-size:14.5px;color:var(--color-text-light);">
              <?php icon('HiOutlineCheckCircle', 20, ''); ?><span><?= htmlspecialchars($w) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <?php if (!empty($service['faqs'])): ?>
      <div>
        <h2 style="font-size:22px;color:var(--color-primary);margin-bottom:16px;font-weight:700;"><?= $isCz ? 'Často kladené otázky' : 'Frequently Asked Questions' ?></h2>
        <div style="display:flex;flex-direction:column;gap:12px;" data-simple-faq>
          <?php foreach ($service['faqs'] as $idx => $faq): ?>
            <div class="glass-card" style="padding:16px 20px;cursor:pointer;" data-simple-faq-item>
              <div style="display:flex;justify-content:space-between;align-items:center;">
                <h4 style="font-size:15.5px;color:var(--color-primary);font-weight:600;"><?= htmlspecialchars($faq['q']) ?></h4>
                <?php icon('HiChevronDown', 20, 'simple-faq-chevron'); ?>
              </div>
              <p style="font-size:14.5px;color:var(--color-text-light);margin-top:12px;line-height:1.7;display:none;"><?= htmlspecialchars($faq['a']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>