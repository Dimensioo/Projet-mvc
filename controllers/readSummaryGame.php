<?php
include_once('config.php');
include_once('models/completer.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$completer = new Completer($db);
$totalUser = $completer->totalUser($url[2]);
$globalNote = $completer->globalNote($url[2]);