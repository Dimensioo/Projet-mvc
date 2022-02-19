<?php
include_once('config.php');
include_once('models/completer.php');

$completer = new Completer;
$completer->set_id_user($_SESSION['id']);
$listGameUser = $completer->readCompleter('nom_game');