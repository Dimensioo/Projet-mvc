<?php
include_once('config.php');
include_once('models/user.php');

if (isset($_POST['conn_email_user'], $_POST['conn_mdp_user'])){
    $user = new User; //creation de l'objet
    $user->set_email_user(htmlspecialchars(strip_tags(trim($_POST['conn_email_user'])))); //assignation dans les attributs de l'objet
    $user->set_mdp_user(htmlspecialchars(strip_tags(trim($_POST['conn_mdp_user']))));

    $user->login(); //fonction connexion de l'utilisateur
}