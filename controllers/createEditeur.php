<?php
include_once('config.php');
include_once('models/editeur.php');

if(isset($_POST['nom_editeur'])) {
    $editeur = new editeur; //creation de l'objet
    $editeur->set_nom_editeur($_POST['nom_editeur']); //assignation dans les attributs de l'objet

    $editeur->createEditeur(); //fonction creation de l'editeur
}