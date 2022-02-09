<?php
include_once('config.php');
include_once('models/game.php');

$listgame = new Game;
$games = $listgame->readAllGame();