/* =====================================================================
   PORTFOLIO — Célia HOUESSOU
   JavaScript « vanilla » (sans librairie), découpé en petits modules.
   Chaque module est indépendant : on peut en supprimer un sans casser
   le reste.
   ===================================================================== */

(() => {
    'use strict';

    const $  = (sel, ctx = document) => ctx.querySelector(sel);
    const $$ = (sel, ctx = document) => [...ctx.querySelectorAll(sel)];
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isTouch = window.matchMedia('(hover: none)').matches;

    /* ---------- 1. Écran de chargement ---------- */
    const loaded = () => document.documentElement.classList.add('is-loaded');
    window.addEventListener('load', () => setTimeout(loaded, reduceMotion ? 0 : 700));
    setTimeout(loaded, 3500); // sécurité si une image tarde

    /* ---------- 2. Apparition au défilement ---------- */
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-in');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });
    $$('.reveal').forEach((el) => revealObserver.observe(el));

    /* ---------- 3. En-tête : fond au scroll + masquage en descente ---------- */
    const header = $('.header');
    let lastY = window.scrollY;
    const onScrollHeader = () => {
        const y = window.scrollY;
        header.classList.toggle('is-scrolled', y > 30);
        const hide = y > lastY && y > 400 && !document.body.classList.contains('nav-open');
        header.classList.toggle('is-hidden', hide);
        lastY = y;
    };

    /* ---------- 4. Menu mobile ---------- */
    const burger = $('.burger');
    const toggleNav = (force) => {
        const open = typeof force === 'boolean' ? force : !document.body.classList.contains('nav-open');
        document.body.classList.toggle('nav-open', open);
        document.body.classList.toggle('is-locked', open);
        burger.setAttribute('aria-expanded', open);
        burger.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
    };
    burger.addEventListener('click', () => toggleNav());
    $$('.nav a').forEach((a) => a.addEventListener('click', () => toggleNav(false)));

    /* ---------- 5. Lien actif dans le menu ---------- */
    const navLinks = $$('[data-nav]');
    const sectionIds = navLinks.map((a) => a.dataset.nav);
    // Les articles de projets comptent comme la section "projets"
    const spyTargets = [...sectionIds.map((id) => document.getElementById(id)), ...$$('.project')].filter(Boolean);
    const spy = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const id = entry.target.classList.contains('project') ? 'projets' : entry.target.id;
            navLinks.forEach((a) => a.classList.toggle('is-active', a.dataset.nav === id));
        });
    }, { rootMargin: '-45% 0px -50% 0px' });
    spyTargets.forEach((s) => spy.observe(s));

    /* ---------- 6. Parallaxe légère ---------- */
    const parallaxEls = $$('.parallax');
    const onScrollParallax = () => {
        if (reduceMotion) return;
        parallaxEls.forEach((el) => {
            const speed = parseFloat(el.dataset.speed || 0.08);
            el.style.translate = `0 ${window.scrollY * speed}px`;
        });
    };

    /* ---------- 7. Ligne de progression du processus ---------- */
    const timeline = $('.timeline');
    const steps = $$('.timeline__step');
    const onScrollTimeline = () => {
        if (!timeline) return;
        const r = timeline.getBoundingClientRect();
        const vh = window.innerHeight;
        const p = Math.min(1, Math.max(0, (vh * 0.75 - r.top) / (r.height + vh * 0.2)));
        timeline.style.setProperty('--p', p.toFixed(3));
        steps.forEach((s, i) => s.classList.toggle('is-active', p >= (i + 0.5) / steps.length || p >= 0.98));
    };

    /* ---------- 7b. Barre de progression de lecture ---------- */
    const progressBar = $('.progress');
    const onScrollProgress = () => {
        if (!progressBar) return;
        const max = document.documentElement.scrollHeight - window.innerHeight;
        progressBar.style.setProperty('--progress', max > 0 ? (window.scrollY / max).toFixed(4) : 0);
    };

    /* Un seul écouteur de scroll, optimisé avec requestAnimationFrame */
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => {
            onScrollHeader();
            onScrollParallax();
            onScrollTimeline();
            onScrollProgress();
            ticking = false;
        });
    }, { passive: true });
    onScrollHeader(); onScrollTimeline();

    /* ---------- 8. Compteurs animés ---------- */
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const raw = el.dataset.target;
            const value = parseInt(raw, 10);
            const suffix = raw.replace(/[0-9]/g, '');
            if (isNaN(value) || reduceMotion) return;
            const start = performance.now();
            const duration = 1400;
            const tick = (now) => {
                const t = Math.min(1, (now - start) / duration);
                const eased = 1 - Math.pow(1 - t, 3);
                el.textContent = Math.round(value * eased) + suffix;
                if (t < 1) requestAnimationFrame(tick);
            };
            requestAnimationFrame(tick);
            counterObserver.unobserve(el);
        });
    }, { threshold: 0.6 });
    $$('.counter').forEach((c) => counterObserver.observe(c));

    /* ---------- 9. Curseur personnalisé ---------- */
    const cursor = $('.cursor');
    if (cursor && !isTouch) {
        let x = 0, y = 0, cx = 0, cy = 0;
        window.addEventListener('mousemove', (e) => {
            x = e.clientX; y = e.clientY;
            cursor.classList.add('is-visible');
        });
        document.addEventListener('mouseleave', () => cursor.classList.remove('is-visible'));
        const loop = () => {
            cx += (x - cx) * 0.2; cy += (y - cy) * 0.2;
            cursor.style.transform = `translate3d(${cx}px, ${cy}px, 0)`;
            requestAnimationFrame(loop);
        };
        loop();
        document.addEventListener('mouseover', (e) => {
            const view = e.target.closest('.zoomable');
            const hover = e.target.closest('a, button, .swatch, input, textarea');
            cursor.classList.toggle('is-view', !!view);
            cursor.classList.toggle('is-hover', !view && !!hover);
        });
    }

    /* ---------- 10. Boutons « magnétiques » ---------- */
    if (!isTouch && !reduceMotion) {
        $$('.magnetic').forEach((btn) => {
            btn.addEventListener('mousemove', (e) => {
                const r = btn.getBoundingClientRect();
                const dx = e.clientX - (r.left + r.width / 2);
                const dy = e.clientY - (r.top + r.height / 2);
                btn.style.transform = `translate(${dx * 0.18}px, ${dy * 0.25}px)`;
            });
            btn.addEventListener('mouseleave', () => { btn.style.transform = ''; });
        });
    }

    /* ---------- 11. Filtres de galerie ---------- */
    $$('.filters').forEach((bar) => {
        const gallery = bar.nextElementSibling;
        bar.addEventListener('click', (e) => {
            const btn = e.target.closest('.filter');
            if (!btn) return;
            $$('.filter', bar).forEach((b) => b.classList.toggle('is-active', b === btn));
            const f = btn.dataset.filter;
            $$('.card', gallery).forEach((card, i) => {
                const show = f === 'all' || card.dataset.cat === f;
                card.classList.toggle('is-hidden', !show);
                if (show) {
                    card.classList.remove('is-in');
                    card.style.setProperty('--d', `${(i % 6) * 0.05}s`);
                    requestAnimationFrame(() => requestAnimationFrame(() => card.classList.add('is-in')));
                }
            });
        });
    });

    /* ---------- 12. Visionneuse (lightbox) ---------- */
    const lb = $('.lightbox');
    const lbImg = $('.lightbox__img', lb);
    const lbCap = $('.lightbox__caption', lb);
    let group = [], index = 0, lastFocus = null;

    const render = () => {
        const fig = group[index];
        const img = $('img', fig);
        lbImg.classList.add('is-switching');
        setTimeout(() => {
            lbImg.src = img.currentSrc || img.src;
            lbImg.alt = img.alt;
            lbImg.classList.remove('is-switching');
        }, 150);
        const title = fig.dataset.text ? fig.dataset.title : '';
        $('.lightbox__cat', lb).textContent = fig.dataset.text ? (fig.dataset.category || '') : '';
        $('.lightbox__title', lb).textContent = title;
        $('.lightbox__text', lb).textContent = fig.dataset.text || '';
        lbCap.classList.toggle('is-empty', !fig.dataset.text);
        $('.lightbox__count', lb).textContent = group.length > 1 ? `${index + 1} / ${group.length}` : '';
        $('.lightbox__prev', lb).hidden = $('.lightbox__next', lb).hidden = group.length < 2;
    };
    const open = (fig) => {
        group = $$(`.zoomable[data-group="${fig.dataset.group}"]`).filter((f) => !f.classList.contains('is-hidden'));
        index = group.indexOf(fig);
        lastFocus = document.activeElement;
        lb.hidden = false;
        document.body.classList.add('is-locked');
        render();
        requestAnimationFrame(() => lb.classList.add('is-open'));
        $('.lightbox__close', lb).focus();
    };
    const close = () => {
        lb.classList.remove('is-open');
        document.body.classList.remove('is-locked');
        setTimeout(() => { lb.hidden = true; }, 350);
        if (lastFocus) lastFocus.focus();
    };
    const go = (dir) => { index = (index + dir + group.length) % group.length; render(); };

    $$('.zoomable').forEach((fig) => {
        fig.setAttribute('tabindex', '0');
        fig.setAttribute('role', 'button');
        fig.addEventListener('click', () => open(fig));
        fig.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(fig); } });
    });
    $('.lightbox__close', lb).addEventListener('click', close);
    $('.lightbox__prev', lb).addEventListener('click', () => go(-1));
    $('.lightbox__next', lb).addEventListener('click', () => go(1));
    lb.addEventListener('click', (e) => { if (e.target === lb) close(); });
    document.addEventListener('keydown', (e) => {
        if (lb.hidden) { if (e.key === 'Escape' && document.body.classList.contains('nav-open')) toggleNav(false); return; }
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowRight') go(1);
        if (e.key === 'ArrowLeft') go(-1);
    });
    // Glisser du doigt sur mobile
    let touchX = null;
    lb.addEventListener('touchstart', (e) => { touchX = e.touches[0].clientX; }, { passive: true });
    lb.addEventListener('touchend', (e) => {
        if (touchX === null) return;
        const dx = e.changedTouches[0].clientX - touchX;
        if (Math.abs(dx) > 50) go(dx < 0 ? 1 : -1);
        touchX = null;
    });

    /* ---------- 13. Copier (couleurs, e-mail) ---------- */
    const toast = $('.toast');
    let toastTimer;
    const showToast = (msg) => {
        toast.textContent = msg;
        toast.classList.add('is-visible');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => toast.classList.remove('is-visible'), 2200);
    };
    $$('.swatch[data-copy]').forEach((el) => {
        el.addEventListener('click', async () => {
            try { await navigator.clipboard.writeText(el.dataset.copy); showToast(`${el.dataset.copy} copié ✦`); }
            catch { showToast(el.dataset.copy); }
        });
    });

    /* ---------- 14. Formulaire de contact (envoi sans recharger) ---------- */
    const form = $('.form');
    if (form) {
        const feedback = $('.form__feedback', form);
        const setMsg = (msg, ok) => {
            feedback.textContent = msg;
            feedback.className = 'form__feedback ' + (ok ? 'is-success' : 'is-error');
        };
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            // Validation côté navigateur
            let valid = true;
            $$('[required]', form).forEach((input) => {
                const bad = !input.value.trim() || (input.type === 'email' && !/^\S+@\S+\.\S+$/.test(input.value));
                input.closest('.field').classList.toggle('is-invalid', bad);
                if (bad) valid = false;
            });
            if (!valid) return setMsg('Merci de remplir correctement les champs obligatoires.', false);

            form.classList.add('is-sending');
            setMsg('Envoi en cours…', true);
            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'fetch' },
                });
                const data = await res.json();
                // Réponse de contact.php ({success: true}) ou de FormSubmit ({success: "true"})
                const ok = data.success === true || data.success === 'true';
                const isFormSubmit = !form.action.endsWith('contact.php'); // service externe : messages en français
                const msg = ok
                    ? (isFormSubmit ? 'Merci ! Votre message a bien été envoyé, je vous réponds très vite.' : data.message)
                    : (isFormSubmit ? 'Le message n’a pas pu être envoyé. Écrivez-moi directement par e-mail.' : data.message);
                setMsg(msg, ok);
                if (ok) form.reset();
            } catch {
                setMsg('Oups, le message n’a pas pu être envoyé. Écrivez-moi directement par e-mail.', false);
            } finally {
                form.classList.remove('is-sending');
            }
        });
        $$('input, textarea', form).forEach((i) => i.addEventListener('input', () => i.closest('.field')?.classList.remove('is-invalid')));
    }

    /* ---------- 15. Typographie animée : rôles qui défilent ---------- */
    const rotator = $('.rotator');
    if (rotator && !reduceMotion) {
        let words = [];
        try { words = JSON.parse(rotator.dataset.words || '[]'); } catch { words = []; }
        let w = 0;
        if (words.length > 1) {
            setInterval(() => {
                rotator.classList.add('is-out');
                setTimeout(() => {
                    w = (w + 1) % words.length;
                    rotator.textContent = words[w];
                    rotator.classList.remove('is-out');
                    rotator.classList.add('is-in-start');
                    requestAnimationFrame(() => requestAnimationFrame(() => rotator.classList.remove('is-in-start')));
                }, 450);
            }, 2800);
        }
    }

    /* ---------- 16. Halo lumineux sur les cartes compétences ---------- */
    if (!isTouch) {
        $$('.skill').forEach((card) => {
            card.addEventListener('mousemove', (e) => {
                const r = card.getBoundingClientRect();
                card.style.setProperty('--mx', `${e.clientX - r.left}px`);
                card.style.setProperty('--my', `${e.clientY - r.top}px`);
            });
        });
    }

    /* ---------- 17. Année auto / petits détails ---------- */
    console.log('%c✦ Portfolio Célia HOUESSOU', 'color:#b4532a;font-size:14px;font-family:Georgia');
})();
