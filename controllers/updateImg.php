<?php
include_once('config.php');
include_once('models/user.php');

if(isset($_FILES["new_pic"])) {
    $filename = $_FILES["new_pic"]["name"]; //recup nom du fichier
    $fileExt = "." . strtolower(substr(strchr($filename, "."), 1)); //conversion extension du fichier en lower case
    $tmpName = $_FILES["new_pic"]["tmp_name"]; //recup nom temporaire du fichier
    $uniqueName = md5(uniqid(rand(), TRUE)); //generation nom de fichier unique
    $filename = "images/img_users/" . $uniqueName . $fileExt; //modification du non du fichier pour indiquer le chemin ou enregistrer
    $resultat = move_uploaded_file($tmpName, $filename); //Enregistrement de l'image

    if($resultat) { //update de l'image bdd si l'upload de l'image à reussi
        $user = new User; //creation de l'objet
        $user->set_img_user($filename); //assignation dans les attributs de l'objet

        $user->updateImg(); //fonction update image utilisateur
    }
    else {
        echo "Erreur image";
    }
}