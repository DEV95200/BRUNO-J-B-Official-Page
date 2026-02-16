<?php
session_start();
require_once(__DIR__ . '/../Data-Base/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
      'id' => $user['id'],
      'username' => $user['username'],
      'role' => $user['role'],
      'pseudo' => $user['pseudo'] ?? $user['username'] // fallback si pseudo absent
    ];
    header('Location: dashboard.php');
    exit;
  } else {
    $error = "Identifiants invalides.";
  }
}
?>
<!-- HTML simple -->
<form method="POST">
  <input type="text" name="username" placeholder="Nom d'utilisateur" required>
  <input type="password" name="password" placeholder="Mot de passe" required>
   <input type="text" name="pseudo" placeholder="Pseudo (optionnel)"> 
  <input type="submit" value="Connexion">
  <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
