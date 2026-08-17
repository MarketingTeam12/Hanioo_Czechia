<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$BLOG_POSTS = require __DIR__ . '/data/blog.php';
$key = $_GET['key'] ?? '';
$post = $BLOG_POSTS[$CURRENT_LANG][$key] ?? $BLOG_POSTS['en'][$key] ?? null;

if (!$post) {
    header('Location: ' . url('blog.php'));
    exit;
}

$isCz = is_maori();
$PAGE_TITLE = $post['title'] . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = $post['excerpt'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars($post['title']);
$hero_subtitle = htmlspecialchars($post['date']);
require __DIR__ . '/includes/components/page-hero.php';
?>

<section class="section">
  <div class="container" style="max-width:820px;margin:0 auto;">
    <a href="<?= url('blog.php') ?>" style="display:inline-flex;align-items:center;gap:6px;color:var(--color-primary);font-weight:600;font-size:14px;text-decoration:none;margin-bottom:20px;">
      <?php icon('HiOutlineArrowLeft', 16); ?> <?= $isCz ? 'Zpět na blog' : 'Back to Blog' ?>
    </a>

    <div style="border-radius:14px;overflow:hidden;aspect-ratio:16/7;width:100%;box-shadow:var(--shadow-medium);margin-bottom:24px;">
      <img src="<?= asset($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" style="width:100%;height:100%;object-fit:cover;display:block;">
    </div>

    <span class="blog-card-tag" style="background:<?= htmlspecialchars($post['color']) ?>;display:inline-block;margin-bottom:14px;"><?= htmlspecialchars($post['tag']) ?></span>
    <div class="blog-card-meta" style="margin-bottom:24px;"><?php icon('HiOutlineCalendarDays', 14); ?><span><?= htmlspecialchars($post['date']) ?></span></div>

    <div style="display:flex;flex-direction:column;gap:18px;">
      <?php foreach ($post['body'] as $para): ?>
        <p style="font-size:16px;line-height:1.8;color:var(--color-text-light);"><?= htmlspecialchars($para) ?></p>
      <?php endforeach; ?>
    </div>

    <div class="glass-card" style="padding:28px;margin-top:36px;text-align:center;">
      <h3 style="font-size:18px;color:var(--color-primary);margin-bottom:14px;font-weight:700;"><?= $isCz ? 'Chcete rezervovat tlumočníka?' : 'Ready to book an interpreter?' ?></h3>
      <a href="<?= url('contact.php') ?>" class="btn btn-solid"><?= $isCz ? 'Kontaktujte nás' : 'Contact Us' ?></a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
