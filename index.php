<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Gaëtan Bruno Jean-Baptiste - Portfolio Développeur Web</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portfolio de Gaëtan Bruno Jean-Baptiste, étudiant en BUT MMI à l'IUT de Cergy-Pontoise. Découvrez mes projets et compétences.">
  <meta name="theme-color" content="#2563eb" />

  
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  
  <!-- Lucide Icons (icônes modernes et sobres) -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  
  <!-- Styles -->
  <link rel="stylesheet" href="Css/portfolio.css" />
  <link rel="stylesheet" href="Css/lucide-icons.css" />
  <link rel="stylesheet" href="Css/about-responsive.css" />
  <link rel="stylesheet" href="Css/final-polish.css" />
  <link rel="stylesheet" href="Css/hero-enhanced.css" />
  <link rel="stylesheet" href="Css/project-modal.css" />
  <link rel="stylesheet" href="Css/but-skills.css" />
</head>
<body>
  <a class="skip-link" href="#about">Aller au contenu</a>
  
  <!-- Navigation -->
  <nav class="navbar">
    <div class="nav-container">
      <div class="nav-brand">
        <span class="brand-initial">G</span>
        <span class="brand-name">Gaëtan</span>
      </div>
      
      <ul class="nav-menu">
        <li><a href="#about" class="nav-link">À propos</a></li>
        <li><a href="#skills" class="nav-link">Compétences</a></li>
        <li><a href="#projects" class="nav-link">Projets</a></li>

        <li><a href="#contact" class="nav-link">Contact</a></li>
      </ul>
      

      <button class="theme-toggle" type="button" aria-label="Basculer en mode sombre" title="Mode sombre">
        <i data-lucide="moon" class="theme-icon" aria-hidden="true"></i>
      </button>
      <div class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>

  <!-- Progress Navigation (sections) -->
  <div class="progress-bar-container" aria-hidden="false">
    <div class="progress-line"></div>
    <div class="progress-dots" role="navigation" aria-label="Navigation des sections">
      <a class="progress-dot" href="#hero" data-section="hero"><span class="dot-label">Accueil</span></a>
      <a class="progress-dot" href="#about" data-section="about"><span class="dot-label">À propos</span></a>
      <a class="progress-dot" href="#skills" data-section="skills"><span class="dot-label">Compétences</span></a>
      <a class="progress-dot" href="#projects" data-section="projects"><span class="dot-label">Projets</span></a>
      
      <a class="progress-dot" href="#contact" data-section="contact"><span class="dot-label">Contact</span></a>
    </div>
  </div>


  <!-- Hero Section -->
  <section id="hero" class="hero">
    <!-- Arrière-plan avec images en transition -->
    <div class="hero-background">
      <div class="background-slider">
        <div class="background-slide"></div>
        <div class="background-slide"></div>
        <div class="background-slide"></div>
      </div>
      <div class="background-overlay"></div>
    </div>

    <div class="container">
      <div class="hero-content">
        <div class="hero-text">

          <h1 class="hero-title">
            <span class="title-greeting">Bonjour, je suis</span>
            <span class="title-name">Gaëtan</span>
            <span class="title-accent">Bruno Jean-Baptiste</span>
          </h1>
          <p class="hero-subtitle">
            <i data-lucide="graduation-cap" class="subtitle-icon"></i>
            <span>Étudiant en <strong>BUT MMI</strong> à l'IUT de Cergy-Pontoise (Sarcelles) passionné par le numérique, la création et l'entrepreneuriat. Curieux et déterminé, j'aime imaginer des projets utiles et comprendre comment les choses fonctionnent.</span>
          </p>
          <div class="hero-highlights">
            <div class="highlight-item">
              <i data-lucide="code"></i>
              <span>Développeur Web</span>
            </div>
            <div class="highlight-item">
              <i data-lucide="palette"></i>
              <span>Créatif</span>
            </div>
            <div class="highlight-item">
              <i data-lucide="rocket"></i>
              <span>Entrepreneur</span>
            </div>
          </div>
          <div class="hero-buttons">
            <a href="#projects" class="btn btn-primary">
              <i data-lucide="folder" class="btn-icon"></i>
              Voir mes projets
            </a>
            <a href="#contact" class="btn btn-secondary">
              <i data-lucide="mail" class="btn-icon"></i>
              Me contacter
            </a>
          </div>
        </div>
        <div class="hero-image">
          <div class="profile-photo">
            <div class="photo-glow"></div>
            <div class="photo-frame">
              <img src="images/PID - Photo .jpg" alt="Gaëtan Bruno Jean-Baptiste" class="profile-img">
            </div>
           
            <div class="profile-badge">
              <i data-lucide="check-circle"></i>
              <span>Disponible</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator">
      <i data-lucide="mouse"></i>
      <span>Scroll</span>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="section about-modern">
    <div class="container">
      <div class="section-header">
        <span class="section-badge"><i data-lucide="rocket" class="badge-icon"></i> Mon parcours</span>
        <h2>À propos de moi</h2>
        <p class="section-subtitle">Découvrez mon univers, ma passion et ma vision du développement web</p>
      </div>
      
      <div class="about-grid">
        <!-- Carrousel de cartes About -->
        <div class="about-carousel-wrapper">
          <!-- Navigation du carrousel -->
          <div class="carousel-controls">
            <button class="carousel-btn carousel-prev" aria-label="Carte précédente">
              <i data-lucide="chevron-left"></i>
            </button>
            <button class="carousel-btn carousel-next" aria-label="Carte suivante">
              <i data-lucide="chevron-right"></i>
            </button>
          </div>

          <!-- Container du carrousel -->
          <div class="about-carousel-container">
            <div class="about-carousel-track">
              
              <!-- Carte 1: Profil Principal -->
              <div class="about-main-card carousel-card active" data-card="0">
                <div class="profile-section">
                  <div class="profile-avatar">
                    <div class="avatar-ring">
                      <div class="avatar-content">
                        <img src="images/PID - Photo .jpg" alt="Gaëtan Bruno Jean-Baptiste" class="avatar-img">
                      </div>
                    </div>
                  </div>
                  <div class="profile-info">
                    <h3>Gaëtan Bruno Jean-Baptiste</h3>
                    <p class="profile-role">Étudiant BUT MMI - Développeur Web</p>
                    <div class="profile-tags">
                      <span class="tag"><i data-lucide="graduation-cap"></i> BUT MMI Cergy-Pontoise</span>
                      <span class="tag"><i data-lucide="code"></i> Développement Web</span>
                      <span class="tag"><i data-lucide="star"></i> Entrepreneur</span>
                    </div>
                  </div>
                </div>
                <div class="description-section">
                  <p class="main-text">
                    <span class="highlight">Étudiant en BUT MMI</span> à l'IUT de Cergy-Pontoise (Sarcelles, France), je suis passionné par le numérique et la création. 
                    Curieux et déterminé, j'aime imaginer des projets utiles et comprendre comment les choses fonctionnent.
                  </p>
                  <p class="secondary-text">
                    Mon expérience en tant que conseiller de vente chez PLUGANDGO et mon engagement bénévole 
                    m'ont appris l'importance de la communication et du travail d'équipe dans la réussite de tout projet.
                  </p>
                  <div class="passion-items">
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="palette"></i></div>
                      <div class="passion-content">
                        <h4>Création Numérique</h4>
                        <p>Projets multimédias innovants</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="briefcase"></i></div>
                      <div class="passion-content">
                        <h4>Entrepreneuriat</h4>
                        <p>Esprit d'initiative et leadership</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="search"></i></div>
                      <div class="passion-content">
                        <h4>Curiosité</h4>
                        <p>Expérimentation constante</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Carte 2: Compétences Techniques -->
              <div class="about-main-card carousel-card" data-card="1">
                <div class="profile-section">
                  <div class="profile-avatar">
                    <div class="avatar-ring">
                      <div class="avatar-content">
                        <i data-lucide="laptop" class="avatar-icon"></i>
                      </div>
                    </div>
                  </div>
                  <div class="profile-info">
                    <h3>Mes Compétences</h3>
                    <p class="profile-role">Stack Technique & Communication</p>
                    <div class="profile-tags">
                      <span class="tag">Développement Web</span>
                      <span class="tag">Gestion Projet</span>
                      <span class="tag">E-commerce</span>
                    </div>
                  </div>
                </div>
                <div class="description-section">
                  <p class="main-text">
                    Mes <span class="highlight">compétences techniques</span> couvrent le développement web, la gestion de projet et la communication numérique. 
                    Je développe constamment mes connaissances dans ces domaines clés.
                  </p>
                  <p class="secondary-text">
                    Mon expérience en vente et communication, associée à ma formation technique, 
                    me permet d'avoir une approche complète des projets numériques.
                  </p>
                  <div class="passion-items">
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="globe"></i></div>
                      <div class="passion-content">
                        <h4>Développement Web</h4>
                        <p>HTML, CSS, JavaScript, PHP</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="bar-chart"></i></div>
                      <div class="passion-content">
                        <h4>Gestion de Projet</h4>
                        <p>Organisation et leadership</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="message-circle"></i></div>
                      <div class="passion-content">
                        <h4>Communication</h4>
                        <p>Numérique et relation client</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Carte 3: Expérience Professionnelle -->
              <div class="about-main-card carousel-card" data-card="2">
                <div class="profile-section">
                  <div class="profile-avatar">
                    <div class="avatar-ring">
                      <div class="avatar-content">
                        <i data-lucide="briefcase" class="avatar-icon"></i>
                      </div>
                    </div>
                  </div>
                  <div class="profile-info">
                    <h3>Mon Expérience</h3>
                    <p class="profile-role">Stage & Bénévolat</p>
                    <div class="profile-tags">
                      <span class="tag">PLUGANDGO</span>
                      <span class="tag">Conseiller Vente</span>
                      <span class="tag">Communication</span>
                    </div>
                  </div>
                </div>
                <div class="description-section">
                  <p class="main-text">
                    Mon <span class="highlight">expérience professionnelle</span> chez PLUGANDGO en tant que conseiller de vente m'a appris l'importance de l'écoute client et de la communication.
                  </p>
                  <p class="secondary-text">
                    Mon engagement bénévole au foyer associatif "Jeunes fourrillers de Soula" 
                    m'a permis de développer mes compétences en communication digitale et gestion de contenu.
                  </p>
                  <div class="passion-items">
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="shopping-bag"></i></div>
                      <div class="passion-content">
                        <h4>Conseil Vente</h4>
                        <p>Accueil et relation client</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="file-text"></i></div>
                      <div class="passion-content">
                        <h4>Communication</h4>
                        <p>Blog et contenu digital</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="users"></i></div>
                      <div class="passion-content">
                        <h4>Travail d'équipe</h4>
                        <p>Autonomie et collaboration</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Carte 4: Qualités & Vision -->
              <div class="about-main-card carousel-card" data-card="3">
                <div class="profile-section">
                  <div class="profile-avatar">
                    <div class="avatar-ring">
                      <div class="avatar-content">
                        <i data-lucide="star" class="avatar-icon"></i>
                      </div>
                    </div>
                  </div>
                  <div class="profile-info">
                    <h3>Mes Qualités</h3>
                    <p class="profile-role">Leadership & Communication</p>
                    <div class="profile-tags">
                      <span class="tag">Leadership</span>
                      <span class="tag">Esprit d'équipe</span>
                      <span class="tag">Communication</span>
                    </div>
                  </div>
                </div>
                <div class="description-section">
                  <p class="main-text">
                    <span class="highlight">Déterminé et communicant</span>, j'aime mener des projets avec un esprit d'équipe fort. 
                    Ma curiosité naturelle me pousse à toujours expérimenter et apprendre.
                  </p>
                  <p class="secondary-text">
                    Mes centres d'intérêt incluent la conception de projets et de marques, 
                    l'animation 3D, et surtout la recherche constante de nouvelles technologies.
                  </p>
                  <div class="passion-items">
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="target"></i></div>
                      <div class="passion-content">
                        <h4>Leadership</h4>
                        <p>Guide et inspire les équipes</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="palette"></i></div>
                      <div class="passion-content">
                        <h4>Créativité</h4>
                        <p>Animation 3D et design de marques</p>
                      </div>
                    </div>
                    <div class="passion-item">
                      <div class="passion-icon"><i data-lucide="microscope"></i></div>
                      <div class="passion-content">
                        <h4>Expérimentation</h4>
                        <p>Curiosité et innovation constante</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Indicateurs du carrousel -->
          <div class="carousel-indicators">
            <button class="indicator active" data-card="0" aria-label="Carte 1"></button>
            <button class="indicator" data-card="1" aria-label="Carte 2"></button>
            <button class="indicator" data-card="2" aria-label="Carte 3"></button>
            <button class="indicator" data-card="3" aria-label="Carte 4"></button>
          </div>
        </div>

        <!-- Carrousel Stats Accomplissements -->
        <div class="stats-carousel-wrapper">
          <!-- Navigation du carrousel stats -->
          <div class="carousel-controls stats-controls">
            <button class="carousel-btn carousel-prev-stats" aria-label="Stats précédentes">
              <span>‹</span>
            </button>
            <button class="carousel-btn carousel-next-stats" aria-label="Stats suivantes">
              <span>›</span>
            </button>
          </div>

          <div class="stats-carousel-container">
            <div class="stats-carousel-track">
              
              <!-- Groupe 1: Accomplissements Académiques -->
              <div class="stats-container carousel-stats active" data-stats="0">
                <h3 class="stats-title"><i data-lucide="graduation-cap"></i> Accomplissements Académiques</h3>
                <div class="modern-stats">
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="book"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="2">0</span>
                      <span class="stat-plus">+</span>
                      <span class="stat-label">Années d'études</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 60%;"></div>
                    </div>
                  </div>
                  
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="trophy"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="95">0</span>
                      <span class="stat-percent">%</span>
                      <span class="stat-label">Moyenne générale</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 95%;"></div>
                    </div>
                  </div>
                  
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="file-text"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="8">0</span>
                      <span class="stat-plus">+</span>
                      <span class="stat-label">Modules validés</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 80%;"></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Groupe 2: Réalisations Techniques -->
              <div class="stats-container carousel-stats" data-stats="1">
                <h3 class="stats-title"><i data-lucide="laptop"></i> Réalisations Techniques</h3>
                <div class="modern-stats">
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="folder"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="15">0</span>
                      <span class="stat-plus">+</span>
                      <span class="stat-label">Projets réalisés</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 85%;"></div>
                    </div>
                  </div>
                  
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="rocket"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="6">0</span>
                      <span class="stat-plus">+</span>
                      <span class="stat-label">Technologies maîtrisées</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 70%;"></div>
                    </div>
                  </div>
                  
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="settings"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="500">0</span>
                      <span class="stat-plus">+</span>
                      <span class="stat-label">Heures de code</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 90%;"></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Groupe 3: Compétences Personnelles -->
              <div class="stats-container carousel-stats" data-stats="2">
                <h3 class="stats-title"><i data-lucide="star"></i> Compétences Personnelles</h3>
                <div class="modern-stats">
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="flame"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="100">0</span>
                      <span class="stat-percent">%</span>
                      <span class="stat-label">Motivation</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 100%;"></div>
                    </div>
                  </div>
                  
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="zap"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="95">0</span>
                      <span class="stat-percent">%</span>
                      <span class="stat-label">Persévérance</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 95%;"></div>
                    </div>
                  </div>
                  
                  <div class="stat-card">
                    <div class="stat-icon"><i data-lucide="handshake"></i></div>
                    <div class="stat-content">
                      <span class="stat-number" data-target="90">0</span>
                      <span class="stat-percent">%</span>
                      <span class="stat-label">Collaboration</span>
                    </div>
                    <div class="stat-progress">
                      <div class="progress-bar" style="--progress: 90%;"></div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Indicateurs du carrousel stats -->
          <div class="carousel-indicators stats-indicators">
            <button class="indicator active" data-stats="0" aria-label="Stats 1"></button>
            <button class="indicator" data-stats="1" aria-label="Stats 2"></button>
            <button class="indicator" data-stats="2" aria-label="Stats 3"></button>
          </div>
        </div>

        <!-- Carrousel Timeline Parcours -->
        <div class="timeline-carousel-wrapper">
          <!-- Navigation du carrousel timeline -->
          <div class="carousel-controls timeline-controls">
            <button class="carousel-btn carousel-prev-timeline" aria-label="Parcours précédent">
              <span>‹</span>
            </button>
            <button class="carousel-btn carousel-next-timeline" aria-label="Parcours suivant">
              <span>›</span>
            </button>
          </div>

          <div class="timeline-carousel-container">
            <div class="timeline-carousel-track">
              
              <!-- Parcours 1: Formation Actuelle -->
              <div class="timeline-container carousel-timeline active" data-timeline="0">
                <h3 class="timeline-title"><i data-lucide="graduation-cap"></i> Formation</h3>
                <div class="modern-timeline">
                  <div class="timeline-line"></div>
                  
                  <div class="timeline-item active">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2025 - 2027</div>
                      <div class="timeline-content">
                        <h4>BUT MMI</h4>
                        <p>IUT de Cergy-Pontoise - Sarcelles, France</p>
                        <div class="timeline-skills">
                          <span>Multimédia</span>
                          <span>Internet</span>
                          <span>Communication</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="timeline-item">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2025</div>
                      <div class="timeline-content">
                        <h4>Baccalauréat Général</h4>
                        <p>Mention Assez Bien</p>
                        <div class="timeline-skills">
                          <span>NSI</span>
                         
                          <span>SES</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Parcours 2: Projets Marquants -->
              <div class="timeline-container carousel-timeline" data-timeline="1">
                <h3 class="timeline-title">� Expérience</h3>
                <div class="modern-timeline">
                  <div class="timeline-line"></div>
                  
                  <div class="timeline-item active">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2025</div>
                      <div class="timeline-content">
                        <h4>Conseiller de vente - Stage</h4>
                        <p>PLUGANDGO - Stage professionnel</p>
                        <div class="timeline-skills">
                          <span>Accueil client</span>
                          <span>Gestion commandes</span>
                          <span>Conseil</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="timeline-item">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2024-2025</div>
                      <div class="timeline-content">
                        <h4>Bénévole Communication</h4>
                        <p>Foyer associatif "Jeunes fourrillers de Soula" - Engagement bénévole</p>
                        <div class="timeline-skills">
                          <span>Blog interne</span>
                          <span>Communication digitale</span>
                          <span>Travail d'équipe</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="timeline-item">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2024</div>
                      <div class="timeline-content">
                        <h4>Projets personnels</h4>
                        <p>Animation 3D et conception de projets numériques</p>
                        <div class="timeline-skills">
                          <span>Animation 3D</span>
                          <span>Conception</span>
                          <span>E-commerce</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Parcours 3: Objectifs Futurs -->
              <div class="timeline-container carousel-timeline" data-timeline="2">
                <h3 class="timeline-title"><i data-lucide="target"></i> Objectifs Futurs</h3>
                <div class="modern-timeline">
                  <div class="timeline-line"></div>
                  
                  <div class="timeline-item active">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2026</div>
                      <div class="timeline-content">
                        <h4>Stage en Entreprise</h4>
                        <p>Intégration dans une équipe de développement</p>
                        <div class="timeline-skills">
                          <span>Travail d'équipe</span>
                          <span>Projets réels</span>
                          <span>Méthodologies</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="timeline-item">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2027</div>
                      <div class="timeline-content">
                        <h4>Diplôme BUT MMI</h4>
                        <p>Obtention du diplôme et spécialisation</p>
                        <div class="timeline-skills">
                          <span>Full-Stack</span>
                          <span>Gestion projet</span>
                          <span>Leadership</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="timeline-item">
                    <div class="timeline-marker">
                      <div class="marker-ring"></div>
                      <div class="marker-dot"></div>
                    </div>
                    <div class="timeline-card">
                      <div class="timeline-date">2028+</div>
                      <div class="timeline-content">
                        <h4>Carrière Professionnelle</h4>
                        <p>Développeur senior et création d'entreprise</p>
                        <div class="timeline-skills">
                          <span>Innovation</span>
                          <span>Entrepreneuriat</span>
                          <span>Impact</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Indicateurs du carrousel timeline -->
          <div class="carousel-indicators timeline-indicators">
            <button class="indicator active" data-timeline="0" aria-label="Parcours 1"></button>
            <button class="indicator" data-timeline="1" aria-label="Parcours 2"></button>
            <button class="indicator" data-timeline="2" aria-label="Parcours 3"></button>
          </div>
        </div>

        <!-- Card compétences rapides -->
        <div class="quick-skills">
          <h3>Technologies favorites</h3>
          <div class="skill-bubbles">
            <div class="skill-bubble" style="--delay: 0s;">
              <span class="skill-icon"><i data-lucide="atom"></i></span>
              <span>React</span>
            </div>
            <div class="skill-bubble" style="--delay: 0.1s;">
              <span class="skill-icon"><i data-lucide="circle"></i></span>
              <span>Node.js</span>
            </div>
            <div class="skill-bubble" style="--delay: 0.2s;">
              <span class="skill-icon"><i data-lucide="palette"></i></span>
              <span>CSS3</span>
            </div>
            <div class="skill-bubble" style="--delay: 0.3s;">
              <span class="skill-icon"><i data-lucide="zap"></i></span>
              <span>JavaScript</span>
            </div>
            <div class="skill-bubble" style="--delay: 0.4s;">
              <span class="skill-icon"><i data-lucide="code"></i></span>
              <span>PHP</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Skills Section -->
  <section id="skills" class="section section-alt">
    <div class="container">
      <div class="section-header">
        <h2>Compétences</h2>
        <p class="section-subtitle">Technologies et outils que je maîtrise</p>
      </div>
      
      <div class="skills-grid">
        <div class="skill-category">
          <h3>Front-end</h3>
          <div class="skills-list">
            <span class="skill-tag">HTML5</span>
           
            <span class="skill-tag">JavaScript</span>
            <span class="skill-tag">React</span>
       
          </div>
        </div>
        
        <div class="skill-category">
          <h3>Back-end</h3>
          <div class="skills-list">
            <span class="skill-tag">PHP</span>
            <span class="skill-tag">MySQL</span>
            <span class="skill-tag">Node.js</span>
          </div>
        </div>
        
        <div class="skill-category">
          <h3>Outils</h3>
          <div class="skills-list">
            <span class="skill-tag">Git</span>
            <span class="skill-tag">VS Code</span>
            <span class="skill-tag">Figma</span>
            <span class="skill-tag">Adobe Suite</span>
            <span class="skill-tag">Unity</span>

          </div>
        </div>
      </div>
      
      <!-- Section Compétences BUT MMI Officielle 
      <div class="but-skills-section">
        <div class="official-badge">
          <i data-lucide="shield-check"></i>
          <span>Programme Officiel</span>
        </div>
        
        <h3 class="but-skills-title">
          <i data-lucide="award"></i>
          Compétences BUT MMI - Programme National
        </h3>
        
        <p class="but-skills-subtitle">
          Les 5 compétences officielles définies par le Ministère de l'Enseignement Supérieur selon le référentiel BUT MMI 2021
        </p>
        
        <div class="but-competencies-grid">
          <div class="competency-card">
            <div class="competency-header">
              <div class="competency-number">1</div>
              <h4 class="competency-title">Comprendre les écosystèmes numériques</h4>
            </div>
            <p class="competency-description">Analyser et comprendre les enjeux de la transformation numérique, les modèles économiques et les écosystèmes numériques.</p>
            <div class="competency-domains">
              <span class="domain-tag">Économie numérique</span>
              <span class="domain-tag">Veille technologique</span>
              <span class="domain-tag">Analyse concurrentielle</span>
            </div>
          </div>
          
          <div class="competency-card">
            <div class="competency-header">
              <div class="competency-number">2</div>
              <h4 class="competency-title">Concevoir des solutions numériques</h4>
            </div>
            <p class="competency-description">Concevoir ou co-concevoir une réponse stratégique pertinente à une problématique complexe.</p>
            <div class="competency-domains">
              <span class="domain-tag">UX/UI Design</span>
              <span class="domain-tag">Architecture logicielle</span>
              <span class="domain-tag">Gestion de projet</span>
            </div>
          </div>
          
          <div class="competency-card">
            <div class="competency-header">
              <div class="competency-number">3</div>
              <h4 class="competency-title">Exprimer un message avec les médias numériques</h4>
            </div>
            <p class="competency-description">Élaborer un message ou contenu créatif adapté à un média numérique et à une cible.</p>
            <div class="competency-domains">
              <span class="domain-tag">Communication visuelle</span>
              <span class="domain-tag">Storytelling</span>
              <span class="domain-tag">Création multimédia</span>
            </div>
          </div>
          
          <div class="competency-card">
            <div class="competency-header">
              <div class="competency-number">4</div>
              <h4 class="competency-title">Développer pour le web et les médias numériques</h4>
            </div>
            <p class="competency-description">Programmer et développer des dispositifs interactifs et des outils de communication numérique.</p>
            <div class="competency-domains">
              <span class="domain-tag">Développement web</span>
              <span class="domain-tag">Programmation</span>
              <span class="domain-tag">Base de données</span>
            </div>
          </div>
          
          <div class="competency-card">
            <div class="competency-header">
              <div class="competency-number">5</div>
              <h4 class="competency-title">Entreprendre dans le secteur du numérique</h4>
            </div>
            <p class="competency-description">Entreprendre un projet numérique innovant en maîtrisant les aspects juridiques, économiques et sociaux.</p>
            <div class="competency-domains">
              <span class="domain-tag">Entrepreneuriat</span>
              <span class="domain-tag">Droit du numérique</span>
              <span class="domain-tag">Marketing digital</span>
            </div>
          </div>
        </div>
        
        <div class="official-notice">
          <div class="notice-header">
            <i data-lucide="alert-triangle" class="notice-icon"></i>
            <h4 class="notice-title">Source officielle</h4>
          </div>
          <p class="notice-text">
            Ces compétences sont définies par le Programme National du BUT MMI, publié par le Ministère de l'Enseignement Supérieur, de la Recherche et de l'Innovation au Bulletin Officiel n°30 du 29 juillet 2021.
          </p>
          <a href="https://www.enseignementsup-recherche.gouv.fr/fr/bo/21/Hebdo30/ESRS2119427A.htm" target="_blank" class="official-link">
            <i data-lucide="external-link"></i>
            Consulter le document officiel
          </a>
        </div>
      </div>
    </div>
  </section>

  -->

  <!-- Projects Section -->
  
