<?php
    include_once('config.php');
    include_once('models/news.php');
    include_once('models/user.php');

    $database = new Database(); //connexion a la base de donnée
    $db = $database->getConnection();

    if(isset($_POST['titre_news'], $_POST['contenu_news'])) {
        $news = new News($db); //creation de l'objet
        $user = new User($db);

        $news->set_titre_news($_POST['titre_news']); //assignation dans les attributs de l'objet
        $news->set_contenu_news($_POST['contenu_news']);
        $user->set_pseudo_user($_SESSION['pseudo']);
        $news->set_id_user($user->readUser());
        
        $news->createNews(); //fonction creation news
    }
?>