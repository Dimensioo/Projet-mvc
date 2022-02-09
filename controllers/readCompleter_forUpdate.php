<?php
include_once('config.php');
include_once('models/completer.php');

$completer = new Completer;
$listGameUser = $completer->readCompleter($_SESSION['id']);