<section id="projects" class="section">
  <div class="container">
    <div class="section-header">
      <h2>Projets</h2>
      <p class="section-subtitle">Une sélection de projets (web, UI/UX et expérimentations). Cliquez sur une carte pour voir les détails.</p>
    </div>

    <!-- Mini Bannière de notification 
     
    <div class="projects-banner">
      <div class="banner-content">
        <div class="banner-icon"><i data-lucide="construction"></i></div>
        <div class="banner-text">
          <h3>Section en développement</h3>
          <p>Ces projets sont actuellement en cours de finalisation. Le contenu détaillé sera bientôt disponible !</p>
        </div>
        <div class="banner-status">
          <span class="status-badge">Bientôt disponible</span>
        </div>
      </div>
    </div>

  -->

    <div class="projects-grid">
      
      

      <!-- Projet 2: SAÉ 105 -->
      <div class="project-card" data-category="front">
        <div class="project-image">
          <img src="images/projects/SAE 105/image-1771281656710.png" alt="Site web BUT MMI" class="project-img">
          <div class="project-overlay">
            <div class="project-status">Terminé
              <br>
              <span class="status-note">SAÉ 105</span>
            </div>
          </div>
        </div>
        <div class="project-content">
          <div class="project-header">
            <div class="project-icon">
              <img src="images/icons/front-icon.png" alt="Full-Stack" class="category-icon">
            </div>
            <div class="project-meta">
              <h3>Création d'un site web Institutionnel (BUT MMI) </h3>
              <div class="project-category">
                 <p>Front</p>
               </div>
            </div>
          </div>
          <p>Réalisation d'un site web institutionnel pour CY Cergy Paris Université présentant le BUT MMI aux lycéens. Projet collaboratif intégrant maquette Adobe XD, formulaire PHP et hébergement.</p>
          <div class="project-tech">
            <span class="tech-tag">HTML5/CSS3</span>
            <span class="tech-tag">PHP</span>
            <span class="tech-tag">Adobe XD</span>
          </div>
          <div class="project-links">
            <button class="project-link">Détails</button>
            <button class="project-link primary" disabled>Démo</button>
            <button class="project-link" disabled>Code</button>
          </div>
        </div>
      </div>


      <!-- Projet 3: SAÉ 203 -->
      <div class="project-card" data-category="website-bdd">
        <div class="project-image">
          <img src="images/project-placeholder.jpg" alt="SAÉ 203 Site web avec base de données" class="project-img">
          <div class="project-overlay">
            <div class="project-status">Terminé
              <br>
              <span class="status-note">SAÉ 203</span>
            </div>
          </div>
        </div>
        <div class="project-content">
          <div class="project-header">
            <div class="project-icon">
              <img src="images/icons/backend-icon.png" alt="Full-Stack" class="category-icon">
            </div>
            <div class="project-meta">
              <h3>Création et dynamisation de site web avec BDD</h3>
              <span class="project-category">Full-Stack</span>
            </div>
          </div>
          <p>Développement d'un site web institutionnel BUT MMI dynamique avec base de données MySQL, interface d'administration complète et pages générées automatiquement. Projet collaboratif intégrant back-office et front-office.</p>
          <div class="project-tech">
            <span class="tech-tag">PHP/MySQL</span>
            <span class="tech-tag">TailwindCSS</span>
            <span class="tech-tag">JavaScript</span>
          </div>
          <div class="project-links">
            <button class="project-link">Détails</button>
            <button class="project-link primary" disabled>Démo</button>
            <button class="project-link" disabled>Code</button>
          </div>
        </div>
      </div>




      <!-- Projet 4: SAÉ 303 CINÉMAP IDF -->
      <div class="project-card" data-category="cinemap-idf">
        <div class="project-image">
          <img src="images/projects/SAE 303/image-1771280262641.png" alt="CINÉMAP IDF" class="project-img">
          <div class="project-overlay">
            <div class="project-status">Terminé
              <br>
              <span class="status-note">SAÉ 303</span>
            </div>
          </div> 
        </div>
        <div class="project-content">
          <div class="project-header">
            <div class="project-icon">
              <img src="images/icons/uiux-icon.png" alt="Data-Viz" class="category-icon">
            </div>
            <div class="project-meta">
              <h3>CINÉMAP IDF - Explorez les cinémas d'Île-de-France</h3>
              <span class="project-category">Data-Viz</span>
            </div>
          </div>
          <p>Application interactive de visualisation de données géographiques sur les cinémas d'Île-de-France. Carte interactive avec Leaflet/OpenStreetMap, chargement dynamique des données JSON et interface responsive.</p>
          <div class="project-tech">
            <span class="tech-tag">JavaScript</span>
            <span class="tech-tag">Leaflet.js</span>
            <span class="tech-tag">OpenStreetMap</span>
          </div>
          <div class="project-links">
            <button class="project-link">Détails</button>
            <button class="project-link primary" disabled>Démo</button>
            <button class="project-link" disabled>Code</button>
          </div>
        </div>
      </div>



