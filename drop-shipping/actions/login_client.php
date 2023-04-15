<?php
session_abort();
session_start();
ob_start();

$username = filter_input(INPUT_POST, "username");
$password = htmlspecialchars(filter_input(INPUT_POST, "password"));
$salt = filter_input(INPUT_POST, "salt");

include "../config.php";

$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD,config::UTILISATEUR,config::MOTDEPASSE);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer les informations de l'utilisateur à partir de la base de données
$statement = $pdo->prepare("SELECT * FROM clients WHERE username = :username");
$statement->bindParam(":username", $username);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password . $user['salt'], $user['password'])) {
    // Le mot de passe est correct, l'utilisateur est authentifié
    $_SESSION['user'] = $user; // Stocker les informations de l'utilisateur dans la session
    header("Location: ../index.php");
    exit();
} else {
    // Le mot de passe est incorrect, l'utilisateur n'est pas authentifié
    $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect";
    echo $_SESSION['error'];
}
