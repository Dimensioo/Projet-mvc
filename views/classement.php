<?php ob_start(); ?>

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
        <a href="<?=URL?>classement/page/<?= $page-1 ?>" id="modify" >Page précédente</a>
        <?php endif; if($page< $nbrPage) : ?>
        <a href="<?=URL?>classement/page/<?= $page+1 ?>" id="modify" >Page Suivante</a>
        <?php endif; ?>
    </section><br>
    <a href="#listGame" id="up">Retour Haut de page <i class="fas fa-arrow-up"></i></a>
</div>
<aside></aside>

<?php
$title = "Classement";
$content = ob_get_clean();
ob_start();
?>

<link rel="stylesheet" href="<?=URL?>styles/projet.css">
<link rel="stylesheet" href="<?=URL?>styles/header.css">
<link rel="stylesheet" href="<?=URL?>styles/autre.css">
<link rel="stylesheet" href="<?=URL?>styles/anim.css">

<?php
$style = ob_get_clean();
require_once("template.php");