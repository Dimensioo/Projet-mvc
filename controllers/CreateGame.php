<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/editeur.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

if(isset($_POST['nom_game'], $_POST['date_game'], $_POST['description_game'], $_POST['id_editeur'], $_FILES["img_game"])) {
    $filename = $_FILES["img_game"]["name"]; //recup nom du fichier
    $fileExt = "." . strtolower(substr(strchr($filename, "."), 1)); //conversion extension du fichier en lower case
    $tmpName = $_FILES["img_game"]["tmp_name"]; //recup nom temporaire du fichier
    $uniqueName = md5(uniqid(rand(), TRUE)); //generation nom de fichier unique
    $filename = "images/img_jeux/" . $uniqueName . $fileExt; //modification du non du fichier pour indiquer le chemin ou enregistrer
    $resultat = move_uploaded_file($tmpName, $filename); //Enregistrement de l'image

    if($resultat){ //creation du jeu en bdd si l'upload de l'image à reussi
        $game = new Game($db); //creation de l'objet
        $editeur = new Editeur($db);

        $game->set_nom_game($_POST['nom_game']); //assignation dans les attributs de l'objet
        $game->set_date_game($_POST['date_game']);
        $game->set_description_game($_POST['description_game']);
        $editeur->set_nom_editeur($_POST['id_editeur']);
        $game->set_id_editeur($editeur->readEditeur());
        $game->set_img_game($filename);
        
        $game->createGame(); //fonction creation du jeu
    }
    else {
        echo "Erreur image";
    }
}
