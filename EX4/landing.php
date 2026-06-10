<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center my-4">Bienvenue <?= $_SESSION['nom'] ?> sur la page d'accueil</h1>
    <a href="index.php" class="btn btn-primary mb-3">Voir la liste des utilisateurs</a>
    <a href="logout.php" class="btn btn-danger mb-3">Se déconnecter</a>
</body>

</html>