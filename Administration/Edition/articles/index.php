<?php
require_once __DIR__.'/../../Authentification.php';
require_once __DIR__.'/../../../Data-Base/db.php';

$stmt = $pdo->query("SELECT a.id, a.titre, a.slug, a.statut, a.date_publication, a.created_at,
                            au.prenom, au.nom
                     FROM article a
                     LEFT JOIN auteur au ON au.id = a.auteur_id
                     ORDER BY a.created_at DESC");
$articles = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration — Articles</title>
  <link rel="stylesheet" href="/SAE203/code/administration/articles/css/index.css">
  <script src="https://unpkg.com/@tailwindcss/browser@4?plugins=forms"></script>
</head>
<body class="bg-gray-100">
  <nav class="bg-gradient-to-r from-gray-800 to-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center gap-6">
      <a href="/SAE203/code/administration/articles" class="font-bold">Administration SAE203</a>
      <a href="/SAE203/code/administration/articles" class="bg-white text-gray-900 rounded-md px-3 py-1">Articles</a>
      <a href="/SAE203/code/administration/pages" class="hover:text-sky-200">Pages</a>
      <a href="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/accueil.php#parcours" class="ml-auto hover:text-sky-200">Accéder au site</a>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-4 px-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-gray-900">Articles</h1>
      <a href="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Administration/Edition/articles/creation.php"
         class="rounded-md py-2 px-4 text-white shadow-sm bg-slate-700 hover:bg-slate-900">Nouvel article</a>
    </div>
  </header>

  <main class="max-w-7xl mx-auto p-6">
    <div class="overflow-x-auto bg-white rounded-lg shadow">
      <table class="w-full">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left">Titre</th>
            <th class="p-3 text-left">Slug</th>
            <th class="p-3 text-left">Auteur</th>
            <th class="p-3 text-left">Statut</th>
            <th class="p-3 text-left">Publié le</th>
            <th class="p-3 text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $a): ?>
          <tr class="border-b last:border-0">
            <td class="p-3"><?= htmlspecialchars($a['titre']) ?></td>
            <td class="p-3 text-gray-600"><?= htmlspecialchars($a['slug']) ?></td>
            <td class="p-3"><?= htmlspecialchars(trim(($a['prenom']??'').' '.($a['nom']??''))) ?></td>
            <td class="p-3">
              <?php if ($a['statut']==='publie'): ?>
                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">publié</span>
              <?php elseif ($a['statut']==='brouillon'): ?>
                <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">brouillon</span>
              <?php else: ?>
                <span class="px-2 py-1 text-xs rounded bg-gray-200 text-gray-700">archivé</span>
              <?php endif; ?>
            </td>
            <td class="p-3"><?= $a['date_publication'] ? htmlspecialchars($a['date_publication']) : '—' ?></td>
            <td class="p-3 text-right">
              <a class="icon-compose" title="Éditer" href="/1%20JOUR%201%20CODE/JOUR1/Archivage/-/Page-2-presentation/Administration/Edition/articles/edition.php?id=<?= (int)$a['id'] ?>">
                ✏️
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
