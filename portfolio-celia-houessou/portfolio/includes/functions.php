<?php
/**
 * Petites fonctions utilitaires utilisées dans les templates.
 * Pas besoin de modifier ce fichier pour changer le contenu.
 */

/** Échappe un texte pour l'afficher en HTML en toute sécurité. */
function e($text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

/** Chemin vers une image du dossier assets/img. */
function img(string $file): string
{
    return 'assets/img/' . rawurlencode($file);
}

/** Attributs width/height d'une image (évite les sauts de mise en page). */
function dims(string $file): string
{
    $path = __DIR__ . '/../assets/img/' . $file;
    $size = is_file($path) ? @getimagesize($path) : false;
    return $size ? ' width="' . $size[0] . '" height="' . $size[1] . '"' : '';
}

/** Version d'un fichier (cache busting) : force le navigateur à recharger après modification. */
function asset(string $path): string
{
    $full = __DIR__ . '/../' . $path;
    $v = file_exists($full) ? filemtime($full) : '1';
    return $path . '?v=' . $v;
}

/** Numéro de section sur 2 chiffres : 1 -> "01". */
function num(int $n): string
{
    return str_pad((string) $n, 2, '0', STR_PAD_LEFT);
}

/** Transforme un texte en identifiant (pour les filtres). */
function slug(string $text): string
{
    $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
    $text = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $text));
    return trim($text, '-');
}

/** Petit repère de section : numéro + libellé facultatif. */
function eyebrow(int $n, string $label = ''): string
{
    return '<p class="eyebrow reveal"><span>' . num($n) . '</span>' . ($label !== '' ? e($label) : '') . '</p>';
}

/** Forme organique (feuille découpée) reprise du PDF. */
function leaf(string $class = ''): string
{
    return '<svg class="leaf ' . e($class) . '" viewBox="0 0 260 320" aria-hidden="true"><path d="M118 316c-30-38-74-72-92-116-14-34-6-62 16-60 18 2 28 30 40 58-8-44-26-104-8-136 14-24 40-14 44 20 4 30-2 72 0 102 8-46 18-118 52-138 26-16 46 6 36 44-10 36-40 78-58 112 22-30 56-64 80-60 24 4 22 34-2 62-26 30-56 52-72 82-10 18-18 36-36 30z"/></svg>';
}

/** Icônes des compétences (SVG en ligne). */
function icon(string $name): string
{
    $icons = [
        'palette' => '<path d="M12 3a9 9 0 0 0 0 18c1.1 0 1.8-.8 1.8-1.7 0-.5-.2-.9-.5-1.2-.3-.3-.5-.7-.5-1.2 0-.9.8-1.7 1.7-1.7H16a5 5 0 0 0 5-5c0-4-4-7.2-9-7.2z"/><circle cx="7.5" cy="11" r="1.2"/><circle cx="10.5" cy="7" r="1.2"/><circle cx="15" cy="7.5" r="1.2"/>',
        'web'     => '<rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 8h18M8 21h8M12 18v3"/>',
        'ui'      => '<rect x="6" y="2.5" width="12" height="19" rx="2.5"/><path d="M10 18.5h4M9 7h6M9 10.5h6M9 14h3"/>',
        'motion'  => '<circle cx="12" cy="12" r="9"/><path d="M10 8.5v7l6-3.5z"/>',
        'code'    => '<path d="M8 7l-5 5 5 5M16 7l5 5-5 5M14 4l-4 16"/>',
        'video'   => '<rect x="2.5" y="6" width="13" height="12" rx="2"/><path d="M15.5 10.5l6-3.5v10l-6-3.5"/>',
        'print'   => '<path d="M7 3h10v5H7zM5 8h14a2 2 0 0 1 2 2v6h-4M7 16H3v-6a2 2 0 0 1 2-2"/><rect x="7" y="13" width="10" height="8" rx="1"/>',
        'social'  => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.3" cy="6.7" r=".8"/>',
        'cube'    => '<path d="M12 2.5l8.5 4.8v9.4L12 21.5l-8.5-4.8V7.3z"/><path d="M3.5 7.3L12 12l8.5-4.7M12 12v9.5"/>',
        'spark'   => '<path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1"/><circle cx="12" cy="12" r="3"/>',
        'ai'      => '<path d="M12 3l1.8 4.7L18.5 9.5l-4.7 1.8L12 16l-1.8-4.7L5.5 9.5l4.7-1.8zM19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8z"/>',
        'system'  => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="3.5"/><rect x="3" y="14" width="7" height="7" rx="3.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
        'access'  => '<circle cx="12" cy="4.5" r="1.8"/><path d="M4 8.5l8 1.5 8-1.5M12 10v4.5l-3 6.5M12 14.5l3 6.5"/>',
        'arrow'   => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'mail'    => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
        'phone'   => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/>',
        'pin'     => '<path d="M12 21s-7-6.2-7-12a7 7 0 0 1 14 0c0 5.8-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/>',
        'expand'  => '<path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5"/>',
    ];
    $path = $icons[$name] ?? $icons['palette'];
    return '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
}
