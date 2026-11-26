<?php /* 07 — CONTACT */ $ct = $c['contact']; ?>
<section class="contact section" id="contact">
    <?= leaf('contact__leaf') ?>
    <div class="container contact__grid">
        <div class="contact__intro">
            <?= eyebrow(7) ?>
            <p class="script reveal"><?= e($ct['kicker']) ?></p>
            <h2 class="title-xxl reveal">Contact</h2>
            <div class="contact__box reveal">
                <?php foreach ($ct['text'] as $t): ?><p><?= e($t) ?></p><?php endforeach; ?>
                <ul class="contact__links">
                    <li><a href="tel:<?= e(preg_replace('/\s+/', '', $p['phone'])) ?>"><?= icon('phone') ?><?= e($p['phone']) ?></a></li>
                    <li><a href="mailto:<?= e($p['email']) ?>" data-copy="<?= e($p['email']) ?>"><?= icon('mail') ?><?= e($p['email']) ?></a></li>
                    <li><span><?= icon('pin') ?><?= e($p['location']) ?></span></li>
                </ul>
                <?php if (!empty($p['cv'])): ?>
                    <a class="btn btn--light" href="<?= e($p['cv']) ?>" download>Télécharger mon CV</a>
                <?php endif; ?>
            </div>
        </div>

        <?php
            $service = $ct['form_service'] ?? 'php';
            $useFormSubmit = $service === 'formsubmit';
            $useWeb3 = $service === 'web3forms';
            $formAction = $useFormSubmit ? 'https://formsubmit.co/ajax/' . $ct['form_to']
                        : ($useWeb3 ? 'https://api.web3forms.com/submit' : 'contact.php');
        ?>
        <form class="form reveal" action="<?= e($formAction) ?>" method="post" novalidate>
            <?php if ($useFormSubmit): ?>
                <input type="hidden" name="_subject" value="Nouveau message depuis ton portfolio">
                <input type="hidden" name="_template" value="table">
                <input type="hidden" name="_captcha" value="false">
            <?php endif; ?>
            <?php if ($useWeb3): ?>
                <input type="hidden" name="access_key" value="<?= e($ct['web3forms_key'] ?? '') ?>">
                <input type="hidden" name="subject" value="Nouveau message depuis ton portfolio">
                <input type="hidden" name="from_name" value="Portfolio Célia Houessou">
                <input type="checkbox" name="botcheck" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">
            <?php endif; ?>
            <div class="form__row">
                <label class="field"><input type="text" name="name" required placeholder=" " autocomplete="name"><span>Nom</span></label>
                <label class="field"><input type="email" name="email" required placeholder=" " autocomplete="email"><span>E-mail</span></label>
            </div>
            <label class="field"><input type="text" name="sujet" placeholder=" "><span>Sujet (alternance, stage, projet…)</span></label>
            <label class="field"><textarea name="message" rows="5" required placeholder=" "></textarea><span>Votre message</span></label>
            <!-- Champ piège anti-spam : ne pas supprimer -->
            <input type="text" name="_honey" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">
            <button type="submit" class="btn btn--block magnetic">Envoyer le message <?= icon('arrow') ?></button>
            <p class="form__feedback" role="status" aria-live="polite"></p>
        </form>
    </div>
</section>
