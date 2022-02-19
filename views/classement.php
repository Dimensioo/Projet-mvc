<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>
    <link rel="stylesheet" href="<?=URL?>styles/projet.css">
    <link rel="stylesheet" href="<?=URL?>styles/header.css">
    <link rel="stylesheet" href="<?=URL?>styles/autre.css">
    <link rel="stylesheet" href="<?=URL?>styles/anim.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="<?=URL?>images/favicon.png"/>
    <script src="https://kit.fontawesome.com/3df32f415a.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <div id="nav1">
                <div><h1>Game List <i class="fas fa-gamepad"></i></h1></div>
                <?php
                    if(isset($_SESSION["pseudo"])) { //afichage quand utilisateur connéctée
                        echo "<div><p>Bienvenue ", $_SESSION['pseudo'], "</p></div>";
                        echo "<div class=\"sizeup\"><a href=\"".URL."logout\">Déconnexion</a></div>";
                    }
                    else { //afichage quand utilisateur déconectée
                        echo "<div class=\"sizeup\"><a href=\"".URL."connexion\">Se connecter / S'inscrire</a></div>";
                    } 
                ?>
            </div>
            <div id="nav2">
                <div>
                    <div><a href="<?=URL?>accueil"><i class="fas fa-home"></i></a></div>
                    <div><a href="<?=URL?>jeux" id="active">Jeux</a></div>
                    <?php 
                        if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."liste/".$_SESSION["id"]."\">Liste</a></div>";}
                        else{echo "<div><a href=\"".URL."liste\">Liste</a></div>";}
                        if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."option\">Option</a></div>";}
                        if($_SESSION && $_SESSION['role'] == 2){echo "<div><a href=\"".URL."admin\">Admin</a></div>";}
                    ?>
                </div>
                <div>
                    <form action="<?=URL?>recherche/" method="POST">
                        <div><input type="search" name="search" placeholder="Rechercher un jeu" required></div>
                        <div><input type="submit" value="Rechercher"></div>
                    </form>
                </div>
            </div>
        </nav>  
    </header>
    <div id=container>
        <aside></aside>
        <div id="listGame"> <!--List game-->
            <h2>Classement <i class="fas fa-trophy"></i></h2>
            <?php
                require "./controllers/read/readRanking.php";
                if(!empty($rank)) :
                foreach ($rank as $game) : 
            ?>
            <div>
                <div><a href="<?=URL?>jeux/description/<?= $game["id_game"]?>"><img src="<?php if(!empty($url[1])){echo "../";}?>../<?= $game["img_game"]?>" alt="<?= $game["nom_game"]?>" class="sizeup" height="200px"></a></div>
                <article>
                    <div>
                        <a href="<?=URL?>jeux/description/<?= $game["id_game"]?>"><h3><?= $game["nom_game"]?></h3></a>
                        <a href="<?=URL?>jeux/ajout/<?= $game["id_game"]?>" class="sizeup">Ajouter à votre liste</a>
                    </div>
                    <p id="listDate"><b>Date de sortie : </b><?= $game["date_game"]?></p>
                    <p><?= $game["description_game"]?></p>
                </article>
            </div>
            <?php endforeach; else : ?>
                <h4>La page n'existe pas</h4>
            <?php endif; ?>
            <section>
                <?php if(empty($page)) :?>
                <a href="<?=URL?>classement/page/2" id="modify" >Page Suivante</a>
                <?php endif; if($page > 1 && $page <= $nbrPage) : ?>
                <a href="<?=URL?>classement/page/<?= $page-1 ?>" id="modify" >Page précédante</a>
                <?php endif; if($page< $nbrPage) : ?>
                <a href="<?=URL?>classement/page/<?= $page+1 ?>" id="modify" >Page Suivante</a>
                <?php endif; ?>
            </section><br>
        </div>
        <aside></aside>
    </div>
    <footer>
        <a href="https://twitter.com"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="https://facebook.com"><i class="fab fa-facebook-f"></i> facebook</a>
        <a href="https://youtube.com"><i class="fab fa-youtube"></i> Youtube</a>
        <a href="https://github.com/Dimensioo"><i class="fab fa-github"></i> GitHub</a>
    </footer>
</body>
</html>