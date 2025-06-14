<?php

include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sexe = $_POST['sexe'];


    if (empty($nom) || empty($prenom) || empty($password) || empty($confirm_password) || empty($email) || empty($phone) || empty($sexe)) {
        echo "<div class='alert alert-danger'>All fields are required.</div>";
        exit;
    }

    if( strlen($password) <= 12) {
        echo "<div class='alert alert-danger'>Password must be at least 12 characters long.</div>";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "<div class='alert alert-danger'>Passwords do not match.</div>";
        exit;
    }

    if ($sexe == 'homme') {
      $sexe = 1;
    } else {
      $sexe = 0;
    }

    // Check if the email already exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE mail = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        echo "<div class='alert alert-danger'>Email already exists.</div>";
        exit;
    }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, mail, phone, mdp, sexe, access) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nom,$prenom, $email,  $phone, $hashed_password, $sexe, 0])) {
            header("Location: index.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Registration failed. Please try again.</div>";
        }

        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<?php
include('navbar.php');
?>

<body class="bg-secondary">
    <form  class="mt-3 p-3 rounded bg-white container" action="" method="post">
        <h1 class="text-center">Register   </h1>

        <input class="form-control" type="text" name="nom" placeholder="Username" required>
        <input class="mt-3 form-control" type="text" name="prenom" placeholder="First Name" required>
        <input class="mt-3 form-control" type="password" name="password" placeholder="Password" required>
        <input class="mt-3 form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
        <input class="mt-3 form-control" type="email" name="email" placeholder="Email" required>
        <input class="mt-3 form-control" type="text" name="phone" placeholder="Phone Number" required>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" value="femme" id="sexe">
            <label class="form-check-label" for="sexe">
              Femme
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" value="homme" id="sexe"  checked>
            <label class="form-check-label" for="sexe">
              Homme
            </label>
          </div>    

        <input class="mt-3 btn btn-outline-primary" type="submit" value="Register">
    </form>
</body>
</html>