<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/editeur.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$game = new Game($db);
$idGame = $game->readGameById($completer["id_game"]);

$editeur = new Editeur($db);
$idEditeur = $editeur->readEditeuryById($idGame['id_editeur']);