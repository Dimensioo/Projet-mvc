<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/editeur.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

if(isset($_POST['nom_game'], $_POST['date_game'], $_POST['description_game'], $_POST['id_editeur'])) {
    $game = new Game($db); //creation de l'objet
    $editeur = new Editeur($db);

    $game->set_nom_game($_POST['nom_game']); //assignation dans les attributs de l'objet
    $game->set_date_game($_POST['date_game']);
    $game->set_description_game($_POST['description_game']);
    $editeur->set_nom_editeur($_POST['id_editeur']);
    $game->set_id_editeur($editeur->readEditeur());
    
    $game->createGame(); //fonction creation du jeu
}
