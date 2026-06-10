<!DOCTYPE html>
<html>

<head>
    <title>Formulaire</title>
</head>

<body>

    <form action="traitement.php" method="post">
        Nom : <input type="text" name="nom" required><br><br>

        Age : <input type="number" name="age" min="1" max="120" required><br><br>

        Email : <input type="email" name="email" required><br><br>

        <input type="submit" value="Envoyer">
    </form>

</body>

</html>