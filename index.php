<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice 1</title>
</head>

<body>
    <h1>Exercice 1</h1>
    <?php

        echo "<h2>Question 1</h2>";
        // 1. Afficher une chaîne HTML sans l'interpréter
        echo htmlspecialchars("<h1> Bonjour mes amis </h1>");

        echo "<hr>";

        echo "<h2>Question 2</h2>";
        // 2. Comparaison de deux chaînes et affichage en ordre alphabétique
        $chaine1 = "Banane";
        $chaine2 = "Pomme";

        if (strcmp($chaine1, $chaine2) < 0) {
            echo $chaine1 . " , " . $chaine2;
        } else {
            echo $chaine2 . " , " . $chaine1;
        }

        echo "<hr>";

        echo "<h2>Question 3</h2>";
        // 3. Fonction de validation d'une URL HTTP ou FTP
        function validerURL($url)
        {
            return preg_match("/^(http|https|ftp):\/\/[^\s\/$.?#].[^\s]*$/i", $url);
        }

        $url = "https://www.google.com";

        if (validerURL($url)) {
            echo "URL valide";
        } else {
            echo "URL invalide";
        }

        echo "<hr>";

        echo "<h2>Question 4</h2>";
        // 4. Expression régulière pour un âge inférieur à 100
        $age = "25";

        if (preg_match("/^[0-9]{1,2}$/", $age)) {
            echo "Âge valide";
        } else {
            echo "Âge invalide";
        }

        echo "<hr>";

        echo "<h2>Question 5</h2>";
        // 5. Remplacer \n par <br />

        $texte = "Bonjour, le langage PHP est \n populaire \n pour le développement web";

        // Méthode 1 : fonction nl2br()
        echo "<h3>Méthode 1 : nl2br()</h3>";
        echo nl2br($texte);

        echo "<br><br>";

        // Méthode 2 : expression régulière
        echo "<h3>Méthode 2 : preg_replace()</h3>";
        echo preg_replace("/\n/", "<br />", $texte);

    ?>

</body>

</html>