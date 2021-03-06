<?php
include_once('config.php');
include_once('models/user.php');
include_once('models/completer.php');

if(isset($_POST['verif_del_mdp'])) {
    $user = new User; //creation de l'objet
    $completer = new Completer;

    $user->set_pseudo_user($_SESSION['pseudo']);
    $user->set_mdp_user(htmlspecialchars(strip_tags(trim($_POST['verif_del_mdp'])))); //assignation dans les attributs de l'objet
    $result = $user->readUser();
    if($result['img_user'] != 'images/img_users/default_user.png'){
        unlink($result['img_user']); //suppresion de l'image
    }

    $completer->set_id_user($_SESSION['id']);
    $completer->deleteAllCompleter();
    $user->deleteUser(); //fonction supression Utilisateur
}