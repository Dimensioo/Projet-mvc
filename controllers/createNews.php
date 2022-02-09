<?php
include_once('config.php');
include_once('models/news.php');
include_once('models/user.php');

if(isset($_POST['titre_news'], $_POST['contenu_news'])) {
    $news = new News; //creation de l'objet
    $user = new User;

    $news->set_titre_news(htmlspecialchars(strip_tags(trim($_POST['titre_news'])))); //assignation dans les attributs de l'objet
    $news->set_contenu_news(htmlspecialchars(strip_tags(trim($_POST['contenu_news']))));
    $user->set_pseudo_user($_SESSION['pseudo']);
    $news->set_id_user($user->readUser());
    
    $news->createNews(); //fonction creation news
}