</section>


  <!-- Contact Section -->
  
  

  <section id="contact" class="section section-alt">
    <div class="container">
      <div class="section-header">
        <h2>Contact</h2>
        <p class="section-subtitle">Intéressé par mon profil ? Contactons-nous !</p>
      </div>
      
      <div class="contact-content">
        <div class="contact-info">
          <h3>Informations</h3>
          <div class="contact-item">
            <i data-lucide="mail" class="contact-icon"></i>
            <span>gaetan.bruno.jean.baptiste@gmail.com</span>
          </div>
          <div class="contact-item">
            <i data-lucide="phone" class="contact-icon"></i>
            <span>06 94 05 09 43</span>
          </div>
          <div class="contact-item">
            <i data-lucide="map-pin" class="contact-icon"></i>
            <span>Sarcelles, France</span>
          </div>
          <div class="contact-item">
            <i data-lucide="globe" class="contact-icon"></i>
            <span>Français (natif) - Anglais (A1)</span>
          </div>
          
          <div class="social-links">
            <a href="https://linkedin.com/in/gaetan-bruno-jean-baptiste" class="social-link">LinkedIn</a>
            <a href="#" class="social-link">GitHub</a>
            <a href="#" class="social-link">Portfolio</a>
          </div>
        </div>

        <form class="contact-form" id="contactForm" method="post" action="contact.php">
          <div class="form-group">
            <label for="name">Nom complet *</label>
            <input type="text" id="name" name="name" required minlength="2" maxlength="100" placeholder="Votre nom et prénom">
            <span class="form-error" id="nameError"></span>
          </div>
          
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required maxlength="255" placeholder="votre@email.com">
            <span class="form-error" id="emailError"></span>
          </div>
          
          <div class="form-group">
            <label for="message">Message *</label>
            <textarea id="message" name="message" rows="5" required minlength="10" maxlength="1000" placeholder="Décrivez votre demande ou votre projet..."></textarea>
            <span class="form-helper">Entre 10 et 1000 caractères</span>
            <span class="form-error" id="messageError"></span>
          </div>
          
          <button type="submit" class="btn btn-primary btn-full" id="submitBtn">
            <i data-lucide="send" class="btn-icon"></i>
            <span class="btn-text">Envoyer le message</span>
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- Modal de détails de projet -->
  <div id="projectModal" class="project-modal-overlay">
    <div class="project-modal">
      <button id="modalClose" class="modal-close">
        <i data-lucide="x"></i>
      </button>

      <div class="modal-header">
        <h2 id="modalTitle" class="modal-title">Titre du projet</h2>
        <p id="modalSubtitle" class="modal-subtitle">Sous-titre du projet</p>
        <div class="modal-tags">
          <span id="modalStatus" class="modal-tag status">
            <i data-lucide="activity"></i>
            <span>En développement</span>
          </span>
          <span id="modalCategory" class="modal-tag category">
            <i data-lucide="folder"></i>
            <span>Full-Stack</span>
          </span>
        </div>
      </div>

      <div class="modal-body">
        <!-- Description -->
        <div class="modal-section">
          <h3 class="modal-section-title">
            <i data-lucide="file-text"></i>
            Description
          </h3>
          <p id="modalDescription" class="modal-description">
            Description détaillée du projet...
          </p>
        </div>

        <!-- Fonctionnalités -->
        <div class="modal-section">
          <h3 class="modal-section-title">
            <i data-lucide="check-square"></i>
            Fonctionnalités principales
          </h3>
          <div id="modalFeatures" class="modal-features">
            <!-- Les fonctionnalités seront ajoutées dynamiquement -->
          </div>
        </div>

        <!-- Galerie d'images -->
        <div class="modal-section">
          <h3 class="modal-section-title">
            <i data-lucide="image"></i>
            Captures d'écran
          </h3>
          <div id="modalGallery" class="modal-gallery">
            <!-- Les images seront ajoutées dynamiquement -->
          </div>
        </div>

        <!-- Technologies -->
        <div class="modal-section">
          <h3 class="modal-section-title">
            <i data-lucide="code-2"></i>
            Technologies utilisées
          </h3>
          <div id="modalTechnologies" class="modal-technologies">
            <!-- Les technologies seront ajoutées dynamiquement -->
          </div>
        </div>

        <!-- Statistiques -->
        <div class="modal-section">
          <h3 class="modal-section-title">
            <i data-lucide="bar-chart-2"></i>
            En chiffres
          </h3>
          <div class="project-stats">
            <div class="stat-box">
              <span id="statDuration" class="stat-value">3 mois</span>
              <span class="stat-label">Durée du projet</span>
            </div>
            <div class="stat-box">
              <span id="statTeam" class="stat-value">1 personne</span>
              <span class="stat-label">Équipe</span>
            </div>
            <div class="stat-box">
              <span id="statLines" class="stat-value">2000+</span>
              <span class="stat-label">Lignes de code</span>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-actions">
        <a id="modalGithub" href="#" target="_blank" class="modal-btn github">
          <i data-lucide="github"></i>
          Voir sur GitHub
        </a>
        <a id="modalDemo" href="#" target="_blank" class="modal-btn primary">
          <i data-lucide="external-link"></i>
          Voir la démo
        </a>
        <button onclick="document.getElementById('modalClose').click()" class="modal-btn secondary">
          <i data-lucide="arrow-left"></i>
          Retour aux projets
        </button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2026 Gaëtan Bruno Jean-Baptiste. Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="Script/main.js"></script>
  <script src="Script/about-carousel.js"></script>
  <script src="Script/hero-slider.js"></script>
  <script src="Script/project-modal.js"></script>
  
  <!-- Initialisation des icônes Lucide -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Initialiser les icônes Lucide
      if (typeof lucide !== 'undefined') {
        lucide.createIcons();
        console.log('Icônes Lucide initialisées');
      }
    });
  </script>
</body>
</html>