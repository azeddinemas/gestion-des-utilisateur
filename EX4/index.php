<?php
session_start();
require "connexion.php";

if (!isset($_SESSION['nom'])) {
    header("Location: login.php");
    exit();
}


$sql = "SELECT * FROM utilisateurs";
$resultat = $pdo->query($sql);

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
    <h1 class="text-center my-4">Liste des utilisateurs</h1>

    <a href="logout.php" class="btn btn-warning text-white mb-3">Se déconnecter</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nom</th>
                <th scope="col">email</th>
                <th scope="col" class="text-center">actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultat as $row) { ?>
            <tr>
                <th scope="row"><?= $row["id"] ?></th>
                <td><?= $row["nom"] ?></td>
                <td><?= $row["email"] ?></td>
                <td class="text-center">
                    <a href="modifier.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-primary">Modifier</a>
                    <a href="?id=<?= $row["id"] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')" class="btn btn-sm btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>

        <?php
            if(isset($_GET['id'])){
            $id=$_GET['id'];    
            $sql="DELETE FROM utilisateurs WHERE id='$id'";
            $resultat=$pdo->exec($sql);
        ?>
        <script>
        window.location.href = 'index.php';
        </script>
        <?php }?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
<?php

?>