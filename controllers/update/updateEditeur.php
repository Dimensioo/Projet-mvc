<?php
include_once('config.php');
include_once('models/editeur.php');

if(isset($_POST['modif_nom_editeur']) && isset($_POST['new_nom_editeur'])) {
    $editeur = new Editeur;
    $editeur->set_nom_editeur(htmlspecialchars(strip_tags(trim($_POST["modif_nom_editeur"]))));
    $result = $editeur->readEditeur();
    
    $editeur->set_id_editeur($result['id_editeur']);
    $editeur->set_nom_editeur(htmlspecialchars(strip_tags(trim($_POST["new_nom_editeur"]))));

    $editeur->updateEditeur();
}