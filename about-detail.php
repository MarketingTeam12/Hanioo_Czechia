<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$aboutContent = require __DIR__ . '/data/about-detail.php';
$key = $_GET['key'] ?? '';
$page = $aboutContent[$CURRENT_LANG][$key] ?? null;

if (!$page) {
    header('Location: ' . url('about.php'));
    exit;
}

$isCz = is_maori();
$PAGE_TITLE = $page['title'] . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = $page['subtitle'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars($page['title']);
$hero_subtitle = htmlspecialchars($page['subtitle']);
require __DIR__ . '/includes/components/page-hero.php';
?>

<section class="section">
  <div class="container" style="max-width:1080px;margin:0 auto;">
    <div style="display:grid;grid-template-columns:1fr;gap:36px;">

      <?php if (empty($page['isCeo'])): ?>
        <div class="about-intro-row" style="display:grid;grid-template-columns:<?= !empty($page['image']) ? '1fr 1fr' : '1fr' ?>;gap:32px;align-items:center;">
          <div class="glass-card" style="padding:28px;border-left:4px solid var(--color-primary);">
            <p style="font-size:16px;line-height:1.8;font-weight:500;color:var(--color-primary);"><?= htmlspecialchars($page['intro']) ?></p>
          </div>
          <?php if (!empty($page['image'])): ?>
            <div style="border-radius:14px;overflow:hidden;aspect-ratio:4/3;width:100%;box-shadow:var(--shadow-medium);">
              <?php $imgSrc = str_starts_with($page['image'], 'http') ? $page['image'] : asset($page['image']); ?>
              <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= htmlspecialchars($page['title']) ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:center 30%;display:block;">
            </div>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <div class="ceo-block" style="display:grid;grid-template-columns:340px 1fr;gap:32px;align-items:center;">
          <div style="border-radius:16px;overflow:hidden;width:100%;aspect-ratio:3/4;box-shadow:0 14px 36px rgba(0,0,0,0.18);flex-shrink:0;">
            <img src="<?= asset($page['ceoImage']) ?>" alt="<?= htmlspecialchars($page['ceoName']) ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top center;display:block;">
          </div>
          <div class="glass-card" style="padding:28px;border-left:4px solid var(--color-primary);">
            <h2 style="font-size:22px;color:var(--color-primary);font-weight:800;margin-bottom:4px;"><?= htmlspecialchars($page['ceoName']) ?></h2>
            <p style="font-size:15px;color:var(--color-primary);font-weight:700;margin-bottom:16px;"><?= htmlspecialchars($page['ceoTitle']) ?></p>
            <p style="font-size:16px;line-height:1.8;font-weight:500;color:var(--color-primary);"><?= htmlspecialchars($page['intro']) ?></p>
          </div>
        </div>
      <?php endif; ?>

      <div style="display:flex;flex-direction:column;gap:30px;">
        <?php foreach ($page['sections'] as $sec): ?>
          <div>
            <h3 style="font-size:20px;color:var(--color-primary);margin-bottom:10px;font-weight:700;"><?= htmlspecialchars($sec['title']) ?></h3>
            <p style="font-size:15.5px;color:var(--color-text-light);line-height:1.8;"><?= htmlspecialchars($sec['text']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if (!empty($page['whyItems'])): ?>
        <?php require __DIR__ . '/includes/components/why-choose-us-grid.php'; ?>
      <?php endif; ?>

      <div class="glass-card" style="padding:28px;margin-top:12px;">
        <h3 style="font-size:18px;color:var(--color-primary);margin-bottom:16px;font-weight:700;"><?= $isCz ? 'Potřebujete více informací?' : 'Need more information?' ?></h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;">
          <div style="display:flex;gap:12px;align-items:flex-start;">
            <?php icon('HiOutlineMapPin', 20, ''); ?>
            <div>
              <h4 style="font-size:14px;color:var(--color-text);font-weight:600;"><?= $isCz ? 'Naše kancelář' : 'Our Office' ?></h4>
              <p style="font-size:13px;color:var(--color-text-light);"><?= $isCz ? 'Praha, Česká republika' : 'Prague, Czechia' ?></p>
            </div>
          </div>
          <div style="display:flex;gap:12px;align-items:flex-start;">
            <?php icon('HiOutlineEnvelope', 20, ''); ?>
            <div>
              <h4 style="font-size:14px;color:var(--color-text);font-weight:600;"><?= $isCz ? 'Napište nám' : 'Email Us' ?></h4>
              <p style="font-size:13px;color:var(--color-text-light);">sales@honeytranslations.com</p>
            </div>
          </div>
          <div style="display:flex;gap:12px;align-items:flex-start;">
            <?php icon('HiOutlinePhone', 20, ''); ?>
            <div>
              <h4 style="font-size:14px;color:var(--color-text);font-weight:600;"><?= $isCz ? 'Zavolejte nám' : 'Call Us' ?></h4>
              <p style="font-size:13px;color:var(--color-text-light);">+91 72990 05577</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>