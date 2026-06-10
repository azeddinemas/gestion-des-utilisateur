<?php
session_start();

if (isset($_SESSION["nom"])) {
    echo "Bienvenue (session) : " . $_SESSION["nom"];
} else {
    echo "Aucun utilisateur connecté.";
}
?>