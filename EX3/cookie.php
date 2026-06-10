<?php
if (isset($_COOKIE["nom_user"])) {
    echo "Bienvenue (cookie) : " . $_COOKIE["nom_user"];
} else {
    echo "Pas de cookie trouvé.";
}
?>