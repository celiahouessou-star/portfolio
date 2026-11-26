<?php /* 02 — VISION & MISSION */ ?>
<section class="vision section" id="vision">
    <div class="container">
        <?= eyebrow(2, 'Ce qui m’anime') ?>
        <div class="vision__grid">
            <?php foreach ($c['vision'] as $k => $v): ?>
                <article class="vision__card reveal" style="--d: <?= $k * 0.15 ?>s">
                    <span class="vision__index"><?= num($k + 1) ?></span>
                    <h2 class="title-md"><?= e($v['title']) ?></h2>
                    <?php if (!empty($v['subtitle'])): ?><p class="script script--sm"><?= e($v['subtitle']) ?></p><?php endif; ?>
                    <?php foreach ($v['text'] as $t): ?><p><?= e($t) ?></p><?php endforeach; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
