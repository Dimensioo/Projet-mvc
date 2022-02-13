<?php
include_once('config.php');
include_once('models/news.php');

if(isset($_POST['modif_nom_news']) && isset($_POST['modif_titre_news']) && isset($_POST['modif_contenu_news'])) {
    $news = new News;
    $news->set_titre_news(htmlspecialchars(strip_tags(trim($_POST["modif_nom_news"]))));
    $result = $news->readNews();
    
    $news->set_id_news($result['id_news']);
    $news->set_titre_news(htmlspecialchars(strip_tags(trim($_POST["modif_titre_news"]))));
    $news->set_contenu_news(htmlspecialchars(strip_tags(trim($_POST["modif_contenu_news"]))));
    
    $news->updateNews();
}