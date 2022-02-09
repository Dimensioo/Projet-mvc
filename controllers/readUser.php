<?php
include_once('config.php');
include_once('models/user.php');

$user = new User;
$idUser = $user->readUserById($url[1]);

if ($url[1] == "modifier") {
    require "./views/modifierJeux.php";
    exit;
}
if ($url[1] == "supprimer") {
    require "./views/supprimerJeux.php";
    exit;
}
if($idUser && $url[0] == "liste"){
    $user = $idUser;
    require "./views/liste.php";
    exit;
}
else {
    require "./views/error404.php";
}