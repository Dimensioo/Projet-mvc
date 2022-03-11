<?php
include_once('config.php');
include_once('models/game.php');
   
$recherche = new Game;
$recherche->set_nom_game(htmlspecialchars(strip_tags(trim($_POST['search']))));
$result = $recherche->search();