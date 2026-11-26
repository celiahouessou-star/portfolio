<?php /* 03 — COMPÉTENCES (grille bento) */ ?>
<section class="skills section" id="competences">
    <div class="container">
        <div class="section-head section-head--split">
            <div>
                <?= eyebrow(3) ?>
                <h2 class="title-lg reveal">Compétences</h2>
            </div>
            <?php if (!empty($c['skills_intro'])): ?>
                <p class="lead reveal"><?= e($c['skills_intro']) ?></p>
            <?php endif; ?>
        </div>

        <div class="bento">
            <?php foreach ($c['skills'] as $k => $s): ?>
                <article class="skill skill--<?= e($s['size'] ?: 'base') ?> reveal" style="--d: <?= ($k % 4) * 0.08 ?>s">
                    <div class="skill__icon"><?= icon($s['icon']) ?></div>
                    <h3><?= e($s['title']) ?></h3>
                    <p><?= e($s['text']) ?></p>
                    <?php if (!empty($s['tags'])): ?>
                        <ul class="skill__tags"><?php foreach ($s['tags'] as $t): ?><li><?= e($t) ?></li><?php endforeach; ?></ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>

            <!-- Boîte à outils -->
            <article class="skill skill--tools reveal">
                <h3>Boîte à outils</h3>
                <dl class="toolbox">
                    <?php foreach ($c['tools'] as $group => $list): ?>
                        <div><dt><?= e($group) ?></dt><dd><?php foreach ($list as $t): ?><span><?= e($t) ?></span><?php endforeach; ?></dd></div>
                    <?php endforeach; ?>
                </dl>
            </article>
        </div>
    </div>

    <?php $allTools = array_merge(...array_values($c['tools'])); ?>
    <div class="marquee" aria-hidden="true">
        <div class="marquee__track">
            <?php for ($r = 0; $r < 2; $r++): foreach ($allTools as $tool): ?>
                <span><?= e($tool) ?></span><span class="marquee__star">✦</span>
            <?php endforeach; endfor; ?>
        </div>
    </div>
</section>
