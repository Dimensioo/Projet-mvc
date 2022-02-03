<?php
    if(session_destroy()) {
        header("location: ".URL."connexion"); //deconexion de l'utilisateur
    }
?>