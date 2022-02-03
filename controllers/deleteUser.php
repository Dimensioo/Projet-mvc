<?php
    include_once('config.php');
    include_once('class/user.php');

    $database = new Database(); //connexion a la base de donnée
    $db = $database->getConnection();

    if(isset($_POST['verif_del_mdp'])){
        $user = new User($db); //creation de l'objet
        $user->set_mdp_user($_POST['verif_del_mdp']); //assignation dans les attributs de l'objet

        $user->deleteUser(); //fonction supression Utilisateur
    }
?>