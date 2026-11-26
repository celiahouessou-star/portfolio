<?php /* 04 — PROCESSUS CRÉATIF */ ?>
<section class="process section" id="processus">
    <div class="container">
        <div class="section-head section-head--center">
            <?= eyebrow(4) ?>
            <h2 class="title-lg reveal">Processus créatif</h2>
            <p class="script script--sm reveal"><?= e($c['process_intro']) ?></p>
        </div>

        <ol class="timeline">
            <span class="timeline__line"><span class="timeline__progress"></span></span>
            <?php foreach ($c['process'] as $k => $step): ?>
                <li class="timeline__step reveal" style="--d: <?= $k * 0.1 ?>s">
                    <span class="timeline__dot"><?= num($k + 1) ?></span>
                    <h3><?= e($step['title']) ?></h3>
                    <p><?= e($step['text']) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
