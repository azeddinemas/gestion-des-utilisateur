<?php
session_start();
require "connexion.php";

if (isset($_SESSION['nom'])) {
    header("Location: landing.php");
    exit();
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
    <form action="login.php" method="POST">
        Email: <input type="email" name="email" required><br>
        Mot de passe: <input type="password" name="password" required><br>
        <button type="submit">Se connecter</button>
        <a href="inscription.php">S'inscrire</a>
    </form>
</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['nom'] = $user['nom'];
        echo "Bienvenue " . $user['nom'];
        header("Location: landing.php");
        exit();
    } else {
        echo "Email ou mot de passe incorrect";
    }
}
?>