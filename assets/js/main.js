(function () {
  'use strict';

  // Site's own reCAPTCHA widget key (used to gate the form before submit).
  const RECAPTCHA_SITE_KEY = '6LcB03ktAAAAAJyuFlYhHR1WezhheGXV-OdELW_u';
  // Zoho's own reCAPTCHA site key, registered against this domain in the
  // original Zoho Web-to-Lead embed. Zoho's server validates the
  // g-recaptcha-response against THIS key — using our own site key's
  // token gets silently rejected by Zoho, which is why leads were not
  // arriving in the CRM even though the form "submitted" successfully.
  const ZOHO_RECAPTCHA_SITE_KEY = '6Ld26IstAAAAAB_MWG8S53k54sR3JiHEwIs-EVdm';
  let recaptchaScriptPromise = null;

  // ---------------------------------------------------------------------
  // Zoho CRM "Web to Lead" submission helper.
  // Builds the exact hidden form Zoho generated and posts it silently
  // (via a hidden iframe target) so the visitor never leaves the page.
  const ZOHO_LEAD_URL = 'https://crm.zoho.in/crm/WebToLeadForm';
  const ZOHO_HIDDEN_FIELDS = {
    xnQsjsdp: '543a7abd5ed73e021bc6e70e041233941129fe83e561668e7eb1e563257b308f',
    zc_gad: '',
    xmIwtLD: '333902b3df37919bd08a2f85233937797abc41c9858a85d34533b8c1c62f3e5280f903564d23d5ce66f39ca83d952784',
    actionType: 'TGVhZHM=',
    returnURL: 'https://hanioo.cz/thank-you',
    aG9uZXlwb3Q: ''
  };

  function submitToZohoLead(fields) {
    const form = document.createElement('form');
    form.action = ZOHO_LEAD_URL;
    form.method = 'POST';
    form.target = 'zoho-lead-target';
    form.style.display = 'none';

    const addField = (name, value) => {
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = name;
      input.value = value == null ? '' : value;
      form.appendChild(input);
    };

    Object.keys(ZOHO_HIDDEN_FIELDS).forEach((key) => addField(key, ZOHO_HIDDEN_FIELDS[key]));
    addField('Lead Source', 'Website');
    Object.keys(fields).forEach((key) => addField(key, fields[key]));

    document.body.appendChild(form);
    form.submit();
    setTimeout(() => form.remove(), 1000);
  }

  function loadRecaptchaScript() {
    if (window.grecaptcha && window.grecaptcha.render) return Promise.resolve();
    if (recaptchaScriptPromise) return recaptchaScriptPromise;
    recaptchaScriptPromise = new Promise((resolve) => {
      if (!document.querySelector('script[src*="www.google.com/recaptcha/api.js"]')) {
        const s = document.createElement('script');
        s.src = 'https://www.google.com/recaptcha/api.js?render=explicit';
        s.async = true;
        s.defer = true;
        document.body.appendChild(s);
      }
      (function check() {
        if (window.grecaptcha && window.grecaptcha.render) resolve();
        else setTimeout(check, 200);
      })();
    });
    return recaptchaScriptPromise;
  }

  document.addEventListener('DOMContentLoaded', () => {
    initHeaderScroll();
    initMobileMenu();
    initLangDropdown();
    initPopupForm();
    initContactForm();
    initQuoteForm();
    initFaqAccordion();
    initSimpleFaq();
    initCountUp();
    initCarousels();
    initLanguagesFilter();
    initBackToTop();
    initSmoothAnchors();
  });

  // ---------------------------------------------------------------------
  function initHeaderScroll() {
    const header = document.getElementById('site-header');
    const backBar = document.getElementById('back-home-bar');
    if (!header) return;
    const onScroll = () => {
      const isScrolled = window.scrollY > 12;
      header.classList.toggle('scrolled', isScrolled);
      if (backBar) backBar.classList.toggle('scrolled', isScrolled);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  function initMobileMenu() {
    const toggle = document.getElementById('menu-toggle');
    const nav = document.getElementById('main-nav');
    if (!toggle || !nav) return;
    toggle.addEventListener('click', () => {
      nav.classList.toggle('open');
      document.body.classList.toggle('menu-open', nav.classList.contains('open'));
    });
    nav.querySelectorAll('a, button').forEach((el) => {
      el.addEventListener('click', () => {
        nav.classList.remove('open');
        document.body.classList.remove('menu-open');
      });
    });
  }

  function initLangDropdown() {
    const wrap = document.getElementById('lang-switch');
    const btn = document.getElementById('lang-btn');
    const dropdown = document.getElementById('lang-dropdown');
    if (!wrap || !btn || !dropdown) return;
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = !dropdown.hasAttribute('hidden');
      if (isOpen) {
        dropdown.setAttribute('hidden', '');
        btn.setAttribute('aria-expanded', 'false');
      } else {
        dropdown.removeAttribute('hidden');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
    document.addEventListener('click', (e) => {
      if (!wrap.contains(e.target)) {
        dropdown.setAttribute('hidden', '');
        btn.setAttribute('aria-expanded', 'false');
      }
    });
  }

  function initSmoothAnchors() {
    // Header nav "home" button scrolls on the homepage, or navigates to
    // index.php on other pages (mirrors react-scroll <Element>/<Link>).
    const siteBase = window.SITE_BASE || '';
    const isHome = location.pathname === siteBase + '/' || location.pathname === siteBase + '/index.php';
    document.querySelectorAll('[data-home-link]').forEach((el) => {
      el.addEventListener('click', (e) => {
        if (isHome) {
          e.preventDefault();
          window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
          window.location.href = siteBase + '/';
        }
      });
    });
    if (isHome && location.hash) {
      const target = document.getElementById(location.hash.slice(1));
      if (target) setTimeout(() => target.scrollIntoView({ behavior: 'smooth' }), 150);
    }
  }

  // ---------------------------------------------------------------------
  function initPopupForm() {
    const backdrop = document.getElementById('popup-backdrop');
    const closeBtn = document.getElementById('popup-close-btn');
    const overlay = document.getElementById('popup-overlay');
    const form = document.getElementById('popup-form');
    const successMsg = document.getElementById('popup-success-message');
    const errorBox = document.getElementById('popup-error');
    const submitBtn = document.getElementById('popup-submit-btn');
    if (!backdrop || !form) return;

    let widgetId = null;

    function openPopup() {
      backdrop.removeAttribute('hidden');
      document.body.classList.add('popup-open');
      loadRecaptchaScript().then(() => {
        const container = document.getElementById('popup-recaptcha-container');
        if (container && widgetId === null) {
          widgetId = window.grecaptcha.render(container, { sitekey: ZOHO_RECAPTCHA_SITE_KEY, theme: 'light' });
        }
      });
    }

    function closePopup() {
      backdrop.setAttribute('hidden', '');
      document.body.classList.remove('popup-open');
    }

    setTimeout(openPopup, 800);

    closeBtn?.addEventListener('click', closePopup);
    overlay?.addEventListener('click', closePopup);

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      errorBox.setAttribute('hidden', '');

      const fullName = document.getElementById('popup-fullName').value.trim();
      const phone = document.getElementById('popup-phone').value.trim();
      const email = document.getElementById('popup-email').value.trim();
      const city = document.getElementById('popup-city').value.trim();
      const message = document.getElementById('popup-message').value.trim();

      if (!fullName || !phone || !city) {
        errorBox.textContent = 'Please fill in all required fields.';
        errorBox.removeAttribute('hidden');
        return;
      }
      if (email && !/^\S+@\S+\.\S+$/.test(email)) {
        errorBox.textContent = 'Please enter a valid email address.';
        errorBox.removeAttribute('hidden');
        return;
      }
      const token = window.grecaptcha && widgetId !== null ? window.grecaptcha.getResponse(widgetId) : '';
      if (!token) {
        errorBox.textContent = 'Please complete the reCAPTCHA verification.';
        errorBox.removeAttribute('hidden');
        return;
      }

      submitToZohoLead({
        'Last Name': fullName,
        'Mobile': phone,
        'City': city,
        'Email': email,
        'Description': message,
        'g-recaptcha-response': token
      });
      form.setAttribute('hidden', '');
      successMsg.removeAttribute('hidden');
      if (window.grecaptcha && widgetId !== null) {
        try { window.grecaptcha.reset(widgetId); } catch (e) {}
      }
      setTimeout(closePopup, 3500);
    });
  }

  // ---------------------------------------------------------------------
  function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    let widgetId = null;
    loadRecaptchaScript().then(() => {
      const container = document.getElementById('contact-recaptcha-container');
      if (container && widgetId === null) {
        widgetId = window.grecaptcha.render(container, { sitekey: ZOHO_RECAPTCHA_SITE_KEY, theme: 'light' });
      }
    });

    const successBackdrop = document.getElementById('contact-success-backdrop');
    const successClose = document.getElementById('contact-success-close');
    successClose?.addEventListener('click', () => successBackdrop.setAttribute('hidden', ''));
    document.getElementById('contact-success-overlay')?.addEventListener('click', () => successBackdrop.setAttribute('hidden', ''));

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      form.querySelectorAll('.field-error').forEach((el) => el.setAttribute('hidden', ''));

      const fields = ['fullName', 'email', 'phone', 'country', 'message'];
      let valid = true;
      const values = {};
      fields.forEach((name) => {
        const el = form.querySelector(`[name="${name}"]`);
        values[name] = el ? el.value.trim() : '';
        if (!values[name]) {
          valid = false;
          form.querySelector(`[data-error-for="${name}"]`)?.removeAttribute('hidden');
        }
      });
      if (values.email && !/^\S+@\S+\.\S+$/.test(values.email)) {
        valid = false;
        form.querySelector('[data-error-for="email"]').textContent = form.querySelector('[data-error-for="email"]').textContent;
        form.querySelector('[data-error-for="email"]')?.removeAttribute('hidden');
      }

      const token = window.grecaptcha && widgetId !== null ? window.grecaptcha.getResponse(widgetId) : '';
      if (!token) {
        valid = false;
        form.querySelector('[data-error-for="captcha"]')?.removeAttribute('hidden');
      }
      if (!valid) return;

      submitToZohoLead({
        'Last Name': values.fullName,
        'Mobile': values.phone,
        'City': values.country,
        'Email': values.email,
        'Description': values.message,
        'g-recaptcha-response': token
      });
      form.reset();
      if (window.grecaptcha && widgetId !== null) {
        try { window.grecaptcha.reset(widgetId); } catch (err) {}
      }
      successBackdrop?.removeAttribute('hidden');
    });
  }

  // ---------------------------------------------------------------------
  function initQuoteForm() {
    const form = document.getElementById('quote-request-form');
    if (!form) return;

    let widgetId = null;
    loadRecaptchaScript().then(() => {
      const container = document.getElementById('quote-recaptcha-container');
      if (container && widgetId === null) {
        widgetId = window.grecaptcha.render(container, { sitekey: ZOHO_RECAPTCHA_SITE_KEY, theme: 'light' });
      }
    });

    let errorBox = form.querySelector('.field-error[data-error-for="submit"]');
    if (!errorBox) {
      errorBox = document.createElement('span');
      errorBox.className = 'field-error';
      errorBox.setAttribute('data-error-for', 'submit');
      errorBox.style.display = 'none';
      errorBox.style.marginTop = '8px';
      form.querySelector('.recaptcha-real-wrapper')?.insertAdjacentElement('afterend', errorBox);
    }

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      errorBox.style.display = 'none';

      const fullName = form.querySelector('[name="fullName"]')?.value.trim() || '';
      const mobile = form.querySelector('[name="mobile"]')?.value.trim() || '';
      const city = form.querySelector('[name="city"]')?.value.trim() || '';
      const email = form.querySelector('[name="email"]')?.value.trim() || '';
      const description = form.querySelector('[name="description"]')?.value.trim() || '';

      if (!fullName || !mobile || !city) {
        errorBox.textContent = 'Please fill in all required fields.';
        errorBox.style.display = 'block';
        return;
      }
      if (email && !/^\S+@\S+\.\S+$/.test(email)) {
        errorBox.textContent = 'Please enter a valid email address.';
        errorBox.style.display = 'block';
        return;
      }
      const token = window.grecaptcha && widgetId !== null ? window.grecaptcha.getResponse(widgetId) : '';
      if (!token) {
        errorBox.textContent = 'Please complete the reCAPTCHA verification.';
        errorBox.style.display = 'block';
        return;
      }

      submitToZohoLead({
        'Last Name': fullName,
        'Mobile': mobile,
        'City': city,
        'Email': email,
        'Description': description,
        'g-recaptcha-response': token
      });

      form.reset();
      if (window.grecaptcha && widgetId !== null) {
        try { window.grecaptcha.reset(widgetId); } catch (err) {}
      }
      errorBox.style.color = 'green';
      errorBox.textContent = 'Thank you! Your request has been submitted.';
      errorBox.style.display = 'block';
    });
  }

  // ---------------------------------------------------------------------
  function initFaqAccordion() {
    document.querySelectorAll('[data-faq-block]').forEach((block) => {
      const items = block.querySelectorAll('[data-faq-item]');
      items.forEach((item) => {
        const toggle = item.querySelector('[data-faq-toggle]');
        toggle?.addEventListener('click', () => {
          const isOpen = item.classList.contains('open');
          items.forEach((i) => i.classList.remove('open'));
          if (!isOpen) item.classList.add('open');
        });
      });

      const searchInput = block.querySelector('[data-faq-search]');
      const categoryBtns = block.querySelectorAll('[data-faq-category]');

      function applyFilters() {
        const query = (searchInput?.value || '').toLowerCase().trim();
        const activeCat = block.querySelector('[data-faq-category].active')?.dataset.faqCategory || 'all';
        items.forEach((item) => {
          const matchesQuery = !query || item.dataset.question.includes(query) || item.dataset.answer.includes(query);
          const matchesCategory = activeCat === 'all' || item.dataset.category === activeCat;
          item.style.display = matchesQuery && matchesCategory ? '' : 'none';
        });
      }

      searchInput?.addEventListener('input', applyFilters);
      categoryBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
          categoryBtns.forEach((b) => b.classList.remove('active'));
          btn.classList.add('active');
          applyFilters();
        });
      });
    });
  }

  function initSimpleFaq() {
    // Service-detail page FAQ (plain open/close, no search)
    document.querySelectorAll('[data-simple-faq-item]').forEach((item) => {
      const answer = item.querySelector('p');
      item.addEventListener('click', () => {
        const isOpen = answer.style.display === 'block';
        answer.style.display = isOpen ? 'none' : 'block';
        const chevron = item.querySelector('.simple-faq-chevron');
        if (chevron) chevron.style.transform = isOpen ? '' : 'rotate(180deg)';
      });
    });
  }

  // ---------------------------------------------------------------------
  function initCountUp() {
    const els = document.querySelectorAll('.js-countup');
    if (!els.length) return;
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        observer.unobserve(el);
        const end = parseInt(el.dataset.end, 10) || 0;
        const suffix = el.dataset.suffix || '';
        const duration = 1400;
        const start = performance.now();
        function tick(now) {
          const progress = Math.min((now - start) / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          el.textContent = Math.round(end * eased).toLocaleString() + suffix;
          if (progress < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
      });
    }, { threshold: 0.4 });
    els.forEach((el) => observer.observe(el));
  }

  // ---------------------------------------------------------------------
  function initCarousels() {
    document.querySelectorAll('.site-carousel').forEach((carousel) => {
      const track = carousel.querySelector('.site-carousel-track');
      const slides = Array.from(track.children);
      const pagination = carousel.querySelector('.site-carousel-pagination');
      let index = 0;
      let perView = getPerView();

      function getPerView() {
        return window.innerWidth < 768 ? 1 : window.innerWidth < 1080 ? 2 : 3;
      }

      function buildDots() {
        pagination.innerHTML = '';
        const pages = Math.max(1, slides.length - perView + 1);
        for (let i = 0; i < pages; i++) {
          const dot = document.createElement('button');
          dot.type = 'button';
          dot.className = 'swiper-pagination-bullet';
          dot.addEventListener('click', () => goTo(i));
          pagination.appendChild(dot);
        }
        updateDots();
      }

      function updateDots() {
        Array.from(pagination.children).forEach((dot, i) => dot.classList.toggle('swiper-pagination-bullet-active', i === index));
      }

      function goTo(i) {
        const maxIndex = Math.max(0, slides.length - perView);
        index = Math.max(0, Math.min(i, maxIndex));
        const slideWidth = slides[0].getBoundingClientRect().width + 20;
        track.style.transform = `translateX(-${index * slideWidth}px)`;
        updateDots();
      }

      buildDots();

      window.addEventListener('resize', () => {
        const newPerView = getPerView();
        if (newPerView !== perView) {
          perView = newPerView;
          buildDots();
          goTo(0);
        }
      });

      const autoplayMs = parseInt(carousel.dataset.autoplay, 10);
      if (autoplayMs) {
        setInterval(() => {
          const maxIndex = Math.max(0, slides.length - perView);
          goTo(index >= maxIndex ? 0 : index + 1);
        }, autoplayMs);
      }
    });
  }

  // ---------------------------------------------------------------------
  function initLanguagesFilter() {
    const searchInput = document.getElementById('lang-search-input');
    const alphabetFilter = document.getElementById('lang-alphabet-filter');
    const allGrid = document.getElementById('lang-all-grid');
    const popularBlock = document.getElementById('lang-popular-block');
    const emptyMsg = document.getElementById('lang-empty-msg');
    if (!searchInput || !allGrid) return;

    const cards = Array.from(allGrid.children);
    let activeLetter = '';

    function apply() {
      const query = searchInput.value.toLowerCase().trim();
      let visibleCount = 0;
      cards.forEach((card) => {
        const name = card.dataset.langName || '';
        const matchesQuery = !query || name.includes(query);
        const matchesLetter = !activeLetter || name.toUpperCase().startsWith(activeLetter);
        const show = matchesQuery && matchesLetter;
        card.style.display = show ? '' : 'none';
        if (show) visibleCount++;
      });
      popularBlock.style.display = (!query && !activeLetter) ? '' : 'none';
      emptyMsg.hidden = visibleCount !== 0;
    }

    searchInput.addEventListener('input', () => { activeLetter = ''; apply(); });
    alphabetFilter.addEventListener('click', (e) => {
      const btn = e.target.closest('button[data-letter]');
      if (!btn) return;
      alphabetFilter.querySelectorAll('button').forEach((b) => b.classList.remove('active'));
      btn.classList.add('active');
      activeLetter = btn.dataset.letter;
      searchInput.value = '';
      apply();
    });
  }

  // ---------------------------------------------------------------------
  function initBackToTop() {
    const btn = document.getElementById('back-to-top-btn');
    if (!btn) return;
    window.addEventListener('scroll', () => {
      btn.hidden = window.scrollY < 400;
    }, { passive: true });
    btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }

  // ---------------------------------------------------------------------
  // Site-wide scroll-reveal animation (Czechia theme refresh)
  function initScrollReveal() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    var selectors = [
      '.section-header', '.card', '.service-card', '.glass-card',
      '[class*="-card"]', '.stat', '[class*="-stat"]', '.hero-content',
      '.faq-item', '.testimonial', '[class*="testimonial"]'
    ];
    var els = document.querySelectorAll(selectors.join(','));
    if (!els.length) return;

    var observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry, i) {
        if (entry.isIntersecting) {
          var el = entry.target;
          window.setTimeout(function() {
            el.classList.add('is-visible');
          }, (i % 6) * 80);
          observer.unobserve(el);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    els.forEach(function(el) {
      el.classList.add('reveal-up');
      observer.observe(el);
    });
  }
  initScrollReveal();
})();