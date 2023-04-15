<?php

$username=filter_input(INPUT_POST,"username");
$password=htmlspecialchars(filter_input(INPUT_POST,"password"));
$email=filter_input(INPUT_POST,"email");

include '../config.php';

$salt = bin2hex(random_bytes(16));
$hashed_password = password_hash($password . $salt, PASSWORD_DEFAULT);

$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD,config::UTILISATEUR,config::MOTDEPASSE);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$add = $pdo->prepare("insert into clients(username,password,salt,email) values (:username,:hashed_password,:salt,:email)");

$add->bindParam(":username", $username);
$add->bindParam(":email", $email);
$add->bindParam(":hashed_password", $hashed_password);
$add->bindParam(":salt", $salt);

$check = $pdo->prepare("SELECT * FROM clients WHERE username = :username");
$check->bindParam(":username", $username);
$check->execute();
$row = $check->fetch();

if ($row) {
    header("Location:../user-register.php");
} else {
    $add->execute();
    header("location:../user-login.php");
}

?>