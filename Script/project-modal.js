// Gestion de la modal de détails de projet
document.addEventListener('DOMContentLoaded', () => {
  // Données des projets
  const projectsData = {
    'cinemap': {
      title: 'SAÉ 105 - Site Web BUT MMI',
      subtitle: 'Projet de production d\'un site web institutionnel pour CY Cergy Paris Université',
      status: 'Terminé',
      category: 'Full-Stack',
      description: 'La SAÉ 105 consiste en la réalisation d\'un site web dédié au BUT Métiers du Multimédia et de l\'Internet (MMI) pour CY Cergy Paris Université. L\'objectif était de présenter de façon détaillée les aspects de la formation aux lycéens potentiellement intéressés par le parcours BUT MMI, tout en permettant le contact avec l\'administration via un formulaire.',
      features: [
        'Site web institutionnel multi-pages (6 pages minimum)',
        'Intégration fidèle d\'une maquette Adobe XD fournie',
        'Formulaire de contact fonctionnel avec traitement PHP',
        'Intégration de vidéos YouTube embarquées',
        'Structure responsive et accessible',
        'Travail collaboratif en équipe de 3-5 étudiants',
        'Hébergement sur serveur avec nom de domaine',
        'Respect des normes d\'accessibilité web'
      ],
      technologies: [
        { name: 'HTML5/CSS3', icon: 'layout' },
        { name: 'PHP', icon: 'code' },
        { name: 'JavaScript', icon: 'zap' },
        { name: 'Adobe XD', icon: 'figma' },
        { name: 'Flexbox', icon: 'grid-3x3' }
      ],
      images: [
        'images/projects/SAE 105/image-1771281656710.png',
        'images/projects/SAE 105/image-1771281674652.png',
        'images/projects/SAE 105/image-1771281710803.png',
        'images/projects/SAE 105/image-1771281725041.png',
        'images/projects/SAE 105/image-1771281775586.png',
        'images/projects/SAE 105/image-1771281859732.png',
        'images/projects/SAE 105/image-1771281871951.png'
      ],
      github: 'https://github.com/votre-username/sae-105',
      demo: '#',
      stats: {
        duration: '8 semaines',
        team: '4 personnes',
        lines: '3000+'
      },
      competencies: [
        {
          code: 'AC14.01',
          title: 'Exploiter de manière autonome un environnement de développement efficace et productif',
          description: 'Maîtrise de VS Code, outils de développement web, Git'
        },
        {
          code: 'AC14.02', 
          title: 'Produire des pages Web statiques et fluides utilisant un balisage sémantique efficace',
          description: 'Intégration HTML/CSS responsive, accessibilité, sémantique'
        },
        {
          code: 'AC14.03',
          title: 'Générer des pages Web ou vues à partir de données structurées',
          description: 'Développement PHP, traitement de formulaires, gestion des données'
        },
        {
          code: 'AC14.04',
          title: 'Mettre en ligne une application Web en utilisant une solution d\'hébergement standard',
          description: 'Déploiement, configuration serveur, nom de domaine'
        }
      ],
      learningOutcomes: [
        'Intégration web fidèle à une maquette professionnelle',
        'Développement back-end avec PHP pour traitement de formulaires',
        'Travail collaboratif et gestion de projet en équipe',
        'Respect des standards d\'accessibilité et de sémantique web',
        'Déploiement et mise en production d\'un site web',
        'Communication et présentation d\'un projet technique'
      ]
    },
    'cinemap-idf': {
      title: 'SAÉ 303 - CINÉMAP IDF',
      subtitle: 'Application interactive de visualisation de données sur les cinémas d\'Ile-de-France',
      status: 'Terminé',
      category: 'Data Visualization',
      description: 'La SAÉ 303 "Concevoir des visualisations de données pour le web" a donné naissance à CINÉMAP IDF, une application web interactive permettant d\'explorer les cinémas d\'Ile-de-France. Ce projet combine visualisation de données, cartographie interactive et design d\'interface pour offrir une expérience utilisateur engageante autour de la culture cinématographique francilienne.',
      features: [
        'Carte interactive avec Leaflet.js et OpenStreetMap',
        'Chargement dynamique des données cinémas via API Fetch',
        'Visualisation géographique des cinémas par département',
        'Interface responsive adaptée mobile et desktop',
        'Système de filtres par type de cinéma et localisation',
        'Pop-ups informatifs avec détails des établissements',
        'Design d\'interface moderne avec TailwindCSS',
        'Respect des normes d\'accessibilité web (contrastes, navigation clavier)',
        'Utilisation de Git pour le versioning du projet',
        'Intégration d\'iconographie libre de droits',
        'Animation et transitions CSS pour l\'engagement utilisateur',
        'Optimisation des performances de rendu cartographique'
      ],
      technologies: [
        { name: 'JavaScript ES6+', icon: 'zap' },
        { name: 'Leaflet.js', icon: 'map' },
        { name: 'OpenStreetMap', icon: 'globe' },
        { name: 'TailwindCSS', icon: 'wind' },
        { name: 'Fetch API', icon: 'download' },
        { name: 'GeoJSON', icon: 'map-pin' },
        { name: 'Git', icon: 'git-branch' }
      ],
      images: [
        'images/projects/SAE 303/image-1771280262641.png',
        'images/projects/SAE 303/image-1771280325318.png',
        'images/projects/SAE 303/image-1771280376366.png',
        'images/projects/SAE 303/image-1771280414037.png'
      ],
      github: 'https://github.com/votre-username/cinemap-idf',
      demo: '#',
      stats: {
        duration: '8 semaines',
        team: '3-4 personnes',
        lines: '2500+'
      },
      competencies: [
        {
          code: 'AC21.03',
          title: 'Traiter des données avec des outils statistiques pour faciliter leur analyse et leur exploitation',
          description: 'Analyse et traitement des données géographiques des cinémas, structuration des datasets GeoJSON'
        },
        {
          code: 'AC23.02',
          title: 'Définir une iconographie (illustrations, photographies, vidéos)',
          description: 'Création d\'un système iconographique cohérent, choix d\'images libre de droits, design d\'interface'
        },
        {
          code: 'AC23.05',
          title: 'Réaliser, composer et produire pour une communication plurimédia',
          description: 'Conception d\'une expérience utilisateur multiplateforme, adaptation mobile/desktop'
        },
        {
          code: 'AC23.06',
          title: 'Élaborer et produire des animations, des designs sonores, des effets spéciaux, de la visualisation de données ou de la 3D',
          description: 'Réalisation de visualisations de données interactives, animations CSS, transitions cartographiques'
        },
        {
          code: 'AC24.01',
          title: 'Produire des pages et applications Web responsives',
          description: 'Développement d\'une application web responsive, optimisation mobile-first avec TailwindCSS'
        },
        {
          code: 'AC24.03',
          title: 'Intégrer, produire ou développer des interactions riches ou des dispositifs interactifs',
          description: 'Implémentation d\'interactions riches avec Leaflet, gestion d\'eventi JavaScript avancés'
        }
      ],
      learningOutcomes: [
        'Maîtrise des librairies de cartographie web (Leaflet, OpenStreetMap)',
        'Compétences en visualisation de données interactives et storytelling',
        'Développement d\'applications JavaScript complexes et modulaires',
        'Compréhension des enjeux d\'accessibilité et d\'UX design',
        'Gestion de projets collaboratifs avec Git et méthodologies agiles',
        'Sensibilisation aux droits d\'auteur et contenus libres'
      ]
    },
    'website-bdd': {
      title: 'SAÉ 203 - Site web avec source de données',
      subtitle: 'Conception d\'un site web institutionnel BUT MMI dynamique avec base de données',
      status: 'Terminé',
      category: 'Full-Stack',
      description: 'La SAÉ 203 consiste en la réalisation d\'un site web institutionnel BUT MMI avec une architecture complète intégrant base de données MySQL, interface d\'administration (back-office) et front-office dynamique. Le projet se base sur le code de la SAÉ 105 et l\'enrichit avec des fonctionnalités de gestion de contenu avancées, requêtes SQL complexes et pages générées automatiquement.',
      features: [
        'Architecture 3-tier avec base de données MySQL (3 tables: article, auteur, message)',
        'Interface d\'administration complète (back-office) avec TailwindCSS',
        'Gestion CRUD des articles, auteurs et messages de contact',
        'Pages dynamiques : article individuel et équipe de rédaction',
        'Intégration de vidéos YouTube directe dans les articles',
        'Système de gestion d\'images par liens absolus',
        'Formulaires avec validation côté serveur et client',
        'Requêtes SQL optimisées avec relations One-to-Many',
        'Configuration d\'environnement avec fichiers .env',
        'Travail collaboratif en équipe de 3-6 étudiants',
        'Déploiement avec base de données de production',
        'Architecture MVC et séparation des responsabilités'
      ],
      technologies: [
        { name: 'PHP 7.0+', icon: 'code' },
        { name: 'MySQL', icon: 'database' },
        { name: 'TailwindCSS', icon: 'wind' },
        { name: 'JavaScript', icon: 'zap' },
        { name: 'HTML5/CSS3', icon: 'layout' },
        { name: 'phpMyAdmin', icon: 'settings' },
        { name: 'Git', icon: 'git-branch' }
      ],
      images: [
        'images/projects/sae203-1.jpg',
        'images/projects/sae203-2.jpg',
        'images/projects/sae203-3.jpg',
        'images/projects/sae203-4.jpg',
        'images/projects/sae203-5.jpg'
      ],
      github: 'https://github.com/votre-username/sae-203',
      demo: '#',
      stats: {
        duration: '10 semaines',
        team: '4-5 personnes',
        lines: '4500+'
      },
      competencies: [
        {
          code: 'AC4102',
          title: 'Produire des pages Web statiques et fluides utilisant un balisage sémantique efficace',
          description: 'Intégration HTML/CSS responsive, respect des normes d\'accessibilité, utilisation de TailwindCSS pour l\'administration'
        },
        {
          code: 'AC4103',
          title: 'Générer des pages Web ou vues à partir de données structurées incluant des interactions simples',
          description: 'Pages dynamiques alimentées par MySQL, gestion des articles et auteurs, interactions JavaScript'
        },
        {
          code: 'AC4104', 
          title: 'Mettre en ligne une application Web en utilisant une solution d\'hébergement standard',
          description: 'Déploiement avec base de données, configuration des fichiers .env de production, tests en ligne'
        },
        {
          code: 'AC4105',
          title: 'Modéliser les données et les traitements d\'une application Web',
          description: 'Conception de la base de données à 3 tables, relations One-to-Many, optimisation des requêtes SQL'
        },
        {
          code: 'AC4106',
          title: 'Utiliser et adapter un modèle d\'accès aux données',
          description: 'Implémentation de requêtes SQL complexes, gestion des connexions PDO, architecture de données'
        }
      ],
      learningOutcomes: [
        'Maîtrise de l\'architecture web 3-tier (présentation, logique, données)',
        'Développement d\'interfaces d\'administration professionnelles', 
        'Gestion avancée des bases de données relationnelles',
        'Compréhension des enjeux de sécurité web (injections SQL, XSS)',
        'Collaboration en équipe sur des projets techniques complexes',
        'Déploiement et maintenance d\'applications web dynamiques'
      ]
    }
  };

  // Données des compétences BUT MMI selon le Programme National
  const butSkillsData = {
    title: 'Compétences BUT MMI - Programme National',
    subtitle: 'Les 5 compétences officielles définies par le Ministère de l\'Enseignement Supérieur',
    competencies: [
      {
        number: '1',
        title: 'Comprendre les écosystèmes numériques',
        description: 'Analyser et comprendre les enjeux de la transformation numérique, les modèles économiques et les écosystèmes numériques.',
        domains: ['Économie numérique', 'Veille technologique', 'Analyse concurrentielle']
      },
      {
        number: '2', 
        title: 'Concevoir des solutions numériques',
        description: 'Concevoir ou co-concevoir une réponse stratégique pertinente à une problématique complexe.',
        domains: ['UX/UI Design', 'Architecture logicielle', 'Gestion de projet']
      },
      {
        number: '3',
        title: 'Exprimer un message avec les médias numériques',
        description: 'Élaborer un message ou contenu créatif adapté à un média numérique et à une cible.',
        domains: ['Communication visuelle', 'Storytelling', 'Création multimédia']
      },
      {
        number: '4',
        title: 'Développer pour le web et les médias numériques', 
        description: 'Programmer et développer des dispositifs interactifs et des outils de communication numérique.',
        domains: ['Développement web', 'Programmation', 'Base de données']
      },
      {
        number: '5',
        title: 'Entreprendre dans le secteur du numérique',
        description: 'Entreprendre un projet numérique innovant en maîtrisant les aspects juridiques, économiques et sociaux.',
        domains: ['Entrepreneuriat', 'Droit du numérique', 'Marketing digital']
      }
    ],
    officialLink: 'https://www.enseignementsup-recherche.gouv.fr/fr/bo/21/Hebdo30/ESRS2119427A.htm',
    pdfLink: 'https://cache.media.enseignementsup-recherche.gouv.fr/file/SPE4-MESRI-17-6-2021/35/8/Annexe_21_BUT_MMI_1299358.pdf'
  };

  // Sélection des éléments
  const modalOverlay = document.getElementById('projectModal');
  const modalContent = {
    title: document.getElementById('modalTitle'),
    subtitle: document.getElementById('modalSubtitle'),
    status: document.getElementById('modalStatus'),
    category: document.getElementById('modalCategory'),
    description: document.getElementById('modalDescription'),
    features: document.getElementById('modalFeatures'),
    technologies: document.getElementById('modalTechnologies'),
    gallery: document.getElementById('modalGallery'),
    github: document.getElementById('modalGithub'),
    demo: document.getElementById('modalDemo'),
    stats: {
      duration: document.getElementById('statDuration'),
      team: document.getElementById('statTeam'),
      lines: document.getElementById('statLines')
    }
  };

  // Fonction pour générer la section des compétences du projet
  function generateProjectCompetenciesSection(project) {
    if (!project.competencies) return '';
    
    return `
      <div class="modal-section">
        <h3 class="modal-section-title">
          <i data-lucide="award"></i>
          Compétences et Apprentissages Critiques
        </h3>
        <p class="competencies-intro">Cette SAÉ valide les apprentissages critiques suivants du BUT MMI :</p>
        <div class="project-competencies">
          ${project.competencies.map(comp => `
            <div class="competency-item">
              <div class="competency-code">${comp.code}</div>
              <div class="competency-content">
                <h4 class="competency-title">${comp.title}</h4>
                <p class="competency-description">${comp.description}</p>
              </div>
            </div>
          `).join('')}
        </div>
      </div>
    `;
  }

  // Fonction pour générer la section des apprentissages
  function generateLearningOutcomesSection(project) {
    if (!project.learningOutcomes) return '';
    
    return `
      <div class="modal-section">
        <h3 class="modal-section-title">
          <i data-lucide="brain"></i>
          Apprentissages et Compétences Développées
        </h3>
        <div class="learning-outcomes">
          ${project.learningOutcomes.map(outcome => `
            <div class="outcome-item">
              <i data-lucide="check-circle" class="outcome-icon"></i>
              <span class="outcome-text">${outcome}</span>
            </div>
          `).join('')}
        </div>
      </div>
    `;
  }

  // Fonction pour générer la section des compétences BUT MMI
  function generateButSkillsSection() {
    return `
      <div class="but-skills-section">
        <div class="official-badge">
          <i data-lucide="shield-check"></i>
          <span>Programme Officiel</span>
        </div>
        
        <h3 class="but-skills-title">
          <i data-lucide="award"></i>
          ${butSkillsData.title}
        </h3>
        
        <p class="but-skills-subtitle">
          ${butSkillsData.subtitle}
        </p>
        
        <div class="but-competencies-grid">
          ${butSkillsData.competencies.map(comp => `
            <div class="competency-card">
              <div class="competency-header">
                <div class="competency-number">${comp.number}</div>
                <h4 class="competency-title">${comp.title}</h4>
              </div>
              <p class="competency-description">${comp.description}</p>
              <div class="competency-domains">
                ${comp.domains.map(domain => `<span class="domain-tag">${domain}</span>`).join('')}
              </div>
            </div>
          `).join('')}
        </div>
        
        <div class="official-notice">
          <div class="notice-header">
            <i data-lucide="alert-triangle" class="notice-icon"></i>
            <h4 class="notice-title">Source officielle</h4>
          </div>
          <p class="notice-text">
            Ces compétences sont définies par le Programme National du BUT MMI, publié par le Ministère de l'Enseignement Supérieur, de la Recherche et de l'Innovation au Bulletin Officiel n°30 du 29 juillet 2021.
          </p>
          <a href="${butSkillsData.officialLink}" target="_blank" class="official-link">
            <i data-lucide="external-link"></i>
            Consulter le document officiel
          </a>
        </div>
      </div>
    `;
  }

  // Fonction pour ouvrir la modal avec les données du projet
  function openProjectModal(projectId) {
    const project = projectsData[projectId];
    if (!project) return;

    // Remplir les données
    modalContent.title.textContent = project.title;
    modalContent.subtitle.textContent = project.subtitle;
    modalContent.status.querySelector('span:last-child').textContent = project.status;
    modalContent.category.querySelector('span:last-child').textContent = project.category;
    modalContent.description.textContent = project.description;

    // Remplir les fonctionnalités
    modalContent.features.innerHTML = project.features.map(feature => `
      <div class="feature-item">
        <i data-lucide="check-circle" class="feature-icon"></i>
        <span class="feature-text">${feature}</span>
      </div>
    `).join('');

    // Remplir les technologies
    modalContent.technologies.innerHTML = project.technologies.map(tech => `
      <span class="tech-badge">
        <i data-lucide="${tech.icon}"></i>
        ${tech.name}
      </span>
    `).join('');

    // Remplir la galerie
    modalContent.gallery.innerHTML = project.images.map((img, index) => `
      <div class="gallery-item">
        <img src="${img}" alt="Capture d'écran ${index + 1}" class="gallery-image" loading="lazy">
      </div>
    `).join('');

    // Mettre à jour les liens
    modalContent.github.href = project.github;
    if (project.demo && project.demo !== '#') {
      modalContent.demo.href = project.demo;
      modalContent.demo.style.display = 'inline-flex';
    } else {
      modalContent.demo.style.display = 'none';
    }

    // Mettre à jour les statistiques
    modalContent.stats.duration.textContent = project.stats.duration;
    modalContent.stats.team.textContent = project.stats.team;
    modalContent.stats.lines.textContent = project.stats.lines;

    // Ajouter les sections spécifiques au projet après les statistiques
    const modalBody = document.querySelector('.modal-body');
    if (modalBody) {
      // Supprimer les sections précédentes si elles existent
      const existingSections = modalBody.querySelectorAll('.project-competencies, .learning-outcomes, .but-skills-section');
      existingSections.forEach(section => section.parentElement?.remove());
      
      // Ajouter les nouvelles sections après la dernière section existante
      const lastSection = modalBody.querySelector('.modal-section:last-child');
      if (lastSection) {
        // Insérer les compétences du projet
        if (project.competencies) {
          lastSection.insertAdjacentHTML('afterend', generateProjectCompetenciesSection(project));
        }
        
        // Insérer les apprentissages
        if (project.learningOutcomes) {
          lastSection.insertAdjacentHTML('afterend', generateLearningOutcomesSection(project));
        }
        
        // Insérer la section des compétences BUT MMI
        lastSection.insertAdjacentHTML('afterend', generateButSkillsSection());
      }
    }

    // Ouvrir la modal
    modalOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';

    // Réinitialiser les icônes Lucide
    if (typeof lucide !== 'undefined') {
      lucide.createIcons();
    }
  }

  // Fonction pour fermer la modal
  function closeProjectModal() {
    modalOverlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  // Gestionnaire pour le bouton de fermeture
  const closeBtn = document.getElementById('modalClose');
  if (closeBtn) {
    closeBtn.addEventListener('click', closeProjectModal);
  }

  // Fermer en cliquant sur l'overlay
  modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
      closeProjectModal();
    }
  });

  // Fermer avec la touche Échap
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
      closeProjectModal();
    }
  });

  // Attacher les événements aux boutons "Détails"
  const projectCards = document.querySelectorAll('.project-card');
  projectCards.forEach((card, index) => {
    const detailsBtn = card.querySelector('.project-link:not(.primary):not([disabled])');
    if (detailsBtn) {
      // Déterminer l'ID du projet basé sur l'index ou les attributs
      let projectId;
      if (index === 0) projectId = 'cinemap';        // SAÉ 105
      else if (index === 1) projectId = 'website-bdd'; // SAÉ 203  
      else if (index === 2) projectId = 'cinemap-idf'; // SAÉ 303 - CINÉMAP IDF

      detailsBtn.addEventListener('click', () => {
        openProjectModal(projectId);
      });
    }
  });

  // Permettre aux cartes elles-mêmes d'ouvrir la modal
  projectCards.forEach((card, index) => {
    card.style.cursor = 'pointer';
    card.addEventListener('click', (e) => {
      // Ne pas ouvrir si on clique sur un bouton
      if (e.target.closest('button') || e.target.closest('a')) {
        return;
      }

      let projectId;
      if (index === 0) projectId = 'cinemap';        // SAÉ 105
      else if (index === 1) projectId = 'website-bdd'; // SAÉ 203
      else if (index === 2) projectId = 'cinemap-idf'; // SAÉ 303 - CINÉMAP IDF

      if (projectId) {
        openProjectModal(projectId);
      }
    });
  });

  console.log('Système de modal de projets initialisé');
});
