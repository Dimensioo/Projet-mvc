<?php
    if(isset($_SESSION["pseudo"])){ //afichage quand utilisateur connéctée
        echo "<div><p>Bienvenue ", $_SESSION['pseudo'], "</p></div>";
        echo "<div class=\"sizeup\"><a href=\"controller/logout.php\">Déconnexion</a></div>";
    }
    else { //afichage quand utilisateur déconectée
        echo "<div class=\"sizeup\"><a href=\"".URL."connexion\">Se connecter / S'inscrire</a></div>";
    }
?>