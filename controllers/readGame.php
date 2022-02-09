<?php
include_once('config.php');
include_once('models/game.php');

$game = new Game;
$game = $game->readGameById($url[2]);

if($game && $url[1] == "description"){
    require "./views/description.php";
    exit;
}
else if($game && $url[1] == "ajout") {
    require "./views/ajout.php";
    exit;
}
else {
    require "./views/error404.php";
}