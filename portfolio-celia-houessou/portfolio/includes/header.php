<?php $p = $c['person']; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($c['site']['title']) ?></title>
    <meta name="description" content="<?= e($c['site']['description']) ?>">
    <meta property="og:title" content="<?= e($c['site']['title']) ?>">
    <meta property="og:description" content="<?= e($c['site']['description']) ?>">
    <meta property="og:image" content="<?= img($p['hero_image']) ?>">
    <meta name="theme-color" content="#f6efe5">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='50' fill='%23b4532a'/><text x='50' y='68' font-size='54' text-anchor='middle' fill='%23f6efe5' font-family='Georgia'>C</text></svg>">

    <link rel="preload" href="assets/fonts/gloock-latin-400-normal.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="<?= asset('assets/css/fonts.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">
</head>
<body>

<!-- Écran de chargement -->
<div class="loader" aria-hidden="true">
    <div class="loader__inner">
        <span class="loader__name"><?= e($p['first_name']) ?></span>
        <span class="loader__script">portfolio</span>
    </div>
</div>

<!-- Curseur personnalisé (ordinateur uniquement) -->
<div class="cursor" aria-hidden="true"><span class="cursor__label">Voir</span></div>

<div class="progress" aria-hidden="true"></div>

<header class="header">
    <a href="#top" class="brand" aria-label="Retour en haut">
        <span class="brand__mark">C</span>
        <span class="brand__name"><?= e($p['first_name']) ?> <strong><?= e($p['last_name']) ?></strong></span>
    </a>

    <nav class="nav" aria-label="Navigation principale">
        <ul>
            <?php $i = 1; foreach ($c['nav'] as $id => $label): ?>
                <li><a href="#<?= e($id) ?>" data-nav="<?= e($id) ?>"><span><?= num($i++) ?></span><?= e($label) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <a href="#contact" class="btn btn--small header__cta">Me contacter</a>

    <button class="burger" aria-label="Ouvrir le menu" aria-expanded="false">
        <span></span><span></span>
    </button>
</header>

<main id="top">
