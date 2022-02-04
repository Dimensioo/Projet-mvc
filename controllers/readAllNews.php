<?php
include_once('config.php');
include_once('models/news.php');

$database = new Database(); //connexion a la base de donnée
$db = $database->getConnection();

$listNews = new News($db);
$news = $listNews->readAllNews();