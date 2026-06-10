<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" class="container mt-5">
        Nom: <input type="text" name="nom" required><br>
        Email: <input type="email" name="email" required><br>
        Age: <input type="number" name="age" min="1" max="120" required><br>
        Mot de passe: <input type="password" name="password" required><br>
        <button type="submit">S'inscrire</button>
        <a href="login.php">Se connecter</a>
    </form>
</body>

</html>

<?php
require "connexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $age = $_POST['age'];
    $password = $_POST['password'];
    
    // Hash mot de passe
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    // Insertion
    $sql = "INSERT INTO utilisateurs (nom, email, age, password) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([$nom, $email, $age, $hash]);
    header("Location: index.php");
    exit();
}