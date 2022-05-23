<?php ob_start(); ?>

<aside></aside>
<div>
    <div id="description"> <!--Page de description Jeu-->
        <div id="descriptionStat"> <!--1er colone avec image et stats-->
            <div>
                <img src="../../<?= $game["img_game"]?>" alt="<?= $game["nom_game"]?>" class="sizeup" width="200px">
            </div>
            <div>
                <?php require "./controllers/read/readSummaryGame.php"; ?>
                <h3><i class="fas fa-star-half-alt"></i> Note :</h3>
                <p><?= round($globalNote, 2) ?> / 10</p>
                <h3><i class="fas fa-trophy"></i> Classement :</h3>
                <p># <?= $position ?? "__" ?></p>
                <h3>Nombre d'Utilisateur :</h3>
                <p><?= $totalUser ?></p>
            </div>
        </div>
        <div id="descriptionData"> <!--2eme colone avec informations-->
            <div>
                <h2><?= $game["nom_game"]?></h2>
                <a href="<?=URL?>jeux/ajout/<?= $game["id_game"] ?>" class="sizeup">Ajouter à votre liste</a>
            </div>
            <div>
                <h3>Editeur : <?= $game["nom_editeur"] ?></h3>
                <h3>Date de sortie : <?= $game["date_game"] ?></h3>
            </div>
            <p><?= $game["description_game"] ?></p>
        </div>
    </div>
</div>
<aside></aside>

<?php
$title = "Description - ".$game["nom_game"];
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