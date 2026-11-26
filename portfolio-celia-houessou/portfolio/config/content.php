<?php
/**
 * =====================================================================
 *  CONTENU DU PORTFOLIO — Célia HOUESSOU
 * =====================================================================
 *  C'est LE fichier à modifier pour changer les textes, les projets,
 *  les images, les couleurs de la palette, les coordonnées…
 *
 *  - Les images se placent dans  assets/img/
 *    puis on indique simplement leur nom de fichier ici.
 *  - Pour ajouter un projet : copier un bloc du tableau 'projects'
 *    et changer son contenu.
 *  - Pour ajouter un visuel : ajouter une ligne dans 'gallery'.
 * =====================================================================
 */

return [

    /* ------------------------------------------------------------ */
    /*  INFOS GÉNÉRALES                                              */
    /* ------------------------------------------------------------ */
    'site' => [
        'title'       => 'Célia HOUESSOU — Designer graphique & UI',
        'description' => 'Portfolio de Célia HOUESSOU, designer graphique : identité visuelle, web design, UI/UX, motion design et montage vidéo.',
        'year'        => '2026',
    ],

    'person' => [
        'first_name' => 'Célia',
        'last_name'  => 'HOUESSOU',
        'role'       => 'Designer graphique',
        // Mots qui défilent sous le nom (typographie animée)
        'roles'      => ['Designer graphique', 'UI / UX designer', 'Motion designer', 'Brand designer'],
        'tagline'    => 'Pour des marques en quête de sens.',
        'email'      => 'celiahouessou@gmail.com',
        'phone'      => '06 12 79 91 98',
        'location'   => 'Montbéliard, France',
        'status'     => 'Disponible pour une alternance ou un stage',
        // Laisser vide ('') pour masquer un réseau
        'socials'    => [
            'LinkedIn'  => '',
            'Behance'   => '',
            'Instagram' => '',
        ],
        'cv'         => '', // ex : 'assets/CV_Celia_Houessou.pdf'
        'hero_image' => 'portrait-couverture.jpg', // photo de la couverture (dans l'arche)
    ],

    /* ------------------------------------------------------------ */
    /*  MENU (ordre = ordre du sommaire du PDF)                      */
    /* ------------------------------------------------------------ */
    'nav' => [
        'apropos'    => 'À propos',
        'vision'     => 'Vision',
        'competences'=> 'Compétences',
        'processus'  => 'Processus',
        'projets'    => 'Projets',
        'valeurs'    => 'Valeurs',
        'contact'    => 'Contact',
    ],

    /* ------------------------------------------------------------ */
    /*  01 — À PROPOS                                                */
    /* ------------------------------------------------------------ */
    'about' => [
        'kicker'    => 'Bienvenue dans mon univers créatif',
        'paragraphs'=> [
            'Designer graphique passionnée, je conçois des univers visuels qui allient créativité, sens du détail et efficacité.',
            'Curieuse et polyvalente, j’interviens sur l’ensemble du processus créatif : identité visuelle, création graphique, web design, motion design et montage vidéo.',
            'Mon approche mêle sens esthétique et compréhension des enjeux digitaux afin de créer des expériences visuelles cohérentes et impactantes.',
        ],
        'highlight' => 'Explorez mon portfolio pour découvrir comment je donne vie aux marques et aux projets avec créativité et originalité.',
        'stats'     => [
            ['value' => 'auto', 'label' => 'domaines d’expertise'] /* 'auto' = nombre de compétences */,
            ['value' => '30+','label' => 'visuels réalisés'],
            ['value' => '3',  'label' => 'univers de projets'],
        ],
    ],

    /* ------------------------------------------------------------ */
    /*  02 — VISION & MISSION                                        */
    /* ------------------------------------------------------------ */
    'vision' => [
        [
            'title'    => 'Vision',
            'text'     => [
                'Créer des expériences visuelles qui inspirent, captivent et donnent du sens aux idées.',
                'Explorer de nouvelles formes d’expression visuelle et contribuer à construire des univers créatifs innovants et esthétiques, où message et émotion se rencontrent.',
            ],
        ],
        [
            'title'    => 'Mission',
            'text'     => [
                'Transformer les idées en identités visuelles fortes et en expériences digitales impactantes.',
                'Concevoir des solutions visuelles centrées utilisateur qui allient esthétique, clarté et efficacité.',
            ],
        ],
    ],

    /* ------------------------------------------------------------ */
    /*  03 — COMPÉTENCES                                             */
    /* ------------------------------------------------------------ */
    /*
     * Affichées en grille « bento » (tendance 2026).
     *   icon : palette, print, social, ui, web, motion, cube, spark, ai, system, access
     *   size : 'wide' (2 colonnes), 'tall' (2 lignes) ou '' (normal)
     *   tags : mots-clés affichés en petites pastilles
     * Pour masquer une compétence : mettre // devant la ligne.
     */
    'skills_intro' => 'Des compétences hybrides, entre création graphique, digital et technologies immersives.',
    'skills' => [
        ['icon' => 'palette', 'size' => 'wide', 'title' => 'Identité visuelle & branding',
         'text' => 'Logos, chartes graphiques et univers de marque cohérents, du concept jusqu’aux déclinaisons.',
         'tags' => ['Logo', 'Charte graphique', 'Direction artistique']],
        ['icon' => 'social',  'size' => 'tall', 'title' => 'Contenus pour les réseaux sociaux',
         'text' => 'Visuels pensés « social first » : posts, stories, campagnes et jeux concours qui captent l’attention.',
         'tags' => ['Instagram', 'Campagnes', 'Formats courts']],
        ['icon' => 'print',   'size' => '', 'title' => 'Design print & édition',
         'text' => 'Affiches, flyers, cartes de visite, kakémonos et supports événementiels.',
         'tags' => ['Affiche', 'Flyer', 'Papeterie']],
        ['icon' => 'ui',      'size' => '', 'title' => 'UI / UX design',
         'text' => 'Interfaces intuitives centrées utilisateur, du wireframe au prototype interactif.',
         'tags' => ['Wireframe', 'Prototype', 'Parcours utilisateur']],
        ['icon' => 'web',     'size' => 'wide', 'title' => 'Web design & développement',
         'text' => 'Sites vitrines et e-commerce responsives, de la maquette jusqu’au code, dashboard compris.',
         'tags' => ['Responsive', 'E-commerce', 'HTML · CSS · JS · PHP']],
        ['icon' => 'motion',  'size' => '', 'title' => 'Motion design & vidéo',
         'text' => 'Animations 2D & 3D, typographie animée et montage vidéo pour tous les supports.',
         'tags' => ['Typographie animée', 'Montage']],
        ['icon' => 'cube',    'size' => '', 'title' => '3D & réalité augmentée',
         'text' => 'Modélisation 3D et expériences immersives en réalité augmentée.',
         'tags' => ['3ds Max', 'Unity', 'Vuforia']],
        ['icon' => 'spark',   'size' => 'wide', 'title' => 'Design interactif & objets connectés',
         'text' => 'Conception d’expériences « phygitales » : interfaces pour objets connectés et dispositifs interactifs.',
         'tags' => ['IoT', 'Prototypage', 'Expérience immersive']],

        // ↓ Compétences tendance à activer (enlever les //) si tu les maîtrises :
        // ['icon' => 'ai',     'size' => '', 'title' => 'Design assisté par IA', 'text' => 'Exploration et itération rapides avec les outils d’IA générative, au service de la créativité.', 'tags' => ['Adobe Firefly', 'Midjourney', 'Canva IA']],
        // ['icon' => 'system', 'size' => '', 'title' => 'Design system', 'text' => 'Bibliothèques de composants et tokens pour des interfaces cohérentes.', 'tags' => ['Figma', 'Composants']],
        // ['icon' => 'access', 'size' => '', 'title' => 'Accessibilité', 'text' => 'Designs lisibles et inclusifs, conformes aux bonnes pratiques WCAG.', 'tags' => ['Contrastes', 'WCAG']],
    ],

    // Outils, regroupés par usage (affichés dans la grille + le bandeau défilant)
    'tools' => [
        'Création'      => ['Photoshop', 'Illustrator', 'Canva'],
        'UI & prototype'=> ['Figma'],
        'Motion & vidéo'=> ['After Effects', 'CapCut'],
        '3D & AR'       => ['3ds Max', 'Unity', 'Vuforia'],
        'Web'           => ['HTML / CSS', 'JavaScript', 'PHP'],
    ],

    /* ------------------------------------------------------------ */
    /*  04 — PROCESSUS CRÉATIF                                       */
    /* ------------------------------------------------------------ */
    'process_intro' => 'Une approche structurée pour des résultats impactants.',
    'process' => [
        ['title' => 'Découverte', 'text' => 'Comprendre les besoins, le contexte et les objectifs du projet.'],
        ['title' => 'Recherche',  'text' => 'Explorer, analyser les références et identifier les opportunités.'],
        ['title' => 'Idéation',   'text' => 'Imaginer des pistes créatives et définir une direction forte.'],
        ['title' => 'Design',     'text' => 'Concevoir une identité visuelle ou une interface impactante.'],
        ['title' => 'Prototype',  'text' => 'Tester les solutions, ajuster les interactions et affiner les détails.'],
        ['title' => 'Livraison',  'text' => 'Finaliser le projet, préparer les livrables et accompagner sa mise en œuvre.'],
    ],

    /* ------------------------------------------------------------ */
    /*  05 — PROJETS                                                 */
    /* ------------------------------------------------------------ */
    'projects_intro' => [
        'title'    => 'Projets',
        'subtitle' => 'Réalisés avec passion et engagement',
        'text'     => 'Imprégnez-vous de mon univers créatif grâce à cette sélection non exhaustive.',
        'note'     => 'Certains visuels ont été réalisés dans le cadre académique.',
    ],

    /*
     * Chaque projet = un "chapitre".
     *   type       : libellé affiché (Freelance, Académique…)
     *   theme      : 'light' ou 'dark' (fond de la section)
     *   meta       : infos clés (Client, Mission, École…)
     *   cover      : grande image d'ouverture
     *   blocks     : sous-parties. Types possibles :
     *       - 'identity'  : logo + palette + typographies
     *       - 'gallery'   : grille de visuels (avec titre + descriptions)
     *       - 'showcase'  : grandes images pleine largeur (sites, interfaces)
     */
    'projects' => [

        /* ---------- ONFEKOA ---------- */
        [
            'id'      => 'onfekoa',
            'type'    => 'Projet design freelance',
            'title'   => 'ONFEKOA',
            'theme'   => 'light',
            'meta'    => [
                'Client'  => 'ONFEKOA — plateforme de réservation d’activités de loisirs, de détente et de découverte au Bénin',
                'Mission' => 'Identité visuelle et supports digitaux',
            ],
            'intro'   => 'ONFEKOA a souhaité que nous établissions ensemble son identité visuelle ainsi que d’autres supports digitaux. La présentation qui suit n’est qu’une liste non exhaustive de mon travail.',
            'cover'   => ['onfekoa-mobile.jpg', 'onfekoa-laptop.jpg'],
            'blocks'  => [
                [
                    'kind'   => 'identity',
                    'title'  => 'Identité visuelle',
                    'logos'  => ['onfekoa-logo-creme.jpg', 'onfekoa-logo-noir.jpg', 'onfekoa-logo-blanc.jpg', 'onfekoa-icone-creme.jpg', 'onfekoa-icone-noir.jpg', 'onfekoa-horizontal-creme.jpg'],
                    'colors' => ['#e73119', '#f7eedc', '#ffffff', '#000000'],
                    'fonts'  => ['onfekoa-typo-supersunday.jpg', 'onfekoa-typo-inter.jpg'],
                ],
                [
                    'kind'  => 'gallery',
                    'title' => 'Visuels commerciaux',
                    'cols'  => 4,
                    'items' => [
                        ['img' => 'onfekoa-visuel-1000.jpg',     'caption' => 'Célébration des 1000 utilisateurs'],
                        ['img' => 'onfekoa-visuel-sport.jpg',    'caption' => 'Des activités pour bouger'],
                        ['img' => 'onfekoa-visuel-sortir.jpg',   'caption' => 'Envie de sortir ?'],
                        ['img' => 'onfekoa-visuel-concours.jpg', 'caption' => 'Jeu concours Instagram'],
                    ],
                ],
            ],
        ],

        /* ---------- IMA — GRAPHISME ---------- */
        [
            'id'      => 'ima',
            'type'    => 'Projet académique',
            'title'   => 'Graphisme',
            'theme'   => 'light',
            'meta'    => [
                'École' => 'Institut de Multimédia Appliquée (IMA)',
                'Lieu'  => 'Cotonou, Bénin',
            ],
            'intro'   => 'Durant ma formation en design graphique, j’ai appris à réaliser des visuels déclinés sur divers supports médiatiques ainsi que des cartes de visite. Les visuels sont classés par catégorie. À la fin de cette formation, il m’a été demandé de réaliser le branding d’un restaurant mettant à l’honneur la gastronomie béninoise.',
            'cover'   => ['ima-joyeux-noel.jpg'],
            'blocks'  => [
                [
                    'kind'   => 'gallery',
                    'title'  => 'Collections',
                    'filter' => true, // affiche des filtres par catégorie
                    'cols'   => 3,
                    'items'  => [
                        ['cat' => 'Éducation',  'img' => 'education-reveal-school.jpg', 'caption' => 'Reveal School', 'text' => 'Visuel promotionnel mettant en avant un environnement éducatif dynamique et positif grâce à une composition moderne, une photographie engageante et une palette contrastée.'],
                        ['cat' => 'Éducation',  'img' => 'education-informatique.jpg',  'caption' => 'Formation en informatique', 'text' => 'Visuel publicitaire pour une formation accélérée : photographie dynamique, éléments graphiques technologiques et palette moderne et impactante.'],
                        ['cat' => 'Évènement',  'img' => 'evenement-dinner-awards.jpg', 'caption' => 'Dinner & Awards Night', 'text' => 'Affiche à l’esthétique élégante et sophistiquée : palette bordeaux et dorée, composition dynamique autour du vin pour évoquer une soirée de gala.'],
                        ['cat' => 'Évènement',  'img' => 'evenement-pool-party.jpg',    'caption' => 'Pool Party', 'text' => 'Affiche pour un night club : couleurs estivales, typographie dynamique et éléments liés à la piscine pour une ambiance festive, fraîche et énergique.'],
                        ['cat' => 'Évènement',  'img' => 'evenement-valentine.jpg',     'caption' => 'Dîner de la Saint-Valentin', 'text' => 'Ambiance romantique et élégante : photographie immersive, typographie expressive et palette associée à l’amour et à la célébration.'],
                        ['cat' => 'Évènement',  'img' => 'evenement-save-the-date.jpg', 'caption' => 'Save the Date', 'text' => 'Annonce de mariage : palette de tons doux, typographie raffinée et éléments graphiques symbolisant l’amour et l’engagement.'],
                        ['cat' => 'Mode',       'img' => 'mode-elena-couture.jpg',      'caption' => 'Eléna Couture', 'text' => 'Soldes du Nouvel An : esthétique élégante, palette de tons dorés et neutres mettant en valeur la silhouette et l’univers raffiné de la marque.'],
                        ['cat' => 'Mode',       'img' => 'mode-lorenor.jpg',            'caption' => 'Lorenor Couture', 'text' => 'Composition élégante, silhouettes stylisées et palette chaleureuse pour attirer l’attention sur les réductions.'],
                        ['cat' => 'Mode',       'img' => 'mode-teddy-fashion.jpg',      'caption' => 'Teddy Fashion', 'text' => 'Sélection de robes : composition dynamique, couleurs vives et mise en page inspirée de l’univers de la mode.'],
                        ['cat' => 'Cosmétique', 'img' => 'cosmetique-moroccanoil-1.jpg','caption' => 'Moroccanoil — Grow longer', 'text' => 'Flyer pour une gamme capillaire : composition fraîche, palette verte évoquant la nature et éléments valorisant les bienfaits du soin.'],
                        ['cat' => 'Cosmétique', 'img' => 'cosmetique-moroccanoil-2.jpg','caption' => 'Skin care', 'text' => 'Composition fraîche et dynamique, palette verte naturelle et mise en avant des bienfaits produits.'],
                        ['cat' => 'Alimentation','img' => 'alimentation-fast-food.jpg', 'caption' => 'Fast-food', 'text' => 'Flyer promotionnel : visuels gourmands et palette chaleureuse pour stimuler l’appétit et valoriser l’offre.'],
                        ['cat' => 'Alimentation','img' => 'alimentation-supermarche.jpg','caption' => 'Supermarché', 'text' => 'Visuel réseaux sociaux : couleurs vives et composition dynamique pour une expérience d’achat conviviale et des produits frais.'],
                        ['cat' => 'Cartes de visite','img' => 'cartes-de-visite.jpg',   'caption' => 'Collection cartes de visite', 'text' => 'Trois identités : minimaliste aux formes circulaires, corporate géométrique et moderne aux couleurs pastel. Typographie claire et mise en page équilibrée.'],
                    ],
                ],
                [
                    'kind'  => 'showcase',
                    'title' => 'Mon projet de fin de formation',
                    'text'  => 'Branding du restaurant « Tochenou », qui met à l’honneur la gastronomie béninoise : création du logo, de l’enseigne, de visuels pour les réseaux sociaux (annonce, ouverture, promotions), d’un kakémono événementiel ainsi que la personnalisation des tabliers et des toques des cuisiniers.',
                    'items' => ['tochenou-branding.jpg', 'tochenou-reseaux.jpg'],
                ],
            ],
        ],

        /* ---------- MASTER 1 — WEB ---------- */
        [
            'id'      => 'master',
            'type'    => 'Projets académiques Master 1',
            'title'   => 'Web & interfaces',
            'theme'   => 'light',
            'meta'    => [
                'Université' => 'Université Marie et Louis Pasteur',
                'Lieu'       => 'Montbéliard, France',
            ],
            'intro'   => 'Durant mon Master 1, j’ai appris à concevoir des interfaces web ainsi qu’à développer des sites web. La présentation qui suit n’est qu’une liste non exhaustive de mon travail.',
            'cover'   => ['master-laptop.jpg'],
            'blocks'  => [
                [
                    'kind'  => 'showcase',
                    'title' => 'Projet web design — Soothe & Care',
                    'text'  => 'Conception d’un logo et de l’interface d’un site web dédié au bien-être et au soin du corps : page d’accueil présentant les articles, page « À propos » et page de contact. L’ensemble vise à transmettre une sensation de sérénité, de simplicité et d’équilibre.',
                    'items' => ['soothe-interface.jpg', 'soothe-logo.jpg'],
                    'layout'=> 'split',
                ],
                [
                    'kind'  => 'showcase',
                    'title' => 'Projet développement web — Beauty Adress',
                    'text'  => 'Conception et développement d’un site e-commerce dédié à la vente de produits et accessoires capillaires. Le projet comprend la création de l’interface utilisateur ainsi que le développement du site avec un dashboard, afin d’offrir une expérience d’achat fluide et intuitive.',
                    'items' => ['ecommerce-laptop.jpg', 'ecommerce-pages-1.jpg', 'ecommerce-pages-2.jpg', 'ecommerce-dashboard.jpg'],
                ],
            ],
        ],

        /* ---------- MOUV'PRINT ---------- */
        [
            'id'      => 'mouvprint',
            'type'    => 'Projet Rhizome Master 1',
            'title'   => 'MOUV’PRINT',
            'theme'   => 'dark',
            'meta'    => [
                'Cadre' => 'Projet universitaire — mobilité intelligente',
                'Rôle'  => 'Identité visuelle, logo, direction artistique, UI/UX',
            ],
            'intro'   => 'MOUV’PRINT permet aux utilisateurs d’explorer la ville au passé, au présent et au futur grâce à des lunettes connectées, à travers la réalité augmentée et une expérience immersive. J’ai conçu l’identité visuelle complète, dont le logo, ainsi que le design de l’interface web : direction artistique, choix des couleurs, hiérarchie visuelle, expérience utilisateur et univers graphique, afin de traduire l’innovation, l’immersion et la projection dans le temps.',
            'cover'   => ['mouvprint-ecran.jpg'],
            'blocks'  => [
                [
                    'kind'  => 'showcase',
                    'title' => 'Interface web',
                    'items' => ['mouvprint-hero.jpg', 'mouvprint-intro.jpg', 'mouvprint-epoques.jpg', 'mouvprint-fonctionnement.jpg', 'mouvprint-experience.jpg', 'mouvprint-univers.jpg', 'mouvprint-pourquoi.jpg', 'mouvprint-cta.jpg'],
                    'layout'=> 'masonry',
                ],
            ],
        ],
    ],

    /* ------------------------------------------------------------ */
    /*  06 — VALEURS                                                 */
    /* ------------------------------------------------------------ */
    'values' => [
        ['title' => 'Créativité',    'text' => 'Chaque projet est une nouvelle opportunité d’innover et de repousser les limites du design.'],
        ['title' => 'Engagement',    'text' => 'Je m’investis pleinement dans chaque collaboration, assurant un travail de qualité qui respecte les délais.'],
        ['title' => 'Collaboration', 'text' => 'Je crois en la force du travail d’équipe et dans l’écoute active pour comprendre et répondre aux besoins spécifiques de chaque client.'],
    ],

    /* ------------------------------------------------------------ */
    /*  07 — CONTACT                                                 */
    /* ------------------------------------------------------------ */
    'contact' => [
        'kicker' => 'Envie de collaborer ?',
        'text'   => [
            'Je suis toujours à la recherche de nouveaux projets stimulants et de collaborations enrichissantes.',
            'N’hésitez pas à me contacter pour discuter de vos besoins, partager vos idées ou simplement en savoir plus sur mon travail.',
        ],
        // Adresse qui reçoit les messages du formulaire
        'form_to' => 'celiahouessou@gmail.com',
        /*
         * Service d'envoi du formulaire (nécessaire sur GitHub Pages, qui n'exécute pas PHP).
         *   'formsubmit' : gratuit, sans inscription — les messages arrivent à l'adresse 'form_to'.
         *                  ⚠️ Le tout premier message déclenche un e-mail d'activation
         *                  « FormSubmit » : il faut cliquer sur le lien pour l'activer.
         *   'php'        : utilise contact.php (seulement chez un hébergeur PHP).
         */
        'form_service' => 'formsubmit',
    ],
];
