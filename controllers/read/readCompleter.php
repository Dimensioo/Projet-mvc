<?php
include_once('config.php');
include_once('models/completer.php');

$completer = new Completer;
$completer->set_id_user($user["id_user"]);
$sortable = ['name', 'editeur','date', 'time', 'achievement', 'note']; //valeur possible pour trier le tableau

if(!empty($url[2]) &&  in_array($url[2], $sortable)) { //verification que l'url est valide
    switch ($url[2]){ //modification pour obtenir le bon nom de colonne dans la BDD
        case 'name' :
            $sort = "nom_game";
            break;
        case 'editeur' :
            $sort = "nom_editeur";
            break;
        case 'date' :
            $sort = "date_game";
            break;
        case 'time' :
            $sort = "temps_completer";
            break;
        case 'achievement' :
            $sort = "achievement_completer";
            break;
        case 'note' :
            $sort = "note_completer";
            break;
    }
}
else {
    $sort = "nom_game"; //valeur par defaut
}

$listGameUser = $completer->readCompleter($sort); //fonction pour recuperer tout les jeux de la liste utilisateur trier en fonction du $sort