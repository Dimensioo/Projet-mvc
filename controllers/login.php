<?php
    include_once('config.php');
    include_once('class/user.php');
    session_destroy();

    $database = new Database(); //connexion a la base de donnée
    $db = $database->getConnection();

    if (isset($_POST['conn_email_user'], $_POST['conn_mdp_user'])){
        $user = new User($db); //creation de l'objet
        $user->set_email_user($_POST['conn_email_user']); //assignation dans les attributs de l'objet
        $user->set_mdp_user($_POST['conn_mdp_user']);

        $user->login(); //fonction connexion de l'utilisateur
    }
?>