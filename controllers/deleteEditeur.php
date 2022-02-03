<?php
    include_once('config.php');
    include_once('models/editeur.php');

    $database = new Database(); //connexion a la base de donnée
    $db = $database->getConnection();

    if(isset($_POST['nom_editeur2'])){
        $editeur = new Editeur($db); //creation de l'objet
        $editeur->set_nom_editeur($_POST['nom_editeur2']); //assignation dans les attributs de l'objet

        $editeur->deleteEditeur(); //fonction supression editeur
    }
?>