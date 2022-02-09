<?php
include_once('config.php');
include_once('models/user.php');

if(isset($_POST['new_pseudo'], $_POST['verif_mdp_pseudo'])){
    $user = new User; //creation de l'objet
    $user->set_pseudo_user(htmlspecialchars(strip_tags(trim($_POST['new_pseudo'])))); //assignation dans les attributs de l'objet
    $user->set_mdp_user(htmlspecialchars(strip_tags(trim($_POST['verif_mdp_pseudo']))));

    $user->updatePseudo(); //fonction modification du Pseudo
}