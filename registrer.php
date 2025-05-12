<?php

if(isset($_POST["registrer"])){
    extract($_POST);
    $password = shal($password);

    try {
        $req = $connection->query("INSERT INTO users (name, telephone, email, password) VALUES ('$name', '$telephone', '$email',
        '$password')");
        $connection->exc($req);
    } catch (PDDEXCEPTION $e) {
        echo "une erreur est survenue. Réesssayez ultérieurement";
    }
    echo "Inscription réussie";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input name="name" type="text" placeholder="prenom et Nom">
        <br></br>
        <input name="telephone" type="tel" placeholder="Numero de téléphone">
        <br></br>
        <input name="e-mail" type="e-mail" placeholder="Adresse e-mail" >
        <br></br>
        <input name="password" type="password" placeholder="Mot de passe">
        <br></br>
        <input name="registrer" type="value" placeholder="inscription">
</from>
</body>