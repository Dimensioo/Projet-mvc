<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/editeur.php');

$editeur = new Editeur;
$editeur->set_id_editeur($completer['id_editeur']);
$idEditeur = $editeur->readEditeuryById();