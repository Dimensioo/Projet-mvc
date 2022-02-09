<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/completer.php');

if(isset($_POST['nom_game'])) {
    $game = new Game;
    $game = $game->readGameByName($_POST["nom_game"]);

    $completer = new Completer; //creation de l'objet
    $completer->set_id_game($game['id_game']); //assignation dans les attributs de l'objet
    $completer->set_id_user($_SESSION["id"]);

    $completer->deleteCompleter(); //fonction supression Jeu de la liste utilisateur
}