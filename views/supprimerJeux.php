<?php ob_start(); ?>

<aside></aside>
<div id="admin">
    <h2>Supprimer un jeu de ma liste</h2>
    <div>
        <?php 
            require "./controllers/read/readCompleter_forUpdate.php"; 
            if(!empty($listGameUser)) :
        ?>
        <form action="#" method="post">
            <h3>Selectioner le jeu à supprimer</h3>
            <select name="nom_game" required>
                <option disabled selected>Selectioner un jeu</option>
                <?php foreach ($listGameUser as $game) : ?>
                <option><?= $game["nom_game"]?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="submit" value="Supprimer" class="sizeup">
            <?php include('controllers/delete/deleteCompleter.php') ?>
        </form>
        <a href="<?=URL?>liste/<?=$_SESSION['id']?>">Retour</a>
        <?php else : ?>
        <h4>Vous n'avez aucun jeu dans votre liste</h4>
        <?php endif ?>
    </div>
</div>
<aside></aside>

<?php
$title = "Supprimer un jeu";
$content = ob_get_clean();
ob_start();
?>

<link rel="stylesheet" href="<?=URL?>styles/admin.css">
<link rel="stylesheet" href="<?=URL?>styles/header.css">
<link rel="stylesheet" href="<?=URL?>styles/autre.css">
<link rel="stylesheet" href="<?=URL?>styles/anim.css">

<?php
$style = ob_get_clean();
require_once("template.php");