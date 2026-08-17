<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/icons.php';

$isCz = is_maori();
$PAGE_TITLE = t('pages.blog.title') . ' — ' . SITE_NAME;
$PAGE_DESCRIPTION = t('pages.blog.subtitle');
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';

$hero_title = htmlspecialchars(t('pages.blog.title'));
$hero_subtitle = htmlspecialchars(t('pages.blog.subtitle'));
require __DIR__ . '/includes/components/page-hero.php';

$BLOG_POSTS = require __DIR__ . '/data/blog.php';
$posts = $BLOG_POSTS[$CURRENT_LANG] ?? $BLOG_POSTS['en'];
?>
<section class="section">
  <div class="container">
    <p class="blog-intro"><?= htmlspecialchars(t('pages.blog.subtitle')) ?></p>
    <div class="blog-grid">
      <?php foreach ($posts as $slug => $post): ?>
        <?php $postUrl = url('blog-detail.php?key=' . urlencode($slug)); ?>
        <article class="blog-card">
          <a href="<?= $postUrl ?>" class="blog-card-image"><img src="<?= asset($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" loading="lazy"></a>
          <div class="blog-card-body">
            <span class="blog-card-tag" style="background:<?= htmlspecialchars($post['color']) ?>;"><?= htmlspecialchars($post['tag']) ?></span>
            <h3><a href="<?= $postUrl ?>" style="color:inherit;text-decoration:none;"><?= htmlspecialchars($post['title']) ?></a></h3>
            <p><?= htmlspecialchars($post['excerpt']) ?></p>
            <div class="blog-card-meta"><?php icon('HiOutlineCalendarDays', 14); ?><span><?= htmlspecialchars($post['date']) ?></span></div>
            <a href="<?= $postUrl ?>" class="blog-card-link"><?= $isCz ? 'Číst více' : 'Read More' ?> <?php icon('HiOutlineArrowRight', 14, 'blog-link-arrow'); ?></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
