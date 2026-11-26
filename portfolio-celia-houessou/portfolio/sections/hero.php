<?php /* COUVERTURE — reprend la page 1 du PDF */ ?>
<section class="hero" id="accueil">
    <div class="hero__text">
        <p class="hero__kicker reveal">Portfolio — <?= e($c['site']['year']) ?></p>
        <h1 class="hero__title">
            <span class="line"><span><?= e($p['first_name']) ?></span></span>
            <span class="line"><span><?= e(ucfirst(strtolower($p['last_name']))) ?></span></span>
        </h1>
        <p class="hero__script reveal" aria-label="<?= e(implode(', ', $p['roles'] ?? [$p['role']])) ?>">
            <span class="rotator" data-words="<?= e(json_encode($p['roles'] ?? [$p['role']], JSON_UNESCAPED_UNICODE)) ?>"><?= e(($p['roles'] ?? [$p['role']])[0]) ?></span>
        </p>
        <p class="hero__tagline reveal"><?= e($p['tagline']) ?></p>

        <div class="hero__actions reveal">
            <a href="#projets" class="btn magnetic">Voir mes projets <?= icon('arrow') ?></a>
            <a href="#contact" class="btn btn--ghost magnetic">Me contacter</a>
        </div>

        <p class="status reveal"><span class="status__dot"></span><?= e($p['status']) ?></p>
    </div>

    <div class="hero__visual">
        <div class="arch parallax" data-speed="-0.06">
            <img src="<?= img($p['hero_image']) ?>"<?= dims($p['hero_image']) ?> alt="Photo de <?= e($p['first_name']) ?> <?= e($p['last_name']) ?>">
        </div>
        <?= leaf('hero__leaf parallax') ?>
        <div class="badge" aria-hidden="true">
            <svg viewBox="0 0 200 200">
                <defs><path id="circle" d="M100 100 m-78 0 a78 78 0 1 1 156 0 a78 78 0 1 1 -156 0"/></defs>
                <text><textPath href="#circle">Design graphique • UI / UX • Motion • Web • </textPath></text>
            </svg>
            <span class="badge__center">✦</span>
        </div>
    </div>

    <a href="#sommaire" class="scroll-hint" aria-label="Défiler vers le bas"><span></span>Défiler</a>
</section>
