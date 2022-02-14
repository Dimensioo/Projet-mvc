<?php
include_once('config.php');
include_once('models/game.php');

$lastgame = new Game;
$lastGames = $lastgame->readLastGame();