<?php
include_once('config.php');
include_once('models/news.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

if(isset($_POST['nom_news'])){
    $news = new News($db); //creation de l'objet
    $news->set_titre_news($_POST['nom_news']); //assignation dans les attributs de l'objet

    $news->deleteNews(); //fonction supression news
}