// Menu burger
  document.getElementById('burger').addEventListener('click', () => {
    const menu = document.getElementById('menu-mobile');
    menu.classList.toggle('hidden');
  });

   // Menu burger dynamique
    const burger = document.getElementById('burger');
    const menuMobile = document.getElementById('menu-mobile');
    const closeBtn = document.getElementById('close-menu');
    function closeMenu() {
      menuMobile.classList.add('hidden');
    }
    burger.addEventListener('click', () => {
      menuMobile.classList.remove('hidden');
    });
    closeBtn.addEventListener('click', closeMenu);
    // Ferme le menu mobile au clic sur un lien
    menuMobile.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', closeMenu);
    });

    // Animation fade-in/slide-in
    document.querySelectorAll('.animate-fade-in').forEach(el => {
      el.classList.add('opacity-0');
      setTimeout(() => el.classList.remove('opacity-0'), 400);
    });
    document.querySelectorAll('.animate-fade-in-slow').forEach(el => {
      el.classList.add('opacity-0');
      setTimeout(() => el.classList.remove('opacity-0'), 900);
    });
    document.querySelectorAll('.animate-slide-in').forEach(el => {
      el.classList.add('translate-y-8', 'opacity-0');
      setTimeout(() => {
        el.classList.remove('translate-y-8', 'opacity-0');
      }, 600);
    });