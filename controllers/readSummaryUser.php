<?php
include_once('config.php');
include_once('models/completer.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$completer = new Completer($db);
$totalGame = $completer->totalGameUser($_SESSION['id']);
$playTime = $completer->totalPlayTime($_SESSION['id']);
$achievements = $completer->totalAchievement($_SESSION['id']);
$avgNote = $completer->averageNote($_SESSION['id']);