<?php
include_once('config.php');
include_once('models/completer.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$completer = new Completer($db);
$listGameUser = $completer->readCompleter($_SESSION['id']);