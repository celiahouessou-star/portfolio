<?php /* SOMMAIRE — reprend la page 2 du PDF, en version interactive */ ?>
<section class="sommaire section" id="sommaire">
    <div class="container sommaire__grid">
        <div>
            <h2 class="title-xl reveal">Sommaire</h2>
            <?= leaf('sommaire__leaf') ?>
        </div>
        <ol class="sommaire__list">
            <?php $i = 1; foreach ($c['nav'] as $id => $label): ?>
                <li class="reveal">
                    <a href="#<?= e($id) ?>">
                        <span class="sommaire__label"><?= e($label) ?></span>
                        <span class="sommaire__dots"></span>
                        <span class="sommaire__num"><?= num($i++) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
