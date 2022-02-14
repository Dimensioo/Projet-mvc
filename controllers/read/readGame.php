<?php
include_once('config.php');
include_once('models/game.php');

$game = new Game;
$game->set_id_game($url[2]);
$game = $game->readGameById();

if($game && $url[1] == "description") {
    require "./views/description.php"; //affichage page de description du jeu
    exit;
}
else if($game && $url[1] == "ajout") {
    require "./views/ajout.php"; //affichage page d'ajout du jeu dans la liste utilisateur
    exit;
}
else {
    require "./views/error404.php";
}