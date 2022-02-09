<?php
include_once('config.php');
include_once('models/user.php');

if(isset($_POST['pseudo_user'], $_POST['email_user'], $_POST['mdp_user'])) {
    $user = new User; //creation de l'objet
    $user->set_pseudo_user($_POST['pseudo_user']); //assignation dans les attributs de l'objet
    $user->set_email_user($_POST['email_user']);
    $user->set_mdp_user($_POST['mdp_user']);

    $user->createUser(); //fonction creation de l'utilisateur
}