<?php
include_once('config.php');
include_once('models/completer.php');

$completer = new Completer;
$completer->set_id_user($user['id_user']);
$totalGame = $completer->totalGameUser();
$playTime = $completer->totalPlayTime();
$achievements = $completer->totalAchievement();
$avgNote = $completer->averageNote();