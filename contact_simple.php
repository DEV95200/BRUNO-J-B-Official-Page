<?php
// Formulaire de contact simple avec redirection (sans AJAX)

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

// Récupération et nettoyage des données
$nom = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation simple
if (empty($nom) || empty($email) || empty($message)) {
    header('Location: index.html?error=missing');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.html?error=email');
    exit;
}

if (strlen($message) < 10) {
    header('Location: index.html?error=message');
    exit;
}

// Préparation de l'email
$destinataire = "gaetan.bruno.jean.baptiste@gmail.com";
$sujet = "📧 Nouveau message de contact - " . $nom;

$corps_html = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 10px; padding: 20px; }
        .header { background: #2563eb; color: white; padding: 20px; text-align: center; border-radius: 8px; }
        .info { background: #f8fafc; padding: 15px; margin: 10px 0; border-radius: 6px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>📧 Nouveau message de contact</h2>
            <p>Message depuis votre portfolio</p>
        </div>
        
        <div class='info'>
            <strong>👤 Nom :</strong> " . htmlspecialchars($nom) . "
        </div>
        
        <div class='info'>
            <strong>📧 Email :</strong> " . htmlspecialchars($email) . "
        </div>
        
        <div class='info'>
            <strong>💬 Message :</strong><br>
            " . nl2br(htmlspecialchars($message)) . "
        </div>
        
        <div class='info'>
            <strong>📅 Date :</strong> " . date('d/m/Y à H:i:s') . "
        </div>
    </div>
</body>
</html>
";

// Headers
$headers = array(
    "MIME-Version: 1.0",
    "Content-Type: text/html; charset=UTF-8",
    "From: Portfolio Gaetan <gaetan.bruno.jean.baptiste@gmail.com>",
    "Reply-To: " . $email
);

// Envoi
if (mail($destinataire, $sujet, $corps_html, implode("\r\n", $headers))) {
    header('Location: index.html?success=1');
} else {
    header('Location: index.html?error=send');
}
exit;
?>