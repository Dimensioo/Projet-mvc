<?php
include_once('config.php');
include_once('models/game.php');

if(isset($_POST['nom_game2'])) {
    $user = new Game; //creation de l'objet
    $user->set_nom_game($_POST['nom_game2']); //assignation dans les attributs de l'objet
    $result = $user->readGameByName();
    unlink($result['img_game']); //suppresion de l'image

    $user->deleteGame(); //fonction supression Jeu
}