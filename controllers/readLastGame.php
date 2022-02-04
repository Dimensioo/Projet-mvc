<?php
include_once('config.php');
include_once('models/game.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$lastgame = new Game($db);
$lastGames = $lastgame->readLastGame();