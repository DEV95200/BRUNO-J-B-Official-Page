<?php
require_once __DIR__.'/../../Authentification.php';
require_once __DIR__.'/../../../Data-Base/db.php';
require_once __DIR__.'/includes/slug.php';

$errors = [];
$ok = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titre   = trim($_POST['titre'] ?? '');
  $chapo   = trim($_POST['chapo'] ?? '');
  $contenu = trim($_POST['contenu'] ?? '');
  $image   = trim($_POST['image'] ?? '');
  $lien_yt = trim($_POST['lien_yt'] ?? '');
  $statut  = $_POST['statut'] ?? 'brouillon';
  $auteur_id = !empty($_POST['auteur_id']) ? (int)$_POST['auteur_id'] : null;

  if ($titre === '') $errors[] = "Le titre est obligatoire.";
  if ($chapo === '') $errors[] = "Le chapô est obligatoire.";
  if ($contenu === '') $errors[] = "Le contenu est obligatoire.";

  $slug = slugify($titre);

  if (!$errors) {
    // date_publication si publié
    $date_publication = ($statut === 'publie') ? date('Y-m-d H:i:s') : null;

    $sql = "INSERT INTO article (auteur_id, titre, slug, chapo, contenu, image, lien_yt, statut, date_publication)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $ok = $stmt->execute([
      $auteur_id ?: null,
      $titre, $slug, $chapo, $contenu, $image ?: null, $lien_yt ?: null,
      $statut, $date_publication
    ]);
    
  }
}

// auteurs pour liste déroulante
$authors = $pdo->query("SELECT id, prenom, nom FROM auteur ORDER BY nom, prenom")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nouvel article</title>
  <link rel="stylesheet" href="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Administration/Edition/articles/Css/fond-etoile.css">
  <link rel="stylesheet" href="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Css/accueil-cards.css">
  <script src="https://unpkg.com/@tailwindcss/browser@4?plugins=forms"></script>
</head>
<body class="relative">
  <script src="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Administration/Edition/articles/Script/fond-etoile.js"></script>
  <main class="flex items-center justify-center min-h-screen">
    <div class="bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900/90 rounded-2xl shadow-2xl px-8 py-10 w-full max-w-2xl border border-blue-700/40 backdrop-blur-md">
      <h1 class="text-3xl font-bold text-cyan-400 mb-8 text-center drop-shadow">Créer un article</h1>
      <?php if ($errors): ?>
        <div class="bg-red-900/80 border border-red-400 text-red-100 p-3 rounded mb-6 text-center">
          <?= implode('<br>', array_map('htmlspecialchars', $errors)) ?>
        </div>
      <?php endif; ?>
      <form method="post" class="space-y-6">
        <div>
          <label class="block font-semibold text-cyan-300 mb-1">Titre *</label>
          <input type="text" name="titre" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        </div>
        <div>
          <label class="block font-semibold text-cyan-300 mb-1">Auteur</label>
          <select name="auteur_id" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <option value="">— Aucun —</option>
            <?php foreach ($authors as $au): ?>
              <option value="<?= (int)$au['id'] ?>">
                <?= htmlspecialchars(trim($au['prenom'].' '.$au['nom'])) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label class="block font-semibold text-cyan-300 mb-1">Chapô *</label>
          <textarea name="chapo" rows="3" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required></textarea>
        </div>
        <div>
          <label class="block font-semibold text-cyan-300 mb-1">Contenu *</label>
          <textarea name="contenu" class="tinymce w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required></textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block font-semibold text-cyan-300 mb-1">Image (URL)</label>
            <input type="url" name="image" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
          </div>
          <div>
            <label class="block font-semibold text-cyan-300 mb-1">Lien YouTube (URL)</label>
            <input type="url" name="lien_yt" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
          </div>
        </div>
        <div>
          <label class="block font-semibold text-cyan-300 mb-1">Statut</label>
          <select name="statut" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <option value="brouillon">Brouillon</option>
            <option value="publie">Publié</option>
            <option value="archive">Archivé</option>
          </select>
        </div>
        <div class="flex gap-4 justify-center mt-6">
          <button class="px-6 py-2 bg-cyan-500 text-white font-bold rounded-lg shadow hover:bg-cyan-600 transition">Enregistrer</button>
          <a class="px-6 py-2 bg-slate-700 text-cyan-200 font-bold rounded-lg shadow hover:bg-slate-800 transition" href="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Administration/Edition/articles/index.php">Annuler</a>
        </div>
      </form>
    </div>
  </main>

</body>
</html>
