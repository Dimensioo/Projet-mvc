<?php
include_once('config.php');
include_once('models/user.php');

if(isset($_POST['pseudo_user']) && isset($_POST['email_user']) && isset($_POST['mdp_user'])) {
    $user = new User; //creation de l'objet
    $user->set_pseudo_user(htmlspecialchars(strip_tags(trim($_POST['pseudo_user'])))); //assignation dans les attributs de l'objet
    $user->set_email_user(htmlspecialchars(strip_tags(trim($_POST['email_user']))));
    $user->set_mdp_user(htmlspecialchars(strip_tags(trim($_POST['mdp_user']))));

    $user->createUser(); //fonction creation de l'utilisateur
}