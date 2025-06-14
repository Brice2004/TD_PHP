<?php
include('db.php');
session_start();


//take form data

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email and password are provided
    if (empty($email) || empty($password)) {
        echo "<div class='alert alert-danger'>Email and password are required.</div>";
        exit;
    }

    // Prepare and execute the SQL statement to check credentials
    $stmt = $pdo->prepare("SELECT * FROM users WHERE mail = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verify the password
    if ($user) {
        // Store user information in session
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'mail' => $user['mail'],
            'phone' => $user['phone'],
            'sexe' => $user['sexe'],
            'access' => $user['access']
        ];

        header("Location: home.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password.</div>";
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
        <h1 class="text-center">Login</h1>

        <input class="form-control" type="text" name="email" placeholder="email" required>
        <input class="mt-3 form-control" type="password" name="password" placeholder="Password" required>

        <input class="mt-3 btn btn-outline-primary" type="submit" value="Login">
    </form>
</body>
</html>