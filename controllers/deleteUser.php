<?php
include_once('config.php');
include_once('models/user.php');

if(isset($_POST['verif_del_mdp'])){
    $user = new User; //creation de l'objet
    $user->set_mdp_user(htmlspecialchars(strip_tags(trim($_POST['verif_del_mdp'])))); //assignation dans les attributs de l'objet

    $user->deleteUser(); //fonction supression Utilisateur
}