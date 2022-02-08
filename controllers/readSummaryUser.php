<?php
include_once('config.php');
include_once('models/completer.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$completer = new Completer($db);
$totalGame = $completer->totalGameUser($user['id_user']);
$playTime = $completer->totalPlayTime($user['id_user']);
$achievements = $completer->totalAchievement($user['id_user']);
$avgNote = $completer->averageNote($user['id_user']);