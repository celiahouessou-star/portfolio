<?php /* 05 — PROJETS (tout le contenu vient de config/content.php) */ $pi = $c['projects_intro']; ?>
<section class="projects-intro section" id="projets">
    <div class="container projects-intro__grid">
        <div>
            <?= eyebrow(5) ?>
            <h2 class="title-xxl reveal"><?= e($pi['title']) ?></h2>
            <p class="script reveal"><?= e($pi['subtitle']) ?></p>
        </div>
        <div class="projects-intro__side">
            <p class="lead reveal"><?= e($pi['text']) ?></p>
            <p class="note reveal"><?= e($pi['note']) ?></p>
            <ul class="project-index reveal">
                <?php foreach ($c['projects'] as $k => $pr): ?>
                    <li><a href="#<?= e($pr['id']) ?>"><span><?= $k + 1 ?></span><?= e($pr['title']) ?><em><?= e($pr['type']) ?></em></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<?php foreach ($c['projects'] as $k => $pr): ?>
<article class="project project--<?= e($pr['theme']) ?>" id="<?= e($pr['id']) ?>">
    <div class="container">

        <!-- En-tête du projet -->
        <header class="project__head">
            <div class="project__titles">
                <p class="project__type reveal"><?= e($pr['type']) ?></p>
                <h2 class="project__title reveal"><?= e($pr['title']) ?></h2>
            </div>
            <dl class="project__meta reveal">
                <?php foreach ($pr['meta'] as $label => $value): ?>
                    <div><dt><?= e($label) ?></dt><dd><?= e($value) ?></dd></div>
                <?php endforeach; ?>
            </dl>
        </header>

        <p class="project__intro reveal"><?= e($pr['intro']) ?></p>
        <?= project_links($pr['links'] ?? []) ?>

        <!-- Image(s) de couverture -->
        <div class="project__cover project__cover--<?= count($pr['cover']) ?> reveal">
            <?php foreach ($pr['cover'] as $img): ?>
                <figure class="zoomable" data-group="<?= e($pr['id']) ?>" data-title="<?= e($pr['title']) ?>">
                    <img src="<?= img($img) ?>"<?= dims($img) ?> alt="<?= e($pr['title']) ?>" loading="lazy">
                </figure>
            <?php endforeach; ?>
        </div>

        <!-- Blocs du projet -->
        <?php foreach ($pr['blocks'] as $b): ?>

            <?php if ($b['kind'] === 'identity'): ?>
                <section class="block identity">
                    <h3 class="block__title reveal"><?= e($b['title']) ?></h3>
                    <div class="identity__grid">
                        <div class="identity__panel identity__panel--logos reveal">
                            <p class="script script--sm">Logo</p>
                            <div class="identity__logos">
                                <?php foreach ($b['logos'] as $logo): ?>
                                    <figure class="zoomable" data-group="<?= e($pr['id']) ?>-logo" data-title="Logo <?= e($pr['title']) ?>">
                                        <img src="<?= img($logo) ?>"<?= dims($logo) ?> alt="Déclinaison du logo <?= e($pr['title']) ?>" loading="lazy">
                                    </figure>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="identity__panel reveal">
                            <p class="script script--sm">Palette de couleurs</p>
                            <div class="swatches">
                                <?php foreach ($b['colors'] as $hex): ?>
                                    <button class="swatch" style="--c: <?= e($hex) ?>" data-copy="<?= e($hex) ?>" title="Copier <?= e($hex) ?>">
                                        <span class="swatch__chip"></span>
                                        <span class="swatch__hex"><?= e($hex) ?></span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                            <p class="script script--sm">Typographie</p>
                            <div class="identity__fonts">
                                <?php foreach ($b['fonts'] as $font): ?>
                                    <img src="<?= img($font) ?>"<?= dims($font) ?> alt="Typographie" loading="lazy">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif ($b['kind'] === 'gallery'): ?>
                <section class="block">
                    <h3 class="block__title reveal"><?= e($b['title']) ?></h3>

                    <?php if (!empty($b['filter'])):
                        $cats = array_values(array_unique(array_column($b['items'], 'cat'))); ?>
                        <div class="filters reveal" role="tablist">
                            <button class="filter is-active" data-filter="all">Tout <sup><?= count($b['items']) ?></sup></button>
                            <?php foreach ($cats as $cat):
                                $n = count(array_filter($b['items'], fn($it) => $it['cat'] === $cat)); ?>
                                <button class="filter" data-filter="<?= e(slug($cat)) ?>"><?= e($cat) ?> <sup><?= $n ?></sup></button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="gallery gallery--<?= (int) ($b['cols'] ?? 3) ?>">
                        <?php foreach ($b['items'] as $it): ?>
                            <figure class="card zoomable reveal"
                                    data-cat="<?= e(slug($it['cat'] ?? '')) ?>"
                                    data-group="<?= e($pr['id']) ?>-gallery"
                                    data-category="<?= e($it['cat'] ?? $b['title']) ?>"
                                    data-title="<?= e($it['caption'] ?? '') ?>"
                                    data-text="<?= e($it['text'] ?? '') ?>">
                                <div class="card__media">
                                    <img src="<?= img($it['img']) ?>"<?= dims($it['img']) ?> alt="<?= e($it['caption'] ?? '') ?>" loading="lazy">
                                </div>
                                <figcaption>
                                    <?php if (!empty($it['cat'])): ?><span class="card__cat"><?= e($it['cat']) ?></span><?php endif; ?>
                                    <strong><?= e($it['caption'] ?? '') ?></strong>
                                </figcaption>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                </section>

            <?php elseif ($b['kind'] === 'showcase'): ?>
                <section class="block showcase showcase--<?= e($b['layout'] ?? 'stack') ?>">
                    <div class="showcase__head">
                        <h3 class="block__title reveal"><?= e($b['title']) ?></h3>
                        <?php if (!empty($b['text'])): ?><p class="reveal"><?= e($b['text']) ?></p><?php endif; ?>
                        <?= project_links($b['links'] ?? []) ?>
                    </div>
                    <div class="showcase__items">
                        <?php foreach ($b['items'] as $img): ?>
                            <figure class="zoomable reveal" data-group="<?= e($pr['id']) ?>-<?= e(slug($b['title'])) ?>" data-title="<?= e($b['title']) ?>">
                                <img src="<?= img($img) ?>"<?= dims($img) ?> alt="<?= e($b['title']) ?>" loading="lazy">
                            </figure>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php endforeach; ?>

        <?php $next = $c['projects'][$k + 1] ?? null; ?>
        <a class="project__next reveal" href="#<?= $next ? e($next['id']) : 'valeurs' ?>">
            <span>Suivant</span>
            <strong><?= $next ? e($next['title']) : 'Mes valeurs' ?></strong>
            <?= icon('arrow') ?>
        </a>
    </div>
</article>
<?php endforeach; ?>
