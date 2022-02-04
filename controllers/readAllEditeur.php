<?php
include_once('config.php');
include_once('models/editeur.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$listEditeur = new Editeur($db);
$editeurs = $listEditeur->readAllEditeur();