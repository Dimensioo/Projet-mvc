<?php
include_once('config.php');
include_once('models/user.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

if(isset($_POST['new_pseudo'], $_POST['verif_mdp_pseudo'])){
    $user = new User($db); //creation de l'objet
    $user->set_pseudo_user($_POST['new_pseudo']); //assignation dans les attributs de l'objet
    $user->set_mdp_user($_POST['verif_mdp_pseudo']);

    $user->updatePseudo(); //fonction modification du Pseudo
}