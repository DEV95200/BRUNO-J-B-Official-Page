<?php
/**
 * CONFIGURATION XAMPP POUR L'ENVOI D'EMAILS
 * 
 * Ce fichier vous guide pour configurer l'envoi d'emails avec XAMPP
 * Suivez les étapes ci-dessous pour que le formulaire fonctionne
 */

echo "<h2>🔧 Configuration Email XAMPP</h2>";
echo "<p>Pour que votre formulaire fonctionne, suivez ces étapes :</p>";

echo "<h3>📧 Option 1 : Configuration Gmail SMTP (Recommandée)</h3>";
echo "<ol>";
echo "<li><strong>Téléchargez PHPMailer</strong> : <a href='https://github.com/PHPMailer/PHPMailer' target='_blank'>GitHub PHPMailer</a></li>";
echo "<li><strong>Activez l'authentification à 2 facteurs</strong> sur votre compte Gmail</li>";
echo "<li><strong>Créez un mot de passe d'application</strong> Gmail dédié</li>";
echo "<li><strong>Utilisez ce code</strong> dans un nouveau fichier <code>send_email.php</code> :</li>";
echo "</ol>";

echo "<textarea style='width:100%; height:300px; font-family: monospace;'>";
echo "<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

\$mail = new PHPMailer(true);

try {
    // Configuration SMTP Gmail
    \$mail->isSMTP();
    \$mail->Host       = 'smtp.gmail.com';
    \$mail->SMTPAuth   = true;
    \$mail->Username   = 'gaetan.bruno.jean.baptiste@gmail.com'; // VOTRE EMAIL
    \$mail->Password   = 'votre_mot_de_passe_application';        // MOT DE PASSE APP
    \$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    \$mail->Port       = 587;

    // Destinataire et expéditeur
    \$mail->setFrom(\$_POST['email'], \$_POST['name']);
    \$mail->addAddress('gaetan.bruno.jean.baptiste@gmail.com', 'Gaëtan');

    // Contenu
    \$mail->isHTML(true);
    \$mail->Subject = 'Nouveau message de contact - Portfolio';
    \$mail->Body    = 'Message de : ' . \$_POST['name'] . '<br>Email : ' . \$_POST['email'] . '<br><br>Message :<br>' . nl2br(\$_POST['message']);

    \$mail->send();
    echo json_encode(['success' => true, 'message' => 'Message envoyé avec succès !']);
} catch (Exception \$e) {
    echo json_encode(['success' => false, 'message' => 'Erreur : ' . \$mail->ErrorInfo]);
}
?>";
echo "</textarea>";

echo "<h3>📧 Option 2 : Configuration XAMPP Sendmail</h3>";
echo "<ol>";
echo "<li><strong>Ouvrez</strong> <code>C:\\xampp\\php\\php.ini</code></li>";
echo "<li><strong>Recherchez et modifiez</strong> ces lignes :</li>";
echo "</ol>";

echo "<textarea style='width:100%; height:150px; font-family: monospace;'>";
echo "[mail function]
SMTP = smtp.gmail.com
smtp_port = 587
sendmail_from = gaetan.bruno.jean.baptiste@gmail.com
sendmail_path = \"C:\\xampp\\sendmail\\sendmail.exe -t\"";
echo "</textarea>";

echo "<li><strong>Ouvrez</strong> <code>C:\\xampp\\sendmail\\sendmail.ini</code></li>";
echo "<li><strong>Modifiez ces lignes</strong> :</li>";

echo "<textarea style='width:100%; height:120px; font-family: monospace;'>";
echo "smtp_server=smtp.gmail.com
smtp_port=587
auth_username=gaetan.bruno.jean.baptiste@gmail.com
auth_password=votre_mot_de_passe_application
force_sender=gaetan.bruno.jean.baptiste@gmail.com";
echo "</textarea>";

echo "<h3>🚀 Test de Configuration</h3>";
echo "<p><strong>Testez votre configuration</strong> en cliquant ci-dessous :</p>";

if (isset($_POST['test_email'])) {
    $to = "gaetan.bruno.jean.baptiste@gmail.com";
    $subject = "Test Email XAMPP - " . date('Y-m-d H:i:s');
    $message = "Ceci est un email de test depuis XAMPP.\n\nSi vous recevez ce message, la configuration fonctionne !";
    $headers = "From: gaetan.bruno.jean.baptiste@gmail.com";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "<div style='color: green; padding: 10px; background: #e8f5e8; border-radius: 5px;'>✅ <strong>Email de test envoyé avec succès !</strong> Vérifiez votre boîte email.</div>";
    } else {
        echo "<div style='color: red; padding: 10px; background: #ffe8e8; border-radius: 5px;'>❌ <strong>Erreur d'envoi.</strong> Vérifiez votre configuration.</div>";
    }
}

echo "<form method='POST'>";
echo "<button type='submit' name='test_email' style='background: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>📧 Tester l'envoi d'email</button>";
echo "</form>";

echo "<h3>📱 Utilisation du Formulaire</h3>";
echo "<p>Une fois configuré :</p>";
echo "<ul>";
echo "<li>✅ Les visiteurs pourront remplir le formulaire</li>";
echo "<li>✅ Vous recevrez les messages dans votre Gmail</li>";
echo "<li>✅ Validation automatique des champs</li>";
echo "<li>✅ Messages de succès/erreur en temps réel</li>";
echo "<li>✅ Design responsive et moderne</li>";
echo "</ul>";

echo "<div style='background: #fff3cd; border: 1px solid #ffecb5; padding: 15px; border-radius: 5px; margin-top: 20px;'>";
echo "<strong>💡 Conseil :</strong> Pour la production, utilisez un service professionnel comme SendGrid, Mailgun ou Amazon SES pour une meilleure délivrabilité.";
echo "</div>";
?>