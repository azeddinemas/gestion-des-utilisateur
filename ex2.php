<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice 2</title>
</head>

<body>
    <h1>Exercice 2</h1>
    <?php

        echo "<h2>Question 1 : Tableau associatif des notes</h2>";
        
        $notes = [
            "Ahmed" => 15,
            "Yassine" => 18,
            "Fatima" => 12,
            "Salma" => 16
        ];

        echo "<h3>Tableau initial</h3>";
        print_r($notes);

        echo "<h3>Tri par notes croissantes</h3>";
        asort($notes);
        print_r($notes);

        echo "<h3>Tri par notes décroissantes</h3>";
        arsort($notes);
        print_r($notes);

        echo "<h3>Tri par nom alphabétique</h3>";
        ksort($notes);
        print_r($notes);


        echo "<hr>";
        echo "<h2>Question 2 : Tableau multidimensionnel (tableaux indicés)</h2>";

        $personnes1 = [
            "El Idrissi" => ["Ahmed", "Fès", 22],
            "Alaoui"     => ["Salma", "Rabat", 20],
            "Bennani"    => ["Yassine", "Casablanca", 25]
        ];

        echo "<pre>";
        print_r($personnes1);
        echo "</pre>";


        echo "<hr>";
        echo "<h2>Question 3 : Tableau multidimensionnel (tableaux associatifs)</h2>";

        $personnes2 = [
            "El Idrissi" => [
                "prenom" => "Ahmed",
                "ville"  => "Fès",
                "age"    => 22
            ],

            "Alaoui" => [
                "prenom" => "Salma",
                "ville"  => "Rabat",
                "age"    => 20
            ],

            "Bennani" => [
                "prenom" => "Yassine",
                "ville"  => "Casablanca",
                "age"    => 25
            ]
        ];

        echo "<pre>";
        print_r($personnes2);
        echo "</pre>";


        echo "<hr>";
        echo "<h2>Question 4 : Parcours avec foreach</h2>";

        echo "<h3>Tableau de l'exercice 2</h3>";

        foreach ($personnes1 as $nom => $infos) {
            echo "Nom : $nom <br>";
            echo "Prénom : $infos[0] <br>";
            echo "Ville : $infos[1] <br>";
            echo "Age : $infos[2] <br><br>";
        }

        echo "<h3>Tableau de l'exercice 3</h3>";

        foreach ($personnes2 as $nom => $infos) {
            echo "Nom : $nom <br>";
            echo "Prénom : " . $infos['prenom'] . "<br>";
            echo "Ville : " . $infos['ville'] . "<br>";
            echo "Age : " . $infos['age'] . "<br><br>";
        }

    ?>

</body>

</html>