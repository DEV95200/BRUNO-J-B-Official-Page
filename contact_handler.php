<?php
// Configuration email - À PERSONNALISER avec vos informations
$destinataire = "gaetan.bruno.jean.baptiste@gmail.com"; // VOTRE EMAIL ICI
$nom_site = "Portfolio Gaëtan Bruno Jean-Baptiste";

// Headers de sécurité
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Vérifier que c'est bien une requête POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Récupérer et nettoyer les données du formulaire
$nom = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validation des données
$erreurs = [];

if (empty($nom)) {
    $erreurs[] = "Le nom est obligatoire";
}

if (empty($email)) {
    $erreurs[] = "L'email est obligatoire";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "Format d'email invalide";
}

if (empty($message)) {
    $erreurs[] = "Le message est obligatoire";
} elseif (strlen($message) < 10) {
    $erreurs[] = "Le message doit contenir au moins 10 caractères";
}

// Si il y a des erreurs, les retourner
if (!empty($erreurs)) {
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Erreurs de validation',
        'errors' => $erreurs
    ]);
    exit;
}

// Protection anti-spam basique
if (preg_match('/\b(?:viagra|casino|lottery|winner)\b/i', $message)) {
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Message détecté comme spam'
    ]);
    exit;
}

// Préparer l'email avec la fonction mail() native
$sujet = "📧 Nouveau message de contact - " . $nom_site;

// Corps de l'email en HTML
$corps_html = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #1e3a8a, #2563eb); color: white; padding: 30px; text-align: center; }
        .header h2 { margin: 0; font-size: 24px; }
        .header p { margin: 10px 0 0 0; opacity: 0.9; }
        .content { padding: 30px; }
        .info-box { background: #f8fafc; padding: 15px; border-radius: 8px; margin: 15px 0; border-left: 4px solid #2563eb; }
        .label { font-weight: bold; color: #1e3a8a; display: inline-block; min-width: 80px; }
        .value { color: #374151; }
        .message-box { background: #ffffff; padding: 20px; border: 2px solid #e5e7eb; border-radius: 8px; margin: 20px 0; }
        .footer { text-align: center; padding: 20px; background: #f9fafb; color: #6b7280; font-size: 14px; }
        .btn { display: inline-block; padding: 12px 24px; background: #2563eb; color: white; text-decoration: none; border-radius: 6px; margin: 10px 5px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>🚀 Nouveau message de contact</h2>
            <p>Vous avez reçu un nouveau message via votre portfolio</p>
        </div>
        
        <div class='content'>
            <div class='info-box'>
                <p><span class='label'>👤 Nom :</span> <span class='value'>" . htmlspecialchars($nom) . "</span></p>
            </div>
            
            <div class='info-box'>
                <p><span class='label'>📧 Email :</span> <span class='value'>" . htmlspecialchars($email) . "</span></p>
            </div>
            
            <div class='info-box'>
                <p><span class='label'>📅 Date :</span> <span class='value'>" . date('d/m/Y à H:i:s') . "</span></p>
            </div>
            
            <div class='message-box'>
                <p class='label'>💬 Message :</p>
                <p style='margin-top: 10px; line-height: 1.6;'>" . nl2br(htmlspecialchars($message)) . "</p>
            </div>
            
            <div style='text-align: center; margin: 25px 0;'>
                <a href='mailto:" . htmlspecialchars($email) . "?subject=Re: Contact depuis mon portfolio' class='btn'>
                    📧 Répondre directement
                </a>
                <a href='tel:" . htmlspecialchars($email) . "' class='btn' style='background: #059669;'>
                    📱 Contacter
                </a>
            </div>
        </div>
        
        <div class='footer'>
            <p><strong>Portfolio - " . $nom_site . "</strong></p>
            <p>Message automatique • Ne pas répondre à cet email</p>
        </div>
    </div>
</body>
</html>
";

// Headers pour l'email (fonction mail() native)
$headers = array(
    "MIME-Version: 1.0",
    "Content-Type: text/html; charset=UTF-8",
    "From: " . $nom . " <noreply@portfolio-gaetan.local>",
    "Reply-To: " . $email,
    "Return-Path: " . $email,
    "X-Mailer: PHP/" . phpversion(),
    "X-Priority: 3",
    "Date: " . date('r'),
    "Message-ID: <" . time() . "." . uniqid() . "@portfolio-gaetan.local>"
);

// Tentative d'envoi avec la fonction mail() native de PHP
try {
    // Utiliser la fonction mail() de PHP (plus simple, pas besoin de Composer)
    $envoi_reussi = mail(
        $destinataire,
        $sujet,
        $corps_html,
        implode("\r\n", $headers)
    );
    
    if ($envoi_reussi) {
        // Succès !
        echo json_encode([
            'success' => true,
            'message' => 'Votre message a été envoyé avec succès ! 🎉 Je vous répondrai dans les plus brefs délais.'
        ]);
        
        // Log du succès (optionnel - pour debug)
        error_log("✅ Contact form SUCCESS: Message from $nom ($email) sent successfully");
        
    } else {
        // Échec d'envoi
        throw new Exception("La fonction mail() a échoué");
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => '⚠️ Erreur technique lors de l\'envoi. Veuillez réessayer dans quelques minutes ou me contacter directement par email.'
    ]);
    
    // Log de l'erreur pour le debug
    error_log("❌ Contact form ERROR: " . $e->getMessage());
}
?>