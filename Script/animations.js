// ==========
// ANIMATIONS PORTFOLIO
// ==========

document.addEventListener('DOMContentLoaded', function() {
    
    // Animation de typing pour le texte
    function typeWriter(element, text, speed = 50) {
        let i = 0;
        element.textContent = '';
        
        function type() {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }

    // Animation des chevrons avec pulsation
    function animateChevrons() {
        const chevrons = document.querySelectorAll('.chevron-open, .chevron-close');
        
        chevrons.forEach((chevron, index) => {
            chevron.style.animationDelay = `${index * 0.5}s`;
        });
    }

    // Animation des lignes de code séquentielles
    function animateCodeLines() {
        const codeLines = document.querySelectorAll('.code-line');
        
        codeLines.forEach((line, index) => {
            line.style.opacity = '0';
            line.style.transform = 'translateX(-20px)';
            
            setTimeout(() => {
                line.style.transition = 'all 0.6s ease-out';
                line.style.opacity = '1';
                line.style.transform = 'translateX(0)';
                
                // Animer le texte de cette ligne
                const typedText = line.querySelector('.typed-text');
                if (typedText) {
                    const originalText = typedText.getAttribute('data-text') || typedText.textContent;
                    setTimeout(() => {
                        typeWriter(typedText, originalText, 30);
                    }, 300);
                }
            }, index * 800);
        });
    }

    // Animation des éléments tech stack
    function animateTechStack() {
        const techItems = document.querySelectorAll('.tech-item');
        
        techItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                item.style.transition = 'all 0.5s ease-out';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, 2000 + (index * 200));
        });
    }

    // Animation de pulsation pour le profil
    function animateProfile() {
        const profileImage = document.querySelector('.profile-image .avatar-placeholder');
        if (profileImage) {
            profileImage.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1) rotate(5deg)';
            });
            
            profileImage.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotate(0deg)';
            });
        }
    }

    // Animation de particules flottantes (optionnel)
    function createFloatingParticles() {
        const hero = document.querySelector('.hero');
        if (!hero) return;

        for (let i = 0; i < 6; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.cssText = `
                position: absolute;
                width: ${Math.random() * 6 + 2}px;
                height: ${Math.random() * 6 + 2}px;
                background: rgba(56, 189, 248, 0.6);
                border-radius: 50%;
                animation: float ${Math.random() * 3 + 4}s ease-in-out infinite;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
                z-index: -1;
            `;
            hero.appendChild(particle);
        }

        // Ajouter l'animation float si elle n'existe pas déjà
        if (!document.querySelector('#floatAnimation')) {
            const style = document.createElement('style');
            style.id = 'floatAnimation';
            style.textContent = `
                @keyframes float {
                    0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
                    50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
                }
            `;
            document.head.appendChild(style);
        }
    }

    // Animation de scroll smooth pour les liens
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Animation de curseur clignotant modifiable
    function customCursor() {
        const typedTexts = document.querySelectorAll('.typed-text');
        
        typedTexts.forEach(text => {
            text.addEventListener('mouseenter', function() {
                this.style.setProperty('--cursor-color', '#22c55e');
            });
            
            text.addEventListener('mouseleave', function() {
                this.style.setProperty('--cursor-color', '#38bdf8');
            });
        });
    }

    // Fonction pour redémarrer les animations
    function restartAnimations() {
        // Réinitialiser et redémarrer toutes les animations
        animateChevrons();
        setTimeout(() => {
            animateCodeLines();
        }, 500);
        setTimeout(() => {
            animateTechStack();
        }, 1000);
    }

    // Intersection Observer pour déclencher les animations au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, { threshold: 0.3 });

    // Observer la section hero
    const heroSection = document.querySelector('.hero');
    if (heroSection) {
        observer.observe(heroSection);
    }

    // Initialisation des animations
    setTimeout(() => {
        animateChevrons();
        animateCodeLines();
        animateTechStack();
        animateProfile();
        createFloatingParticles();
        initSmoothScroll();
        customCursor();
    }, 500);

    // Fonction globale pour permettre la modification du texte
    window.updateTypedText = function(selector, newText, speed = 30) {
        const element = document.querySelector(selector);
        if (element) {
            element.setAttribute('data-text', newText);
            typeWriter(element, newText, speed);
        }
    };

    // Fonction pour changer les couleurs des chevrons
    window.setChevronColor = function(color) {
        const chevrons = document.querySelectorAll('.chevron-open, .chevron-close');
        chevrons.forEach(chevron => {
            chevron.style.color = color;
        });
    };

    // Console log pour debug
    console.log('🚀 Animations portfolio initialisées !');
    console.log('💡 Utilisez updateTypedText(".typed-text", "Nouveau texte") pour modifier le texte');
    console.log('🎨 Utilisez setChevronColor("#couleur") pour changer la couleur des chevrons');
});