<?php
include_once('config.php');
include_once('models/game.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$game = new Game($db);
$idGame = $game->readGameById($url[2]);

if($idGame && $url[1] == "description"){
    $game = $idGame;
    require "./views/description.php";
}
else if($idGame && $url[1] == "ajout") {
    $game = $idGame;
    require "./views/ajout.php";
}
else {
    require "./views/error404.php";
}