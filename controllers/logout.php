<?php
    //deconexion de l'utilisateur
    session_start();

    if(session_destroy()) {
        header("location: ".URL);
    }
?>