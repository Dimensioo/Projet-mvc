<?php
include_once('config.php');
include_once('models/editeur.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$editeur = new Editeur($db);
$idEditeur = $editeur->readEditeuryById($game["id_editeur"]);

if($idEditeur){
    $editeur = $idEditeur;
}