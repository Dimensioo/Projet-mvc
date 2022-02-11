<?php
include_once('config.php');
include_once('models/completer.php');

$completer = new Completer;
$completer->set_id_game($url[2]);
$totalUser = $completer->totalUser();
$globalNote = $completer->globalNote();