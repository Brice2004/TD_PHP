<?php
$dsn = "mysql:host=localhost;dbname=gestionstock;charset=utf8";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Connexion réussie à la base de données gestionstock.";
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}

$test = "Hello World";