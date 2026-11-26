<?php /* 06 — VALEURS */ ?>
<section class="values section" id="valeurs">
    <div class="container">
        <div class="section-head section-head--center">
            <?= eyebrow(6) ?>
            <h2 class="title-lg reveal">Valeurs</h2>
        </div>
        <div class="values__grid">
            <?php foreach ($c['values'] as $k => $v): ?>
                <article class="value reveal" style="--d: <?= $k * 0.12 ?>s">
                    <?= leaf('value__leaf') ?>
                    <h3><?= e($v['title']) ?></h3>
                    <p><?= e($v['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
