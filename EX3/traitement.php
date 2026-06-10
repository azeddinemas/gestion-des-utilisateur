<?php
session_start();

// Vérifier si formulaire envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Nettoyage
    $nom = trim($_POST["nom"]);
    $age = trim($_POST["age"]);
    $email = trim($_POST["email"]);

    $erreurs = [];

    // Validation nom
    if (empty($nom)) {
        $erreurs[] = "Le nom est obligatoire.";
    }

    // Validation email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "Email invalide.";
    }

    // Validation âge (1 à 120)
    if (!is_numeric($age) || $age < 1 || $age > 120) {
        $erreurs[] = "Âge invalide (1-120).";
    }

    // Affichage erreurs ou succès
    if (!empty($erreurs)) {
        foreach ($erreurs as $err) {
            echo $err . "<br>";
        }
    } else {

        // 🔹 3. Sécurité XSS
        $nom_safe = htmlspecialchars($nom);
        $email_safe = htmlspecialchars($email);
        $age_safe = htmlspecialchars($age);

        echo "Nom : " . $nom_safe . "<br>";
        echo "Age : " . $age_safe . "<br>";
        echo "Email : " . $email_safe . "<br>";

        // 🔹 4. Sessions
        $_SESSION["nom"] = $nom_safe;

        // 🔹 5. Cookie (24h)
        setcookie("nom_user", $nom_safe, time() + 60*60*24);

        echo "<br>Bienvenue " . $nom_safe;
    }
}
?>