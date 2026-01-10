<?php
require_once(__DIR__ . '/Data-Base/db.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT a.*, l.html_code FROM article a LEFT JOIN layouts l ON a.layout_id = l.id WHERE a.id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();

if ($article && !empty($article['html_code'])) {
  // Affiche le layout personnalisé
  echo $article['html_code'];
} else {
  // Affiche le layout par défaut
  ?>
  <!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['titre']) ?></title>
    <link rel="stylesheet" href="Css/accueil.css">
    <link rel="stylesheet" href="Css/accueil-cards.css">
  </head>
  <body>
    <header>
      <h1>1 JOUR, 1 CODE</h1>
      <nav>
        <a href="accueil.php">Accueil</a>
        <!-- autres liens -->
      </nav>
    </header>
    <main class="main-grid">
      <article class="article-card" style="max-width:700px;margin:auto;">
        <h2 class="article-title"><?= htmlspecialchars($article['titre']) ?></h2>
        <p class="article-date">
          Publié le <?= date('d/m/Y à H:i', strtotime($article['created_at'])) ?>
        </p>
        <?php if (!empty($article['image'])): ?>
          <img src="<?= htmlspecialchars($article['image']) ?>" alt="Image de l'article" style="max-width:100%;border-radius:12px;margin-bottom:1rem;">
        <?php endif; ?>
        <p class="article-desc"><?= nl2br(htmlspecialchars($article['chapo'])) ?></p>
        <div class="article-content" style="margin-top:2rem;">
          <?= $article['contenu'] ?>
        </div>
      </article>
    </main>
    <footer>
      <p>© 2025 - Un jour, un code – Tous droits réservés.</p>
    </footer>
  </body>
  </html>
  <?php
}