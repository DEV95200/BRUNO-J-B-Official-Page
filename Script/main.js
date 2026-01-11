// =========================================================
// PORTFOLIO JAVASCRIPT (Enhanced 2026)
// - Plus dynamique (data-driven)
// - UX pro (filtres, modal, thème, progress nav)
// - GIS (Leaflet + GeoJSON)
// =========================================================

(() => {
  'use strict';

  // ---------- Helpers ----------
  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));

  function toast(message) {
    const el = $('#toast');
    if (!el) return;
    el.textContent = message;
    el.classList.add('show');
    window.clearTimeout(el._t);
    el._t = window.setTimeout(() => el.classList.remove('show'), 2400);
  }

  function prefersReducedMotion() {
    return window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  // ---------- Theme ----------
  function initTheme() {
    const btn = $('.theme-toggle');
    if (!btn) return;

    const root = document.documentElement;
    const saved = localStorage.getItem('theme');
    if (saved === 'dark') root.setAttribute('data-theme', 'dark');

    const setIcon = () => {
      const isDark = root.getAttribute('data-theme') === 'dark';
      const icon = btn.querySelector('.theme-icon');
      if (icon) icon.textContent = isDark ? '☀️' : '🌙';
      btn.setAttribute('aria-label', isDark ? 'Basculer en mode clair' : 'Basculer en mode sombre');
      btn.title = isDark ? 'Mode clair' : 'Mode sombre';
    };

    setIcon();

    btn.addEventListener('click', () => {
      const isDark = root.getAttribute('data-theme') === 'dark';
      if (isDark) {
        root.removeAttribute('data-theme');
        localStorage.setItem('theme', 'light');
      } else {
        root.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
      }
      setIcon();
    });
  }

  // ---------- Mobile nav ----------
  function initMobileNav() {
    const navToggle = $('.nav-toggle');
    const navMenu = $('.nav-menu');

    if (!navToggle || !navMenu) return;

    navToggle.addEventListener('click', () => {
      navMenu.classList.toggle('active');
      navToggle.classList.toggle('active');
    });

    // close on outside click (mobile)
    document.addEventListener('click', (e) => {
      const isOpen = navMenu.classList.contains('active');
      if (!isOpen) return;
      const within = navMenu.contains(e.target) || navToggle.contains(e.target);
      if (!within) {
        navMenu.classList.remove('active');
        navToggle.classList.remove('active');
      }
    });
  }

  // ---------- Smooth scroll ----------
  function initSmoothScroll() {
    const navLinks = $$('.nav-link');
    const progressLinks = $$('.progress-dot');

    const go = (href) => {
      const target = $(href);
      if (!target) return;
      target.scrollIntoView({ behavior: prefersReducedMotion() ? 'auto' : 'smooth', block: 'start' });
    };

    [...navLinks, ...progressLinks].forEach((link) => {
      link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');
        if (!href || !href.startsWith('#')) return;
        e.preventDefault();
        go(href);

        const navMenu = $('.nav-menu');
        const navToggle = $('.nav-toggle');
        navMenu?.classList.remove('active');
        navToggle?.classList.remove('active');
      });
    });
  }

  // ---------- Scroll animations ----------
  function initScrollAnimations() {
    const observerOptions = { threshold: 0.18, rootMargin: '0px 0px -40px 0px' };

    // Counter animation
    function animateCounter(el, end, duration = 1400) {
      let startTs = null;
      const start = 0;
      const step = (ts) => {
        if (!startTs) startTs = ts;
        const p = clamp((ts - startTs) / duration, 0, 1);
        el.textContent = String(Math.floor(p * (end - start) + start));
        if (p < 1) requestAnimationFrame(step);
        else el.textContent = String(end);
      };
      requestAnimationFrame(step);
    }

    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('animate-in');

        // Stats numbers (dans tes carousels)
        if (entry.target.classList.contains('stat-card')) {
          const statNumber = $('.stat-number', entry.target);
          if (statNumber && !statNumber.dataset.animated) {
            statNumber.dataset.animated = '1';
            const target = parseInt(statNumber.getAttribute('data-target') || statNumber.textContent, 10);
            if (!Number.isNaN(target)) {
              statNumber.textContent = '0';
              setTimeout(() => animateCounter(statNumber, target, 1500), 200);
            }
          }
        }
      });
    }, observerOptions);

    $$('.section, .project-card, .skill-category, .stat-card').forEach((el) => io.observe(el));
  }

  // ---------- Back to top ----------
  function initBackToTop() {
    const btn = $('.back-to-top');
    if (!btn) return;

    const onScroll = () => {
      btn.classList.toggle('visible', window.scrollY > 650);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    btn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: prefersReducedMotion() ? 'auto' : 'smooth' });
    });
  }

  // ---------- Progress navigation ----------
  function initProgressNav() {
    const container = $('.progress-bar-container');
    if (!container) return;

    const sections = ['hero', 'about', 'skills', 'projects', 'gis', 'contact']
      .map((id) => document.getElementById(id))
      .filter(Boolean);

    const dots = $$('.progress-dot', container);
    const line = $('.progress-line', container);

    const update = () => {
      const doc = document.documentElement;
      const scrollTop = window.scrollY || doc.scrollTop;
      const max = (doc.scrollHeight - doc.clientHeight) || 1;
      const pct = clamp((scrollTop / max) * 100, 0, 100);

      // CSS var used by your progress-line ::before and ::after
      container.style.setProperty('--progress-height', `${pct}%`);

      // active dot: section closest to top
      let activeId = sections[0]?.id || 'hero';
      for (const s of sections) {
        const r = s.getBoundingClientRect();
        if (r.top <= 120) activeId = s.id;
      }
      dots.forEach((d) => d.classList.toggle('active', d.dataset.section === activeId));
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
  }

  // ---------- Projects (data-driven) ----------
  const PROJECTS = [
    {
      id: 'portfolio',
      title: 'Portfolio Interactif',
      emoji: '✨',
      category: 'Web',
      desc: 'Portfolio moderne avec carrousels, animations au scroll, filtres et modal.',
      tech: ['HTML', 'CSS', 'JavaScript'],
      highlights: ['Carrousels (About/Stats/Timeline)', 'Progress nav', 'Mode sombre'],
      demo: '#',
      code: '#',
      geo: { lat: 14.6161, lng: -61.0588, label: 'Fort-de-France' }
    },
    {
      id: 'taskapp',
      title: 'Application de gestion de tâches',
      emoji: '✅',
      category: 'Front',
      desc: 'App responsive : CRUD, filtres, persistance locale et UX fluide.',
      tech: ['React', 'LocalStorage', 'UX'],
      highlights: ['Architecture composants', 'Recherche & filtres', 'Accessibilité'],
      demo: '#',
      code: '#',
      geo: { lat: 14.606, lng: -61.07, label: 'Zone projet' }
    },
    {
      id: 'ecommerce',
      title: 'Mini E-commerce',
      emoji: '🛒',
      category: 'Back-end',
      desc: 'Boutique en ligne : produits, panier et checkout (structure démonstration).',
      tech: ['PHP', 'MySQL', 'Stripe'],
      highlights: ['Pages dynamiques', 'Sécurité basique', 'Responsive'],
      demo: '#',
      code: '#',
      geo: null
    },
    {
      id: 'gis',
      title: 'WebGIS (Leaflet + GeoJSON)',
      emoji: '🗺️',
      category: 'GIS',
      desc: 'Carte interactive : points, popups, couches et rendu data-driven.',
      tech: ['Leaflet', 'GeoJSON', 'OpenStreetMap'],
      highlights: ['Couches (layers)', 'Popups & légende', 'Données structurées'],
      demo: '#gis',
      code: '#',
      geo: { lat: 14.6415, lng: -61.0242, label: 'Point GIS' }
    },
    {
      id: 'ui',
      title: 'Prototype UI/UX',
      emoji: '🎨',
      category: 'UI/UX',
      desc: 'Prototype (wireframe → design) + guidelines (typography, components).',
      tech: ['Figma', 'Design System', 'UI'],
      highlights: ['Hiérarchie visuelle', 'Composants réutilisables', 'Micro-interactions'],
      demo: '#',
      code: '#',
      geo: null
    }
  ];

  const CATEGORIES = ['Tous', 'Web', 'Front', 'Back-end', 'UI/UX', 'GIS'];

  function createProjectCard(p) {
    const card = document.createElement('article');
    card.className = 'project-card';
    card.tabIndex = 0;
    card.setAttribute('role', 'button');
    card.setAttribute('aria-label', `Ouvrir le projet ${p.title}`);
    card.dataset.projectId = p.id;

    card.innerHTML = `
      <div class="project-head">
        <div class="project-emoji" aria-hidden="true">${p.emoji}</div>
        <div style="flex:1">
          <h3 class="project-title">${p.title}</h3>
          <div class="project-badge">${p.category}</div>
        </div>
      </div>
      <p class="project-desc">${p.desc}</p>
      <div class="project-tags">
        ${p.tech.map(t => `<span class="project-tag">${t}</span>`).join('')}
      </div>
      <div class="project-meta">
        <span class="project-badge">Détails</span>
        <div class="project-actions" aria-hidden="true">
          ${p.demo ? `<a href="${p.demo}" tabindex="-1">Démo</a>` : ''}
          ${p.code ? `<a href="${p.code}" tabindex="-1">Code</a>` : ''}
        </div>
      </div>
    `;

    // Pretty hover light following cursor
    card.addEventListener('mousemove', (e) => {
      const r = card.getBoundingClientRect();
      const mx = ((e.clientX - r.left) / r.width) * 100;
      const my = ((e.clientY - r.top) / r.height) * 100;
      card.style.setProperty('--mx', `${mx}%`);
      card.style.setProperty('--my', `${my}%`);
    });

    return card;
  }

  function openProjectModal(project) {
    const modal = $('#projectModal');
    const body = $('.modal-body', modal);
    if (!modal || !body) return;

    const links = [];
    if (project.demo && project.demo !== '#') links.push({ label: 'Démo', href: project.demo });
    if (project.code && project.code !== '#') links.push({ label: 'Code source', href: project.code });
    if (project.demo === '#gis') links.push({ label: 'Aller à la section GIS', href: '#gis' });

    body.innerHTML = `
      <div class="project-head">
        <div class="project-emoji" aria-hidden="true">${project.emoji}</div>
        <div style="flex:1">
          <h3>${project.title}</h3>
          <p class="muted">${project.category} • ${project.tech.join(' • ')}</p>
        </div>
      </div>

      <div class="modal-grid">
        <div class="modal-panel">
          <h4>Résumé</h4>
          <p class="muted">${project.desc}</p>

          <h4 style="margin-top:1rem;">Points forts</h4>
          <ul class="muted" style="padding-left:1.1rem;">
            ${project.highlights.map(h => `<li style="margin:0.5rem 0;">${h}</li>`).join('')}
          </ul>

          ${links.length ? `
          <div class="modal-links">
            ${links.map(l => `<a class="btn btn-secondary" href="${l.href}">${l.label}</a>`).join('')}
          </div>` : ''}
        </div>

        <div class="modal-panel">
          <h4>Tech & rôles</h4>
          <div class="project-tags" style="margin-top:0.75rem;">
            ${project.tech.map(t => `<span class="project-tag">${t}</span>`).join('')}
          </div>

          <h4 style="margin-top:1.1rem;">Ce que ça prouve</h4>
          <p class="muted">Structuration, UI soignée, logique JS propre, et capacité à livrer une page complète.</p>

          ${project.geo ? `
            <div style="margin-top:1rem; font-size:0.95rem;">
              <div class="project-badge">📍 ${project.geo.label}</div>
              <p class="muted" style="margin-top:0.5rem;">Coordonnées: ${project.geo.lat.toFixed(4)}, ${project.geo.lng.toFixed(4)}</p>
            </div>
          ` : ''}
        </div>
      </div>
    `;

    modal.classList.add('open');
    modal.setAttribute('aria-hidden', 'false');

    const closeBtn = $('.modal-close', modal);
    closeBtn?.focus();

    // focus trap (simple)
    const focusables = $$('a, button, input, [tabindex]:not([tabindex="-1"])', modal)
      .filter(el => !el.hasAttribute('disabled'));
    const first = focusables[0];
    const last = focusables[focusables.length - 1];

    modal._onKey = (e) => {
      if (e.key === 'Escape') {
        closeProjectModal();
        return;
      }
      if (e.key !== 'Tab' || focusables.length < 2) return;
      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault(); last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault(); first.focus();
      }
    };
    document.addEventListener('keydown', modal._onKey);

    toast(`Ouvert: ${project.title}`);
  }

  function closeProjectModal() {
    const modal = $('#projectModal');
    if (!modal) return;
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden', 'true');
    document.removeEventListener('keydown', modal._onKey);
  }

  function initProjects() {
    const grid = $('#projects-grid');
    const filtersRoot = $('.project-filters');
    const searchInput = $('#projectSearch');
    if (!grid || !filtersRoot || !searchInput) return;

    // Filters
    filtersRoot.innerHTML = '';
    CATEGORIES.forEach((cat, i) => {
      const btn = document.createElement('button');
      btn.className = 'filter-btn';
      btn.type = 'button';
      btn.setAttribute('role', 'tab');
      btn.setAttribute('aria-selected', i === 0 ? 'true' : 'false');
      btn.dataset.category = cat;
      btn.textContent = cat;
      filtersRoot.appendChild(btn);
    });

    let activeCategory = 'Tous';
    let query = '';

    const render = () => {
      grid.innerHTML = '';
      const normalized = query.trim().toLowerCase();

      const list = PROJECTS.filter((p) => {
        const catOk = activeCategory === 'Tous' || p.category === activeCategory;
        if (!catOk) return false;

        if (!normalized) return true;
        const hay = `${p.title} ${p.desc} ${p.category} ${p.tech.join(' ')}`.toLowerCase();
        return hay.includes(normalized);
      });

      if (!list.length) {
        const empty = document.createElement('div');
        empty.className = 'muted';
        empty.style.textAlign = 'center';
        empty.style.padding = '2rem 0';
        empty.textContent = 'Aucun projet ne correspond à ce filtre.';
        grid.appendChild(empty);
        return;
      }

      list.forEach((p) => grid.appendChild(createProjectCard(p)));

      // Observe new cards for appear animation (re-use existing CSS .project-card selector)
      // (IntersectionObserver set up elsewhere will handle it if it observes .project-card globally)
    };

    filtersRoot.addEventListener('click', (e) => {
      const btn = e.target.closest('.filter-btn');
      if (!btn) return;
      activeCategory = btn.dataset.category || 'Tous';
      $$('.filter-btn', filtersRoot).forEach((b) => b.setAttribute('aria-selected', b === btn ? 'true' : 'false'));
      render();
    });

    searchInput.addEventListener('input', () => {
      query = searchInput.value;
      render();
    });

    // Modal interactions
    grid.addEventListener('click', (e) => {
      const card = e.target.closest('.project-card');
      if (!card) return;
      const id = card.dataset.projectId;
      const p = PROJECTS.find(x => x.id === id);
      if (p) openProjectModal(p);
    });
    grid.addEventListener('keydown', (e) => {
      if (e.key !== 'Enter' && e.key !== ' ') return;
      const card = e.target.closest('.project-card');
      if (!card) return;
      e.preventDefault();
      const id = card.dataset.projectId;
      const p = PROJECTS.find(x => x.id === id);
      if (p) openProjectModal(p);
    });

    const modal = $('#projectModal');
    modal?.addEventListener('click', (e) => {
      const close = e.target.closest('[data-close="true"]');
      if (close) closeProjectModal();
    });

    render();
  }

  // ---------- Carousels (generic) ----------
  class BasicCarousel {
    constructor(config) {
      this.root = $(config.root);
      this.track = $(config.track, this.root || document);
      this.items = $$(config.item, this.root || document);
      this.indicators = $$(config.indicator, this.root || document);
      this.prevBtn = $(config.prev, this.root || document);
      this.nextBtn = $(config.next, this.root || document);
      this.activeClass = config.activeClass || 'active';
      this.current = 0;
      this.isAnimating = false;
      this.autoMs = config.autoMs || 0;
      this.timer = null;

      if (!this.root || !this.track || !this.items.length) return;
      this.init();
    }

    init() {
      this.prevBtn?.addEventListener('click', () => this.prev());
      this.nextBtn?.addEventListener('click', () => this.next());
      this.indicators.forEach((ind, idx) => ind.addEventListener('click', () => this.go(idx)));

      // swipe
      let sx = null;
      const area = this.root;
      area.addEventListener('touchstart', (e) => { sx = e.touches?.[0]?.clientX ?? null; }, { passive: true });
      area.addEventListener('touchend', (e) => {
        if (sx == null) return;
        const ex = e.changedTouches?.[0]?.clientX ?? sx;
        const dx = sx - ex;
        if (Math.abs(dx) > 55) dx > 0 ? this.next() : this.prev();
        sx = null;
      });

      // keyboard (when in viewport)
      document.addEventListener('keydown', (e) => {
        const r = this.root.getBoundingClientRect();
        const inView = r.top < window.innerHeight && r.bottom > 0;
        if (!inView) return;
        if (e.key === 'ArrowLeft') this.prev();
        if (e.key === 'ArrowRight') this.next();
      });

      this.update(false);
      if (this.autoMs) this.startAuto();
      this.root.addEventListener('mouseenter', () => this.stopAuto());
      this.root.addEventListener('mouseleave', () => this.startAuto());
    }

    update(animate = true) {
      if (this.isAnimating && animate) return;
      this.isAnimating = true;

      const x = -this.current * 100;
      this.track.style.transform = `translateX(${x}%)`;

      this.items.forEach((it, idx) => it.classList.toggle(this.activeClass, idx === this.current));
      this.indicators.forEach((it, idx) => it.classList.toggle(this.activeClass, idx === this.current));

      window.setTimeout(() => { this.isAnimating = false; }, animate ? 550 : 0);
    }

    next() {
      this.current = (this.current + 1) % this.items.length;
      this.update();
    }
    prev() {
      this.current = (this.current - 1 + this.items.length) % this.items.length;
      this.update();
    }
    go(idx) {
      if (idx === this.current) return;
      this.current = clamp(idx, 0, this.items.length - 1);
      this.update();
    }

    startAuto() {
      if (!this.autoMs) return;
      this.stopAuto();
      this.timer = window.setInterval(() => this.next(), this.autoMs);
    }
    stopAuto() {
      if (this.timer) window.clearInterval(this.timer);
      this.timer = null;
    }
  }

  function initCarousels() {
    // About main
    new BasicCarousel({
      root: '.about-carousel-wrapper',
      track: '.about-carousel-track',
      item: '.carousel-card',
      indicator: '.carousel-indicators .indicator',
      prev: '.carousel-prev',
      next: '.carousel-next',
      activeClass: 'active',
      autoMs: 6500
    });

    // Stats
    new BasicCarousel({
      root: '.stats-carousel-wrapper',
      track: '.stats-carousel-track',
      item: '.carousel-stats',
      indicator: '.stats-indicators .indicator',
      prev: '.carousel-prev-stats',
      next: '.carousel-next-stats',
      activeClass: 'active',
      autoMs: 7200
    });

    // Timeline
    new BasicCarousel({
      root: '.timeline-carousel-wrapper',
      track: '.timeline-carousel-track',
      item: '.carousel-timeline',
      indicator: '.timeline-indicators .indicator',
      prev: '.carousel-prev-timeline',
      next: '.carousel-next-timeline',
      activeClass: 'active',
      autoMs: 8200
    });
  }

  // ---------- Contact form (UX) ----------
  function initContactForm() {
    const form = $('.contact-form');
    if (!form) return;

    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const btn = $('.btn', form);
      const original = btn?.textContent || 'Envoyer';
      if (btn) { btn.textContent = 'Envoi en cours...'; btn.disabled = true; }

      const name = ($('#name', form)?.value || '').trim();
      const email = ($('#email', form)?.value || '').trim();
      const msg = ($('#message', form)?.value || '').trim();

      // validation simple
      const okEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

      window.setTimeout(() => {
        if (!name || !okEmail || msg.length < 10) {
          toast('Vérifie le formulaire (email valide + message ≥ 10 caractères).');
          if (btn) { btn.textContent = original; btn.disabled = false; }
          return;
        }

        toast('Message prêt ! Ouverture de ton client mail…');
        // fallback mailto (simple & fiable)
        const subject = encodeURIComponent(`Contact Portfolio — ${name}`);
        const body = encodeURIComponent(`Nom: ${name}\nEmail: ${email}\n\nMessage:\n${msg}`);
        window.location.href = `mailto:gaetan.bruno.jean.baptiste@gmail.com?subject=${subject}&body=${body}`;

        if (btn) {
          btn.textContent = 'Message préparé ✓';
          window.setTimeout(() => { btn.textContent = original; btn.disabled = false; }, 1800);
        }
        form.reset();
      }, 850);
    });
  }

  // ---------- GIS (Leaflet) ----------
  function initGIS() {
    const mapEl = document.getElementById('map');
    if (!mapEl) return;
    if (typeof window.L === 'undefined') {
      toast('Leaflet non chargé (GIS).');
      return;
    }

    // Base map (Martinique)
    const map = window.L.map(mapEl, { scrollWheelZoom: false }).setView([14.6415, -61.0242], 11);

    window.L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap',
      maxZoom: 19
    }).addTo(map);

    // GeoJSON: points de projets (exemple)
    const geojson = {
      type: 'FeatureCollection',
      features: PROJECTS.filter(p => p.geo).map(p => ({
        type: 'Feature',
        properties: {
          id: p.id,
          title: p.title,
          category: p.category,
          tech: p.tech.join(', ')
        },
        geometry: { type: 'Point', coordinates: [p.geo.lng, p.geo.lat] }
      }))
    };

    const projectLayer = window.L.geoJSON(geojson, {
      pointToLayer: (feature, latlng) => window.L.circleMarker(latlng, {
        radius: 8,
        weight: 2,
        opacity: 0.9,
        fillOpacity: 0.35
      }),
      onEachFeature: (feature, layer) => {
        const p = feature.properties || {};
        layer.bindPopup(`<strong>${p.title || 'Projet'}</strong><br/><span>${p.category || ''}</span><br/><small>${p.tech || ''}</small>`);
        layer.on('click', () => {
          const project = PROJECTS.find(x => x.id === p.id);
          if (project) openProjectModal(project);
        });
      }
    }).addTo(map);

    // Un point d'intérêt (exemple)
    const poi = window.L.layerGroup([
      window.L.marker([14.6036, -61.0740]).bindPopup('<strong>Point d’intérêt</strong><br/>Exemple de POI (à personnaliser)')
    ]).addTo(map);

    window.L.control.layers(
      { 'OpenStreetMap': map },
      { 'Projets': projectLayer, 'Points d’intérêt': poi },
      { collapsed: true }
    ).addTo(map);

    // Fit bounds if we have projects
    const bounds = projectLayer.getBounds();
    if (bounds.isValid()) map.fitBounds(bounds.pad(0.2));

    // enable wheel zoom on focus (UX)
    mapEl.addEventListener('mouseenter', () => map.scrollWheelZoom.enable());
    mapEl.addEventListener('mouseleave', () => map.scrollWheelZoom.disable());
  }

  // ---------- Navbar style on scroll ----------
  function initNavbarScroll() {
    const navbar = $('.navbar');
    if (!navbar) return;

    const update = () => {
      if (window.scrollY > 100) {
        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
        navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
      } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
        navbar.style.boxShadow = 'none';
      }

      // dark mode
      if (document.documentElement.getAttribute('data-theme') === 'dark') {
        navbar.style.background = window.scrollY > 100 ? 'rgba(7, 11, 20, 0.90)' : 'rgba(7, 11, 20, 0.78)';
        navbar.style.boxShadow = window.scrollY > 100 ? '0 2px 18px rgba(0, 0, 0, 0.35)' : 'none';
      }
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
  }

  // ---------- Hero parallax (light) ----------
  function initHeroParallax() {
    const hero = $('.hero');
    if (!hero) return;

    window.addEventListener('scroll', () => {
      if (prefersReducedMotion()) return;
      const scrolled = window.scrollY;
      if (scrolled < window.innerHeight) {
        hero.style.transform = `translateY(${scrolled * 0.18}px)`;
      }
    }, { passive: true });
  }
  // ---------- Preview Cards Navigation ----------
  function initPreviewCards() {
    const previewCards = $$('.preview-card');
    
    previewCards.forEach(card => {
      card.addEventListener('click', () => {
        const target = card.getAttribute('data-target');
        if (target) {
          scrollToSection(target.substring(1)); // Remove the # from target
        }
      });

      // Amélioration de l'accessibilité
      card.setAttribute('tabindex', '0');
      card.setAttribute('role', 'button');
      card.setAttribute('aria-label', `Naviguer vers la section ${card.querySelector('h3').textContent}`);
      
      // Support du clavier
      card.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          card.click();
        }
      });
    });
  }

  // Fonction globale pour le scroll vers les sections
  window.scrollToSection = function(sectionId) {
    const target = $(`#${sectionId}`);
    if (target) {
      const offsetTop = target.offsetTop - 80; // Compensation pour la navbar fixe
      
      window.scrollTo({
        top: offsetTop,
        behavior: 'smooth'
      });
      
      // Mise à jour de l'URL sans rechargement
      history.replaceState(null, null, `#${sectionId}`);
      
      // Toast de confirmation
      const sectionName = target.querySelector('h2')?.textContent || sectionId;
      toast(`Navigation vers : ${sectionName}`);
    }
  };
  // ---------- Boot ----------
  document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initMobileNav();
    initSmoothScroll();
    initNavbarScroll();
    initHeroParallax();

    initProjects();
    initCarousels();
    initScrollAnimations();
    initProgressNav();
    initBackToTop();
    initContactForm();
    initGIS();
    initPreviewCards();

    console.log('🚀 Portfolio enhanced initialisé !');
  });

})();
