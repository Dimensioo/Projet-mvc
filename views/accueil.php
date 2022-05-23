<?php ob_start(); ?>

<aside></aside>
<div>
    <div id="body1">
        <section id="release"> <!--Last released game-->
            <h2>Dernier ajout </h2>
            <div>
                <?php
                    require "./controllers/read/readLastGame.php";
                    foreach ($lastGames as $lastGame) :
                ?>
                <div class="sizeup"><a href="<?=URL?>jeux/description/<?= $lastGame["id_game"]?>"> 
                    <img src="<?= $lastGame["img_game"] ?>" alt="image du jeu" height="200px" width="150px">
                    <h3><?= $lastGame["nom_game"] ?></h3>
                </a></div>
                <?php endforeach; ?>
            </div>
        </section>
        <section id="news"> <!--Newsfeed-->
            <h2>News <i class="far fa-newspaper"></i></h2>
            <?php
                require "./controllers/read/readAllNews.php";
                foreach ($news as $new) : 
            ?>
            <h3><?= $new['titre_news'] ?></h3>
            <p><?= $new['contenu_news'] ?></p>
            <?php endforeach; ?>
        </section>
    </div>
    <div id="body2">
        <section id="ranking"> <!--Best ranked game-->
            <h2>Classement <i class="fas fa-trophy"></i></h2>
            <div>
                <?php 
                    include "./controllers/read/readTop5.php";
                    foreach($rank as $game) :
                ?>
                <div><a href="<?=URL?>jeux/description/<?= $game["id_game"]?>">
                    <img src="<?= $game["img_game"] ?>" alt="image du jeu" class="sizeup" height="150px" width="100px"></a>
                    <h3><?= $game['nom_game'] ?></h3>
                    </div>
                <?php endforeach;?>
            </div>
            <p><a href="<?=URL?>classement/">Voir plus...</a></p>
        </section>
    </div>
</div>
<aside></aside>

<?php
$title = "Accueil";
$content = ob_get_clean();
ob_start();
?>

<link rel="stylesheet" href="<?=URL?>styles/projet.css">
<link rel="stylesheet" href="<?=URL?>styles/header.css">
<link rel="stylesheet" href="<?=URL?>styles/accueil.css">
<link rel="stylesheet" href="<?=URL?>styles/anim.css">
<link rel="stylesheet" href="<?=URL?>styles/display.css">

<?php
$style = ob_get_clean();
require_once("template.php");