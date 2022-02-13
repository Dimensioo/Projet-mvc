<?php
include_once('config.php');
include_once('models/game.php');
include_once('models/editeur.php');

if(isset($_POST['modif_nom_game']) && isset($_POST['new_nom_game']) && isset($_POST['modif_date_game']) && isset($_POST['modif_description_game']) && isset($_POST['modif_id_editeur']) && isset($_FILES["modif_img_game"])) {
    $maxSize = 1000000; //taille maximum du fichier
    $validExt = array('.jpg','.jpeg', '.png'); //extension de fichier accepté

    if($_FILES['modif_img_game']['size'] > $maxSize) { //verif taille du fichier
        echo "<p>Taille de l'image trop grande</p>";
    }
    else {
        $filename = $_FILES["modif_img_game"]["name"]; //recup nom du fichier
        $fileExt = "." . strtolower(substr(strchr($filename, "."), 1)); //conversion extension du fichier en lower case
        if(!in_array($fileExt, $validExt)) { //verif extension du fichier
            echo "<p>L'extension de l'image n'est pas valide</p>";
        }
        else {
            $tmpName = $_FILES["modif_img_game"]["tmp_name"]; //recup nom temporaire du fichier
            $uniqueName = md5(uniqid(rand(), TRUE)); //generation nom de fichier unique
            $filename = "images/img_jeux/" . $uniqueName . $fileExt; //modification du non du fichier pour indiquer le chemin ou enregistrer
            $resultat = move_uploaded_file($tmpName, $filename); //Enregistrement de l'image
            if($resultat) { //modification du jeu en bdd si l'upload de l'image à reussi
                $game = new Game; //creation des objets
                $editeur = new Editeur;

                $game->set_nom_game(htmlspecialchars(strip_tags(trim($_POST['modif_nom_game']))));
                $result = $game->readGameByName();
                unlink($result['img_game']); //suppresion de l'ancienne image

                $game->set_id_game($result['id_game']); //assignation dans les attributs de l'objet
                $game->set_nom_game(htmlspecialchars(strip_tags(trim($_POST['new_nom_game']))));
                $game->set_date_game(htmlspecialchars(strip_tags(trim($_POST['modif_date_game']))));
                $game->set_description_game(htmlspecialchars(strip_tags(trim($_POST['modif_description_game']))));
                $editeur->set_nom_editeur(htmlspecialchars(strip_tags(trim($_POST['modif_id_editeur']))));
                $game->set_id_editeur($editeur->readEditeur());
                $game->set_img_game($filename);

                $game->updateGame();
            }
        }
    }
}