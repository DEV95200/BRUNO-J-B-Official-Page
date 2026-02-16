// Slider d'arrière-plan pour la section Hero
document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('.background-slide');
  let currentSlide = 0;

  if (slides.length === 0) return;

  // Fonction pour changer de slide
  function changeSlide() {
    // Retirer la classe active de la slide actuelle
    slides[currentSlide].classList.remove('active');

    // Passer à la slide suivante
    currentSlide = (currentSlide + 1) % slides.length;

    // Ajouter la classe active à la nouvelle slide
    slides[currentSlide].classList.add('active');
  }

  // Changer de slide toutes les 5 secondes
  setInterval(changeSlide, 5000);

  // Initialiser la première slide
  slides[0].classList.add('active');
});
