<?php
include_once('config.php');
include_once('models/game.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

if(isset($_POST['nom_game2'])){
    $user = new Game($db); //creation de l'objet
    $user->set_nom_game($_POST['nom_game2']); //assignation dans les attributs de l'objet

    $user->deleteGame(); //fonction supression Jeu
}