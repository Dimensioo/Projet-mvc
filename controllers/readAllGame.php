<?php
include_once('config.php');
include_once('models/game.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$listgame = new Game($db);
$games = $listgame->readAllGame();