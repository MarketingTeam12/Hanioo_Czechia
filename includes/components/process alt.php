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
<section class="process-alt-section section <?= $showHeader ? '' : 'no-header' ?>">
  <div class="container">
    <?php if ($showHeader): ?>
      <div class="section-header center">
        <span class="eyebrow"><?= htmlspecialchars(t('process.eyebrow')) ?></span>
        <h2 class="section-title"><?= htmlspecialchars(t('process.title')) ?></h2>
      </div>
    <?php endif; ?>

    <div class="process-alt-list">
      <?php foreach ($PROCESS_STEPS as $i => [$key, $ic, $color]): ?>
        <div class="process-alt-item" style="--step-color:<?= $color ?>;">
          <div class="process-alt-num-col">
            <span class="process-alt-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
            <?php if ($i < $stepCount - 1): ?><span class="process-alt-connector" aria-hidden="true"></span><?php endif; ?>
          </div>
          <div class="process-alt-card">
            <span class="process-alt-icon" style="background:<?= $color ?>1a;color:<?= $color ?>;"><?php icon($ic, 22); ?></span>
            <div class="process-alt-text">
              <h3><?= htmlspecialchars(t("process.steps.$key.title")) ?></h3>
              <p><?= htmlspecialchars(t("process.steps.$key.desc")) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="process-alt-video-wrap">
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
</section>