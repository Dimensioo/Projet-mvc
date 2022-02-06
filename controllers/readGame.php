<?php
include_once('config.php');
include_once('models/game.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$game = new Game($db);
$idGame = $game->readGame($url[2]);

if($idGame){
    $game = $idGame;
    require "./views/description.php";
}
else {
    require "./views/error404.php";
}