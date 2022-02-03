<?php
    //deconexion de l'utilisateur
    session_start();

    if(session_destroy()) {
        header("location: ../REA2_htmlCss/html/connexion.php");
    }
?>