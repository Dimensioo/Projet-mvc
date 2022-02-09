<?php
include_once('config.php');
include_once('models/completer.php');

$completer = new Completer;
$totalUser = $completer->totalUser($url[2]);
$globalNote = $completer->globalNote($url[2]);