<?php
require_once __DIR__ . '/../Authentification.php';
require_once __DIR__ . '/../../Data-Base/db.php';

$pages = $pdo->query("SELECT * FROM pages")->fetchAll();
?>

<h2>Pages</h2>
<a href="e2p_edition.php">Gérer les pages</a>
<ul>
  <?php foreach ($pages as $page): ?>
    <li>
      <?= $page['title'] ?> – <a href="content_edit.php?id=<?= $page['id'] ?>">Modifier</a>
    </li>
  <?php endforeach; ?>
</ul>
