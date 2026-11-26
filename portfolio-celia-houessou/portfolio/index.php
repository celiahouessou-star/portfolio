<?php
/**
 * Point d'entrée du portfolio.
 * L'ordre des sections ci-dessous reprend la hiérarchie du PDF.
 * Pour masquer une section : mettre // devant sa ligne.
 */
require __DIR__ . '/includes/functions.php';
$c = require __DIR__ . '/config/content.php';

include __DIR__ . '/includes/header.php';

include __DIR__ . '/sections/hero.php';        // Couverture
include __DIR__ . '/sections/sommaire.php';    // Sommaire
include __DIR__ . '/sections/about.php';       // 01 Célia HOUESSOU
include __DIR__ . '/sections/vision.php';      // 02 Vision & mission
include __DIR__ . '/sections/skills.php';      // 03 Compétences
include __DIR__ . '/sections/process.php';     // 04 Processus créatif
include __DIR__ . '/sections/projects.php';    // 05 Projets
include __DIR__ . '/sections/values.php';      // 06 Valeurs
include __DIR__ . '/sections/contact.php';     // 07 Contact

include __DIR__ . '/includes/footer.php';
