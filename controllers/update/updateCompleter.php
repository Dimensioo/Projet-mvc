<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/completer.php');

if(isset($_POST['nom_game']) && isset($_POST['temps_completer']) && isset($_POST['note_completer']) && isset($_POST['achievement_completer'])) {
    $game = new Game;
    $game->set_nom_game(htmlspecialchars(strip_tags(trim($_POST["nom_game"]))));
    $game = $game->readGameByName();
    
    $completer = new Completer; //creation de l'objet
    $completer->set_id_game($game['id_game']); //assignation dans les attributs de l'objet
    $completer->set_id_user($_SESSION["id"]);
    $completer->set_temps_completer(htmlspecialchars(strip_tags(trim($_POST["temps_completer"]))));
    $completer->set_note_completer(htmlspecialchars(strip_tags(trim($_POST["note_completer"]))));
    $completer->set_achievement_completer(htmlspecialchars(strip_tags(trim($_POST["achievement_completer"]))));

    $completer->updateCompleter(); //fonction ajout du jeu dans la liste utilisateur
}