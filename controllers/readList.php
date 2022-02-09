<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/editeur.php');

$editeur = new Editeur;
$idEditeur = $editeur->readEditeuryById($completer['id_editeur']);