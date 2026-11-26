</main>

<footer class="footer">
    <a href="#contact" class="footer__big">Créons ensemble <span>✦</span></a>
    <div class="footer__row">
        <p>© <?= e($c['site']['year']) ?> <?= e($p['first_name']) ?> <?= e($p['last_name']) ?> — <?= e($p['role']) ?></p>
        <ul class="footer__links">
            <li><a href="mailto:<?= e($p['email']) ?>"><?= e($p['email']) ?></a></li>
            <?php foreach ($p['socials'] as $name => $url): if (!$url) continue; ?>
                <li><a href="<?= e($url) ?>" target="_blank" rel="noopener"><?= e($name) ?></a></li>
            <?php endforeach; ?>
        </ul>
        <a href="#top" class="footer__top">Haut de page ↑</a>
    </div>
</footer>

<!-- Visionneuse d'images (lightbox) -->
<div class="lightbox" role="dialog" aria-modal="true" aria-label="Visionneuse d'images" hidden>
    <button class="lightbox__close" aria-label="Fermer">×</button>
    <button class="lightbox__prev" aria-label="Image précédente">‹</button>
    <figure class="lightbox__figure">
        <img class="lightbox__img" src="" alt="">
        <figcaption class="lightbox__caption">
            <span class="lightbox__cat"></span>
            <strong class="lightbox__title"></strong>
            <span class="lightbox__text"></span>
        </figcaption>
    </figure>
    <button class="lightbox__next" aria-label="Image suivante">›</button>
    <span class="lightbox__count"></span>
</div>

<div class="toast" role="status" aria-live="polite"></div>

<script src="<?= asset('assets/js/main.js') ?>"></script>
</body>
</html>
