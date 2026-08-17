<?php
$showHeader = $showHeader ?? true;
$PROCESS_STEPS = [
    ['upload', 'HiOutlineMagnifyingGlass', '#7A0E18'],
    ['analysis', 'HiOutlineSparkles', '#D61F3A'],
    ['assign', 'HiOutlineCalendarDays', '#0F9D58'],
    ['quality', 'HiOutlineVideoCamera', '#E8A317'],
    ['delivery', 'HiOutlineCheckCircle', '#8E44AD'],
];
$stepCount = count($PROCESS_STEPS);
?>
<section class="steps-section section <?= $showHeader ? '' : 'no-header' ?>">
  <div class="container">
    <?php if ($showHeader): ?>
      <div class="section-header center">
        <span class="eyebrow"><?= htmlspecialchars(t('process.eyebrow')) ?></span>
        <h2 class="section-title"><?= htmlspecialchars(t('process.title')) ?></h2>
      </div>
    <?php endif; ?>

    <div class="steps-layout">
      <div class="steps-video-col">
        <div class="steps-video-wrap reveal-up">
          <video
            class="process-video"
            controls
            autoplay
            muted
            loop
            preload="auto"
            playsinline
            poster="<?= asset('images/hero-video-call.png') ?>"
          >
            <source src="<?= asset('videos/how-it-works.mp4') ?>" type="video/mp4">
          </video>
        </div>
      </div>

      <div class="steps-timeline">
        <span class="steps-timeline-track" aria-hidden="true"></span>
        <span class="steps-timeline-progress" aria-hidden="true"></span>

        <?php foreach ($PROCESS_STEPS as $i => [$key, $ic, $color]): ?>
          <div class="steps-item reveal-up" style="--step-color:<?= $color ?>; --step-delay:<?= $i * 0.12 ?>s;">
            <div class="steps-node">
              <span class="steps-node-ring" aria-hidden="true"></span>
              <span class="steps-node-icon"><?php icon($ic, 24); ?></span>
            </div>
            <div class="steps-card">
              <span class="steps-card-num">Step <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
              <h3><?= htmlspecialchars(t("process.steps.$key.title")) ?></h3>
              <p><?= htmlspecialchars(t("process.steps.$key.desc")) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<script>
(function () {
  var items = document.querySelectorAll('.steps-section .reveal-up');
  if (!('IntersectionObserver' in window) || !items.length) {
    items.forEach(function (el) { el.classList.add('is-visible'); });
    return;
  }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2, rootMargin: '0px 0px -60px 0px' });
  items.forEach(function (el) { io.observe(el); });

  var track = document.querySelector('.steps-timeline');
  var progress = document.querySelector('.steps-timeline-progress');
  if (track && progress) {
    var onScroll = function () {
      var rect = track.getBoundingClientRect();
      var vh = window.innerHeight || document.documentElement.clientHeight;
      var total = rect.height;
      var visible = Math.min(Math.max(vh * 0.75 - rect.top, 0), total);
      var pct = total > 0 ? (visible / total) * 100 : 0;
      progress.style.height = pct + '%';
    };
    document.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    onScroll();
  }
})();
</script>