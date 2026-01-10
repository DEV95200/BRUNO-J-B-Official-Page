<?php
session_start();
require_once(__DIR__ . '/Data-Base/db.php');

// Récupération des articles publiés
$articles = $pdo->query("SELECT * FROM article WHERE statut = 'publie' ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - 1 JOUR 1 CODE</title>
  <link rel="stylesheet" href="Css/accueil.css">
  <link rel="stylesheet" href="Css/accueil-cards.css"><!-- à créer pour la grille -->
</head>
  <script>
  // Affiche le loader pendant 5 secondes, puis recharge la page sans loader
  setTimeout(function() {
    document.getElementById('loader').style.display = 'none';
  }, 5000);
</script>
<body>
   <!-- LOADER -->
  <div id="loader">
    <div id="loader-content">
      <svg id="loader-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="loader-circle" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="loader-path" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
      </svg>
      Chargement...
    </div>
  </div>
  <header>
    <h1>1 JOUR, 1 CODE</h1>
    <nav>
      <a href="#accueil">Accueil</a>
      <a href="#parcours">Parcours</a>
      <a href="#projets">Projets à venir</a>
      <a href="#aspirations">Aspirations</a>
      <a href="Administration/dashboard.php" class="admin-btn">Espace Administration</a>
    </nav>
  </header>
  <main class="main-grid">
    <section class="articles-col">
      <h2>Articles / Pages</h2>
      <div class="articles-list">
        <?php foreach ($articles as $article): ?>
          <a href="page.php?id=<?= $article['id'] ?>" class="article-card">
            <section class="article-texts">
              <h3 class="article-title"><?= htmlspecialchars($article['titre']) ?></h3>
              <?php if (!empty($article['chapo'])): ?>
                <p class="article-desc"><?= htmlspecialchars($article['chapo']) ?></p>
              <?php endif; ?>
              <p class="article-date">
                Publié le <?= date('d/m/Y à H:i', strtotime($article['created_at'])) ?>
              </p>
              <p class="article-author">
                <?= isset($article['auteur_id']) ? 'Auteur #' . $article['auteur_id'] : 'Auteur inconnu' ?>
              </p>
            </section>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
    <aside class="profil-banniere">
      <div class="flip-card" id="flip-card">
        <div class="flip-card-inner">
          <!-- Face avant -->
          <div class="flip-card-front">
            <img src="images/PID - Photo .jpg" alt="Mon profil" class="profil-img bounce-pulse">
            <section class="profil-infos">
              <h3>[Ton Prénom Nom]</h3>
              <p>Développeur web passionné, créatif et motivé.<br>
                <span class="profil-cta">Voir mon portfolio →</span>
              </p>
            </section>
          </div>
          <!-- Face arrière -->
          <div class="flip-card-back">
            <div class="profil-img-back-wrapper">
              <img src="images/PID - Remake.png" alt="Rétrospective" class="profil-img-back">
              <div class="img-gradient-bottom"></div>
            </div>
            <div class="profil-back-content">
              <h3>Rétrospective</h3>
              <ul>
                <li>2023–2025 : BUT Informatique</li>
                <li>2022 : Stage front-end</li>
                <li>2021 : Bac Général NSI/Maths</li>
              </ul>
              <p>Découvre mon parcours, mes projets et mes ambitions !</p>
              <button class="retro-btn" onclick="window.location.href='retrospective.php'">Voir la rétrospective</button>
            </div>
          </div>
        </div>
      </div>
    </aside>
  </main>
  <script>
  document.getElementById('flip-card').addEventListener('click', function() {
    this.classList.toggle('flipped');
  });
</script>
  <footer>
    <p>© 2025 - Un jour, un code – Tous droits réservés.</p>
  </footer>
</body>
</html>
