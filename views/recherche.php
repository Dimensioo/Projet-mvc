<?php ob_start(); ?>

<aside></aside>
<div id="listGame"> <!--List game-->
    <h2>Resultat de votre recherche <i class="fas fa-scroll"></i></h2>
    <?php
        require "./controllers/read/search.php";
        if($result) :
        foreach ($result as $game) : 
    ?>
    <div>
        <div><a href="<?=URL?>jeux/description/<?= $game["id_game"]?>"><img src="../<?= $game["img_game"]?>" alt="<?= $game["nom_game"]?>" class="sizeup" height="200px"></a></div>
        <article>
            <div>
                <a href="<?=URL?>jeux/description/<?= $game["id_game"]?>"><h3><?= $game["nom_game"]?></h3></a>
                <a href="<?=URL?>jeux/ajout/<?= $game["id_game"]?>" class="sizeup">Ajouter à votre liste</a>
            </div>
            <p id="listDate"><b>Date de sortie : </b><?= $game["date_game"]?></p>
            <p><?= $game["description_game"]?></p>
        </article>
    </div>
    <?php endforeach; else :?>
    <h3>Aucun Jeu ne correspond à votre recherhce</h3>
    <?php endif ?>
</div>
<aside></aside>

<?php
$title = "Recherche";
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