<?php
include_once('config.php');
include_once('models/news.php');

if(isset($_POST['nom_news'])){
    $news = new News; //creation de l'objet
    $news->set_titre_news($_POST['nom_news']); //assignation dans les attributs de l'objet

    $news->deleteNews(); //fonction supression news
}