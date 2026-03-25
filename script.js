/* ══════════════════════════════════════════════════
   RENOV DP - JavaScript Interactivity
   ══════════════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', () => {

  /* ─── NAV SCROLL EFFECT ─── */
  const nav = document.getElementById('main-nav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 50);
  });

  /* ─── SMOOTH SCROLL FOR ANCHORS ─── */
  document.querySelectorAll('[data-scroll-to]').forEach(el => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
      const target = document.getElementById(el.dataset.scrollTo);
      if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      // Close any open dropdown
      document.querySelectorAll('.nav-dropdown.open').forEach(d => d.classList.remove('open'));
    });
  });

  /* ─── NAV DROPDOWNS ─── */
  document.querySelectorAll('.nav-dropdown').forEach(dropdown => {
    const toggle = dropdown.querySelector('.nav-dropdown-toggle');

    dropdown.addEventListener('mouseenter', () => dropdown.classList.add('open'));
    dropdown.addEventListener('mouseleave', () => dropdown.classList.remove('open'));

    // Also handle click for mobile
    toggle.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdown.classList.toggle('open');
    });
  });

  // Close dropdowns on outside click
  document.addEventListener('click', () => {
    document.querySelectorAll('.nav-dropdown.open').forEach(d => d.classList.remove('open'));
  });

  /* ─── SCROLL REVEAL ─── */
  const reveals = document.querySelectorAll('.reveal');
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.08 });
  reveals.forEach(el => revealObserver.observe(el));

  /* ─── INTERACTIVE PANELS (Diferenciais & Soluções) ─── */
  function initPanel(panelId) {
    const panel = document.getElementById(panelId);
    if (!panel) return;

    const menuItems = panel.querySelectorAll('.panel-menu-item');
    const contentPanes = panel.querySelectorAll('.panel-pane');

    menuItems.forEach((item, index) => {
      item.addEventListener('click', () => {
        // Remove active from all
        menuItems.forEach(mi => mi.classList.remove('active'));
        contentPanes.forEach(cp => {
          cp.style.display = 'none';
          cp.classList.remove('content-animate');
        });

        // Activate clicked
        item.classList.add('active');
        const pane = contentPanes[index];
        if (pane) {
          pane.style.display = 'flex';
          // Force reflow for animation
          void pane.offsetWidth;
          pane.classList.add('content-animate');
        }

        // Update counter badge
        const badge = panel.querySelector('.panel-counter');
        if (badge) {
          const total = menuItems.length;
          const label = panel.dataset.panelLabel || 'ITENS';
          badge.textContent = `${String(index + 1).padStart(2, '0')} / ${total} ${label}`;
        }
      });
    });
  }

  initPanel('diferenciais-panel');
  initPanel('solucoes-panel');

  /* ─── CONTACT FORM SUBMISSION ─── */
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Clear previous errors
      contactForm.querySelectorAll('.form-error').forEach(err => err.style.display = 'none');

      // Basic validation
      const fields = {
        email: { el: contactForm.querySelector('[name="email"]'), msg: 'Informe seu email corporativo' },
        nome: { el: contactForm.querySelector('[name="nome"]'), msg: 'Informe seu nome' },
        celular: { el: contactForm.querySelector('[name="celular"]'), msg: 'Informe seu celular' },
        empresa: { el: contactForm.querySelector('[name="empresa"]'), msg: 'Informe sua empresa' },
      };

      let hasError = false;
      for (const [key, field] of Object.entries(fields)) {
        if (!field.el.value.trim()) {
          const errorEl = field.el.parentElement.querySelector('.form-error') || field.el.nextElementSibling;
          if (errorEl && errorEl.classList.contains('form-error')) {
            errorEl.textContent = field.msg;
            errorEl.style.display = 'block';
          }
          field.el.style.borderColor = '#ff6b6b';
          field.el.dataset.hasError = 'true';
          hasError = true;
        }
      }

      // Email validation
      const emailEl = fields.email.el;
      if (emailEl.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailEl.value)) {
        const errorEl = emailEl.parentElement.querySelector('.form-error');
        if (errorEl) {
          errorEl.textContent = 'Email inválido';
          errorEl.style.display = 'block';
        }
        emailEl.style.borderColor = '#ff6b6b';
        emailEl.dataset.hasError = 'true';
        hasError = true;
      }

      if (hasError) return;

      // Collect form data
      const formData = new FormData(contactForm);
      const submitBtn = contactForm.querySelector('.contact-submit');
      const originalText = submitBtn.textContent;

      // Convert FormData to JSON for n8n webhook
      const jsonData = {};
      formData.forEach((value, key) => { jsonData[key] = value; });
      jsonData.agendar = formData.has('agendar') ? 'Sim' : 'Não';
      jsonData.data_envio = new Date().toLocaleString('pt-BR');

      try {
        submitBtn.textContent = 'Enviando...';
        submitBtn.disabled = true;

        // PHP recebe o lead e encaminha para n8n via cURL (sem CORS)
        const phpResponse = await fetch('api/contato.php', {
          method: 'POST',
          body: formData
        });
        const result = await phpResponse.json();

        if (result.success) {
          contactForm.style.display = 'none';
          document.getElementById('form-success').classList.add('show');
        } else {
          alert(result.message || 'Erro ao enviar. Tente novamente ou entre em contato pelo WhatsApp.');
          submitBtn.textContent = originalText;
          submitBtn.disabled = false;
        }
      } catch (error) {
        alert('Erro ao enviar. Tente novamente.');
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
      }
    });

    // Reset border on focus
    contactForm.querySelectorAll('.contact-input, .contact-select, .contact-textarea').forEach(input => {
      input.addEventListener('focus', () => {
        input.style.borderColor = 'rgba(0,229,200,.4)';
        input.dataset.hasError = '';
        const errorEl = input.parentElement.querySelector('.form-error');
        if (errorEl) errorEl.style.display = 'none';
      });
      input.addEventListener('blur', () => {
        if (!input.dataset.hasError) {
          input.style.borderColor = 'rgba(255,255,255,.1)';
        }
      });
    });
  }

  /* ─── WHATSAPP BUTTON ─── */
  const whatsappBtn = document.getElementById('whatsapp-float');
  if (whatsappBtn) {
    whatsappBtn.addEventListener('click', () => {
      window.open('https://wa.me/5562999999999?text=Olá! Gostaria de saber mais sobre os serviços da Renov.', '_blank');
    });
  }

  /* ─── LOGO CLICK (scroll to top) ─── */
  const logo = document.querySelector('.nav-logo');
  if (logo) {
    logo.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

});
