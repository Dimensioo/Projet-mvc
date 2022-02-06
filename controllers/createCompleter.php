<?php
include_once('config.php');
include_once('models/completer.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

if(isset($_POST['temps_completer'], $_POST['note_completer'], $_POST['achievement_completer'])) {
    $completer = new Completer($db); //creation de l'objet
    $completer->set_id_game($game['id_game']); //assignation dans les attributs de l'objet
    $completer->set_id_user($_SESSION["id"]);
    $completer->set_temps_completer($_POST["temps_completer"]);
    $completer->set_note_completer($_POST["note_completer"]);
    $completer->set_achievement_completer($_POST["achievement_completer"]);

    $completer->createCompleter(); //fonction ajout du jeu dans la liste utilisateur
}