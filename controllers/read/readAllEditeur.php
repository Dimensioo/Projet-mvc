<?php
include_once('config.php');
include_once('models/editeur.php');

$listEditeur = new Editeur;
$editeurs = $listEditeur->readAllEditeur();