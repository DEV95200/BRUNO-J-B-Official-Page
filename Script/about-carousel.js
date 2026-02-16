/**
 * CARROUSEL ABOUT RESPONSIVE
 * Gestion moderne et responsive du carrousel de la section À propos
 */

class AboutCarousel {
  constructor() {
    this.currentCard = 0;
    this.totalCards = 3;
    this.isAnimating = false;
    this.touchStartX = 0;
    this.touchEndX = 0;
    this.autoPlayInterval = null;
    this.autoPlayDelay = 8000; // 8 secondes
    
    this.init();
  }

  init() {
    this.bindElements();
    this.bindEvents();
    this.updateIndicators();
    this.startAutoPlay();
    this.handleResponsiveChanges();
  }

  bindElements() {
    this.carousel = document.querySelector('.about-carousel-container');
    this.track = document.querySelector('.about-carousel-track');
    this.cards = document.querySelectorAll('.carousel-card');
    this.prevBtn = document.querySelector('.carousel-prev');
    this.nextBtn = document.querySelector('.carousel-next');
    this.indicators = document.querySelectorAll('.indicator');
    this.carouselWrapper = document.querySelector('.about-carousel-wrapper');
  }

  bindEvents() {
    // Boutons de navigation
    if (this.prevBtn) {
      this.prevBtn.addEventListener('click', () => this.prevCard());
    }
    
    if (this.nextBtn) {
      this.nextBtn.addEventListener('click', () => this.nextCard());
    }

    // Indicateurs
    this.indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => this.goToCard(index));
    });

    // Gestion tactile (swipe)
    if (this.carouselWrapper) {
      this.carouselWrapper.addEventListener('touchstart', (e) => this.handleTouchStart(e), { passive: true });
      this.carouselWrapper.addEventListener('touchend', (e) => this.handleTouchEnd(e), { passive: true });
    }

    // Navigation clavier
    document.addEventListener('keydown', (e) => this.handleKeyNavigation(e));

    // Pause auto-play au survol
    if (this.carouselWrapper) {
      this.carouselWrapper.addEventListener('mouseenter', () => this.pauseAutoPlay());
      this.carouselWrapper.addEventListener('mouseleave', () => this.resumeAutoPlay());
    }

    // Gestion du redimensionnement
    window.addEventListener('resize', () => this.handleResize());

    // Intersection Observer pour l'auto-play
    this.setupIntersectionObserver();
  }

  nextCard() {
    if (this.isAnimating) return;
    this.currentCard = (this.currentCard + 1) % this.totalCards;
    this.updateCarousel();
  }

  prevCard() {
    if (this.isAnimating) return;
    this.currentCard = (this.currentCard - 1 + this.totalCards) % this.totalCards;
    this.updateCarousel();
  }

  goToCard(index) {
    if (this.isAnimating || index === this.currentCard) return;
    this.currentCard = index;
    this.updateCarousel();
  }

  updateCarousel() {
    if (!this.track) return;
    
    this.isAnimating = true;
    
    // Mise à jour de la position
    const translateX = -this.currentCard * (100 / this.totalCards);
    this.track.style.transform = `translateX(${translateX}%)`;
    
    // Mise à jour des classes actives
    this.cards.forEach((card, index) => {
      card.classList.toggle('active', index === this.currentCard);
    });
    
    // Mise à jour des indicateurs
    this.updateIndicators();
    
    // Réinitialiser l'animation après la transition
    setTimeout(() => {
      this.isAnimating = false;
    }, 500);

    // Redémarrer l'auto-play
    this.restartAutoPlay();
  }

  updateIndicators() {
    this.indicators.forEach((indicator, index) => {
      indicator.classList.toggle('active', index === this.currentCard);
    });
  }

  handleTouchStart(e) {
    this.touchStartX = e.touches[0].clientX;
  }

  handleTouchEnd(e) {
    this.touchEndX = e.changedTouches[0].clientX;
    this.handleSwipe();
  }

  handleSwipe() {
    const swipeThreshold = 50;
    const swipeDistance = this.touchStartX - this.touchEndX;
    
    if (Math.abs(swipeDistance) > swipeThreshold) {
      if (swipeDistance > 0) {
        this.nextCard();
      } else {
        this.prevCard();
      }
    }
  }

  handleKeyNavigation(e) {
    if (!this.carouselWrapper) return;
    
    switch(e.key) {
      case 'ArrowLeft':
        e.preventDefault();
        this.prevCard();
        break;
      case 'ArrowRight':
        e.preventDefault();
        this.nextCard();
        break;
      case ' ': // Espace pour pause/play
        e.preventDefault();
        this.toggleAutoPlay();
        break;
    }
  }

  startAutoPlay() {
    if (this.autoPlayInterval) return;
    
    this.autoPlayInterval = setInterval(() => {
      this.nextCard();
    }, this.autoPlayDelay);
  }

  pauseAutoPlay() {
    if (this.autoPlayInterval) {
      clearInterval(this.autoPlayInterval);
      this.autoPlayInterval = null;
    }
  }

  resumeAutoPlay() {
    if (!this.autoPlayInterval) {
      this.startAutoPlay();
    }
  }

  restartAutoPlay() {
    this.pauseAutoPlay();
    this.startAutoPlay();
  }

  toggleAutoPlay() {
    if (this.autoPlayInterval) {
      this.pauseAutoPlay();
    } else {
      this.startAutoPlay();
    }
  }

  handleResize() {
    // Ajuster la hauteur des cartes sur mobile
    if (window.innerWidth <= 768) {
      this.adjustMobileHeight();
    }
  }

  adjustMobileHeight() {
    const activeCard = document.querySelector('.carousel-card.active .about-main-card');
    if (activeCard) {
      const content = activeCard.querySelector('.profile-section, .description-section');
      if (content) {
        const contentHeight = content.scrollHeight;
        activeCard.style.minHeight = `${Math.max(320, contentHeight + 40)}px`;
      }
    }
  }

  setupIntersectionObserver() {
    const options = {
      root: null,
      rootMargin: '0px',
      threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.target === this.carouselWrapper) {
          if (entry.isIntersecting) {
            this.resumeAutoPlay();
          } else {
            this.pauseAutoPlay();
          }
        }
      });
    }, options);

    if (this.carouselWrapper) {
      observer.observe(this.carouselWrapper);
    }
  }

  handleResponsiveChanges() {
    // Gérer les changements de breakpoint
    const mediaQuery = window.matchMedia('(max-width: 768px)');
    
    const handleMediaQuery = (e) => {
      if (e.matches) {
        // Mode mobile
        this.autoPlayDelay = 10000; // Plus long sur mobile
        this.adjustMobileHeight();
      } else {
        // Mode desktop
        this.autoPlayDelay = 8000;
      }
      
      this.restartAutoPlay();
    };

    mediaQuery.addEventListener('change', handleMediaQuery);
    handleMediaQuery(mediaQuery); // Appel initial
  }

  // Méthodes publiques pour contrôle externe
  pause() {
    this.pauseAutoPlay();
  }

  play() {
    this.resumeAutoPlay();
  }

  getCurrentCard() {
    return this.currentCard;
  }

  getTotalCards() {
    return this.totalCards;
  }
}

// Initialisation du carrousel quand le DOM est prêt
document.addEventListener('DOMContentLoaded', () => {
  // Attendre que Lucide soit chargé
  const initCarousel = () => {
    if (typeof lucide !== 'undefined') {
      new AboutCarousel();
    } else {
      setTimeout(initCarousel, 100);
    }
  };
  
  initCarousel();
});

// Export pour utilisation externe si nécessaire
window.AboutCarousel = AboutCarousel;