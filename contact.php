<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $messageBody = "Nom : " . $nom . "\n" . "Email : " . $email . "\n" . "Message : " . $message;

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Pas de debug pour éviter trop de sortie
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gaetan.bruno.jean.baptiste@gmail.com';
    $mail->Password   = 'Gtn3BJB#95200';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('gaetan.bruno.jean.baptiste@gmail.com', 'Portfolio Contact');
    $mail->addAddress('gaetan.bruno.jean.baptiste@gmail.com');

    //Content
    $mail->isHTML(false);
    $mail->Subject = 'Contact Portfolio - ' . $nom;
    $mail->Body    = $message;

    $mail->send();
    echo 'Message envoyé avec succès !';
} catch (Exception $e) {
    echo "Erreur envoi: {$mail->ErrorInfo}";
}
}