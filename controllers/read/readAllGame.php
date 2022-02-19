<?php
include_once('config.php');
include_once('models/game.php');

$listgame = new Game;
$totalGame = $listgame->readAllGame();

if(empty($url[2])){
    $page = 1;
}
else{
    $page = $url[2];
}

$limit = 10;
$offset = ($limit*$page)-$limit;
$totalJeux = count($totalGame);
$nbrPage = ceil($totalJeux/$limit);

if($totalJeux<=($nbrPage*$limit)){
    $games = $listgame->readPageGame($limit, $offset);
}