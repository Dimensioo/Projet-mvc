<?php
include_once('config.php');
include_once('models/game.php');

$rank = new Game;
$rank = $rank->top5();