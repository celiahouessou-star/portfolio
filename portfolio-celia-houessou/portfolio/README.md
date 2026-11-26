# Portfolio web — Célia HOUESSOU

Site portfolio en **PHP + JavaScript** (sans framework, sans base de données), construit sur la hiérarchie du portfolio PDF :

Couverture → Sommaire → 01 À propos → 02 Vision & mission → 03 Compétences → 04 Processus créatif → 05 Projets (ONFEKOA, Graphisme IMA, Web & interfaces Master 1, MOUV’PRINT) → 06 Valeurs → 07 Contact

---

## 1. Voir le site sur son ordinateur

Il faut PHP installé (déjà inclus dans **XAMPP**, **MAMP** ou **WAMP**).

**Option A — en ligne de commande** (le plus simple) :
```bash
cd portfolio
php -S localhost:8000
```
Puis ouvrir http://localhost:8000 dans le navigateur.

**Option B — XAMPP / MAMP** : copier le dossier `portfolio` dans `htdocs`, puis ouvrir http://localhost/portfolio

---

## 2. Modifier le contenu ✏️

👉 **Presque tout se modifie dans un seul fichier : `config/content.php`**

| Je veux…                                   | Où ?                                                       |
|--------------------------------------------|------------------------------------------------------------|
| Changer un texte (bio, vision, valeurs…)   | `config/content.php`                                       |
| Changer e-mail, téléphone, statut          | `config/content.php` → `'person'`                          |
| Ajouter LinkedIn / Behance / Instagram     | `config/content.php` → `'socials'` (coller l’URL)          |
| Ajouter mon CV en téléchargement           | Mettre le PDF dans `assets/` puis remplir `'cv'`           |
| Ajouter un visuel dans une galerie         | Mettre l’image dans `assets/img/` + ajouter une ligne dans `'items'` |
| Ajouter un projet entier                   | Copier un bloc dans `'projects'` et le modifier            |
| Changer les couleurs / polices             | Variables en haut de `assets/css/style.css`                |
| Masquer / réordonner une section           | `index.php` (mettre `//` devant la ligne)                  |

### Exemple : ajouter une affiche dans « Collections »
1. Déposer `mon-affiche.jpg` dans `assets/img/`
2. Dans `config/content.php`, dans le projet `ima`, ajouter :
```php
['cat' => 'Évènement', 'img' => 'mon-affiche.jpg', 'caption' => 'Titre', 'text' => 'Description du visuel.'],
```
Si la catégorie est nouvelle, le bouton de filtre est créé automatiquement.

### Types de blocs dans un projet
- `identity` : logos + palette de couleurs (cliquer = copier le code couleur) + typographies
- `gallery`  : grille de visuels avec légendes (`'filter' => true` pour ajouter des filtres)
- `showcase` : grandes images (sites web, interfaces). `layout` : `stack`, `split` ou `masonry`
- `theme` du projet : `light` (fond crème) ou `dark` (fond nuit, comme MOUV’PRINT)

> Astuce : exporter les images en JPG, largeur ~1600 px max, pour un site rapide.

---

## 3. Structure des fichiers

```
portfolio/
├── index.php              ← assemble les sections (ordre du PDF)
├── contact.php            ← traite le formulaire de contact
├── config/content.php     ← ⭐ TOUT LE CONTENU
├── includes/              ← en-tête, pied de page, fonctions utiles
├── sections/              ← une section = un fichier (hero, about, projects…)
└── assets/
    ├── css/style.css      ← styles (variables de couleurs en haut)
    ├── css/fonts.css      ← polices hébergées localement
    ├── js/main.js         ← animations, menu, filtres, visionneuse, formulaire
    ├── fonts/             ← Gloock, Allura, Lato (licence libre OFL)
    └── img/               ← toutes les images
```

## 4. Fonctionnalités
- Écran d’ouverture animé, titre qui apparaît, photo en arche (reprise de la couverture)
- Curseur personnalisé « Voir » sur les visuels, boutons magnétiques
- Apparition des éléments au défilement, compteurs animés, frise du processus qui se remplit
- Filtres par collection + visionneuse plein écran (flèches clavier, glisser sur mobile, Échap)
- Menu mobile plein écran, lien actif selon la section
- Formulaire de contact en AJAX avec anti-spam (champ piège + délai)
- Responsive (mobile, tablette, ordinateur), accessible au clavier, respecte « réduire les animations »

## 5. Mise en ligne (GitHub Pages, gratuit)

Le site est publié automatiquement par GitHub (fichier `.github/workflows/deploy.yml`).

**Réglage à faire une seule fois** sur github.com, dans le dépôt :
`Settings` → `Pages` → *Build and deployment* → *Source* : choisir **GitHub Actions**.

Ensuite, **chaque modification envoyée sur la branche `main` met le site à jour toute seule**
(1 à 2 minutes). On suit l'avancement dans l'onglet `Actions` du dépôt.

### Modifier le site après la mise en ligne
- **Sur github.com** : ouvrir `config/content.php` → icône crayon ✏️ → modifier → *Commit changes*.
- **Ajouter une image** : ouvrir le dossier `assets/img` → *Add file* → *Upload files*.
- **Sur l'ordinateur** : modifier les fichiers puis les envoyer avec GitHub Desktop.

### Formulaire de contact
GitHub Pages n'exécute pas PHP : le formulaire passe donc par **FormSubmit** (gratuit, sans inscription).
Les messages arrivent à l'adresse indiquée dans `config/content.php` → `'form_to'`.

⚠️ **Première fois** : après le tout premier message envoyé depuis le site en ligne, FormSubmit envoie
un e-mail « Action Required: Activate FormSubmit » à cette adresse. **Cliquer sur le lien d'activation**
(regarder aussi dans les spams). Ensuite, tous les messages arrivent normalement.

Si un jour le site est hébergé chez un hébergeur PHP (o2switch, OVH…), mettre `'form_service' => 'php'`
pour utiliser `contact.php` à la place.
