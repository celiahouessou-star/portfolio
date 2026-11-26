<?php /* 01 — À PROPOS */ $a = $c['about']; ?>
<section class="about section" id="apropos">
    <?= leaf('about__leaf') ?>
    <div class="container about__grid">
        <div class="about__head">
            <?= eyebrow(1, 'À propos') ?>
            <h2 class="about__title reveal"><?= e($a['kicker']) ?></h2>
        </div>

        <div class="about__content">
            <?php foreach ($a['paragraphs'] as $para): ?>
                <p class="lead reveal"><?= e($para) ?></p>
            <?php endforeach; ?>

            <ul class="stats reveal">
                <?php foreach ($a['stats'] as $s): if ($s['value'] === 'auto') $s['value'] = (string) count($c['skills']); ?>
                    <li><strong class="counter" data-target="<?= e($s['value']) ?>"><?= e($s['value']) ?></strong><span><?= e($s['label']) ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <p class="highlight reveal"><?= e($a['highlight']) ?></p>
    </div>
</section>
