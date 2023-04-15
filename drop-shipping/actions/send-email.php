<?php

$first_name = htmlspecialchars(filter_input(INPUT_POST, "first_name")); 
$last_name = htmlspecialchars(filter_input(INPUT_POST, "last_name"));
$email = htmlspecialchars(filter_input(INPUT_POST, "email"));
$message = htmlspecialchars(filter_input(INPUT_POST, "message"));
$message = wordwrap($message, 70, "\r\n");

// Adresse e-mail du destinataire
$to = "terry.barillon@terry-barillon.fr";

// Sujet du message
$subject = "mail du site web";

// Corps du message
$body = "Nom : ".$last_name."\r\n".
        "Prenom : ".$first_name."\r\n".
        "Email : ".$email."\r\n".
        "Message : \r\n".$message;

// Envoi du message
if (mail($to, $subject, $body)) {
    echo "Votre message a été envoyé avec succès.";
    header('location: ../index.php');
} else {
    echo "Une erreur est survenue lors de l'envoi de votre message.";
    header('location: ../index.php');
}

?>