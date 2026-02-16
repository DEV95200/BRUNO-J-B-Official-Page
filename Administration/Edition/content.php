<?php
require_once '../Authentification.php';
require_once '../../Data-Base/db.php';

// Récupère les modèles de layout (exemple, à remplacer par ta logique)
$layouts = $pdo->query("SELECT id, name, preview_img FROM layouts")->fetchAll();

// Récupère les articles existants pour appliquer un layout
$articles = $pdo->query("SELECT id, titre FROM article ORDER BY created_at DESC")->fetchAll();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $type = $_POST['type'] ?? '';
  $media_url = $_POST['media_url'] ?? '';
  $texte = $_POST['texte'] ?? '';
  $layout_id = $_POST['layout_id'] ?? '';
  $article_id = $_POST['article_id'] ?? '';

  // Ici, tu peux enregistrer le contenu/media/layout dans la base selon ta logique
  // Exemple : update l'article avec le layout choisi
  if ($article_id && $layout_id) {
    $stmt = $pdo->prepare("UPDATE article SET layout_id = ? WHERE id = ?");
    $stmt->execute([$layout_id, $article_id]);
    $ok = true;
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter du contenu</title>
  <link rel="stylesheet" href="../../Css/dashboard.css">
  <link rel="stylesheet" href="../../Css/accueil-cards.css">
  <link rel="stylesheet" href="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Administration/Edition/articles/Css/fond-etoile.css">
  <script src="https://unpkg.com/@tailwindcss/browser@4?plugins=forms"></script>

  <style>
    .layout-preview { border: 2px solid #0ea5e9; border-radius: 12px; background: #0f172a; padding: 1rem; margin-bottom: 1rem; }
    .content-type-btn { background: #0ea5e9; color: #fff; border-radius: 8px; padding: 0.5rem 1.5rem; margin: 0.5rem; font-weight: bold; border: none; cursor: pointer; }
    .content-type-btn.active { background: #0369a1; }
    .layout-panel { background: #1e293b; border-radius: 12px; padding: 1rem; box-shadow: 0 2px 12px #0ea5e944; }
  </style>
</head>
<body>
     <script src="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Administration/Edition/articles/Script/fond-etoile.js"></script>
  <main class="flex flex-col items-center justify-center min-h-screen">
    <div class="bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900/90 rounded-2xl shadow-2xl px-8 py-10 w-full max-w-3xl border border-blue-700/40 backdrop-blur-md">
      <h1 class="text-3xl font-bold text-cyan-400 mb-8 text-center drop-shadow">Ajouter du contenu</h1>
      <?php if (!empty($ok)): ?>
        <div class="bg-green-900/80 border border-green-400 text-green-100 p-3 rounded mb-6 text-center">
          Le layout a bien été appliqué à l'article sélectionné.
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Choix du type de contenu -->
          <div class="flex-1">
            <h2 class="text-xl font-semibold text-cyan-300 mb-4">Type de contenu</h2>
            <div>
              <button type="button" class="content-type-btn" id="btn-video">Vidéo</button>
              <button type="button" class="content-type-btn" id="btn-image">Image</button>
              <button type="button" class="content-type-btn" id="btn-gif">GIF</button>
              <button type="button" class="content-type-btn" id="btn-texte">Texte</button>
            </div>
            <div id="content-inputs" class="mt-6">
              <!-- Champs dynamiques JS -->
            </div>
          </div>
          <!-- Panel de choix de layout -->
          <div class="flex-1 layout-panel">
            <h2 class="text-xl font-semibold text-cyan-300 mb-4">Choisir un modèle de page</h2>
            <div id="layout-list">
              <?php foreach ($layouts as $layout): ?>
                <label class="block mb-4">
                  <input type="radio" name="layout_id" value="<?= $layout['id'] ?>" required>
                  <span class="layout-preview">
                    <img src="<?= htmlspecialchars($layout['preview_img']) ?>" alt="<?= htmlspecialchars($layout['name']) ?>" style="max-width:100%;border-radius:8px;">
                    <div class="mt-2 text-cyan-200"><?= htmlspecialchars($layout['name']) ?></div>
                  </span>
                </label>
              <?php endforeach; ?>
            </div>
            <h2 class="text-xl font-semibold text-cyan-300 mb-4 mt-6">Article à modifier</h2>
            <select name="article_id" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg mb-4" required>
              <option value="">— Sélectionner un article —</option>
              <?php foreach ($articles as $art): ?>
                <option value="<?= $art['id'] ?>"><?= htmlspecialchars($art['titre']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="flex justify-center mt-8">
          <button type="submit" class="px-6 py-2 bg-cyan-500 text-white font-bold rounded-lg shadow hover:bg-cyan-600 transition">Appliquer au contenu</button>
        </div>
        <input type="hidden" name="type" id="type" value="">
        <input type="hidden" name="media_url" id="media_url" value="">
        <input type="hidden" name="texte" id="texte" value="">
      </form>
    </div>
  </main>
  <script>
    // JS pour afficher dynamiquement les champs selon le type de contenu choisi
    const btns = document.querySelectorAll('.content-type-btn');
    const inputs = document.getElementById('content-inputs');
    const typeInput = document.getElementById('type');
    const mediaUrlInput = document.getElementById('media_url');
    const texteInput = document.getElementById('texte');

    btns.forEach(btn => {
      btn.addEventListener('click', () => {
        btns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        typeInput.value = btn.id.replace('btn-', '');
        if (btn.id === 'btn-video') {
          inputs.innerHTML = '<label class="block text-cyan-200 mb-2">URL de la vidéo</label><input type="url" id="input-media" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg">';
        } else if (btn.id === 'btn-image') {
          inputs.innerHTML = '<label class="block text-cyan-200 mb-2">URL de l’image</label><input type="url" id="input-media" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg">';
        } else if (btn.id === 'btn-gif') {
          inputs.innerHTML = '<label class="block text-cyan-200 mb-2">URL du GIF</label><input type="url" id="input-media" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg">';
        } else {
          inputs.innerHTML = '<label class="block text-cyan-200 mb-2">Texte</label><textarea id="input-texte" rows="4" class="w-full px-4 py-2 bg-slate-900/80 text-cyan-100 border border-cyan-700 rounded-lg"></textarea>';
        }
        // Met à jour le champ caché à la soumission
        setTimeout(() => {
          const inputMedia = document.getElementById('input-media');
          const inputTexte = document.getElementById('input-texte');
          if (inputMedia) {
            inputMedia.addEventListener('input', () => {
              mediaUrlInput.value = inputMedia.value;
            });
          }
          if (inputTexte) {
            inputTexte.addEventListener('input', () => {
              texteInput.value = inputTexte.value;
            });
          }
        }, 100);
      });
    });
  </script>
</body>
</html>