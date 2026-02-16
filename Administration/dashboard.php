<?php
session_start();
require_once 'Authentification.php'; // vérifie si connecté
// 🔹 Récupération des infos utilisateur
$username = $_SESSION['user']['username'] ?? 'Utilisateur';
$pseudo = $_SESSION['user']['pseudo'] ;
$role = $_SESSION['user']['role'] ?? 'inconnu';

// 🔹 Texte d’accueil
$nom_affiche = $pseudo ?: $username; // Si pseudo existe, on l’affiche, sinon username
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Administration</title>
  <link rel="stylesheet" href="../Css/dashboard.css">
</head>
<body>
  <div class="dashboard-container">
    <div class="dashboard-header">
      <img src="../images/PID - Photo .jpg" alt="Avatar admin">
      <h1>Panneau administration</h1>
    </div>
    <div class="dashboard-welcome">
      Bienvenue <strong><?= htmlspecialchars($_SESSION['user']['pseudo'] ?? '') ?></strong> (<?= htmlspecialchars($_SESSION['user']['role']) ?>)
    </div>
    <div class="dashboard-actions">
      <a href="Edition/articles/index.php">📝 Gérer les articles</a>
      <a href="users.php">👤 Gérer les utilisateurs</a>
      <a href="Edition/content.php">📄 Ajouter du contenu</a>
      <a href="logout.php" class="logout-btn">🚪 Déconnexion</a>
    </div>
    <div class="dashboard-panel">
      <h2>📰 Dernières actions</h2>
      <div class="dashboard-list">
        <div class="dashboard-card">
          <div class="card-title">Créer un nouvel article</div>
          <div class="card-desc">Publiez un nouvel article pour le site.</div>
          <div class="card-action"><a href="Edition/articles/creation.php">Créer</a></div>
        </div>
        <div class="dashboard-card">
          <div class="card-title">Modérer un utilisateur</div>
          <div class="card-desc">Gérez les droits et rôles des membres.</div>
          <div class="card-action"><a href="users.php">Modérer</a></div>
        </div>
        <div class="dashboard-card">
          <div class="card-title">Voir les messages</div>
          <div class="card-desc">Consultez les retours, bugs et demandes.</div>
          <div class="card-action"><a href="messages.php">Voir</a></div>
        </div>
        <div class="dashboard-card">
          <div class="card-title">Éditer une page</div>
          <div class="card-desc">Modifiez le contenu des pages existantes.</div>
          <div class="card-action"><a href="Edition/articles/edition.php">Éditer</a></div>
        </div>
      </div>
    </div>
    <a href="logout.php" class="logout-btn">🚪 Déconnexion</a>
  </div>
</body>
</html>
