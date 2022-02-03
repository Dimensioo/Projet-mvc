<?php
include_once('config.php');
include_once('models/editeur.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

if(isset($_POST['nom_editeur'])) {
    $editeur = new editeur($db); //creation de l'objet
    $editeur->set_nom_editeur($_POST['nom_editeur']); //assignation dans les attributs de l'objet

    $editeur->createEditeur(); //fonction creation de l'editeur
}