
  function onScrollFadeIn() {
    const elements = document.querySelectorAll('.fade-in');
    const windowBottom = window.innerHeight + window.scrollY;

    elements.forEach(el => {
      const elementTop = el.getBoundingClientRect().top + window.scrollY;
      if (windowBottom > elementTop + 100) { // 100px antes de aparecer totalmente
        el.classList.add('visible');
      }
    });
  }

  window.addEventListener('scroll', onScrollFadeIn);
  window.addEventListener('DOMContentLoaded', onScrollFadeIn);
//-----------------------------------------------------------------------------------
    window.addEventListener('DOMContentLoaded', function() {
      document.body.classList.add('loaded');
    });
