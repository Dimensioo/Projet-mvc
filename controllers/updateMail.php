<?php
include_once('config.php');
include_once('models/user.php');

if(isset($_POST['new_email'], $_POST['verif_mdp_mail'])){
    $user = new User; //creation de l'objet
    $user->set_email_user($_POST['new_email']); //assignation dans les attributs de l'objet
    $user->set_mdp_user($_POST['verif_mdp_mail']);

    $user->updateMail(); //fonction modification du Mail
}