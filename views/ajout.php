<?php ob_start(); ?>

<aside></aside>
<div id="admin">
    <h2>Ajout d'un jeu</h2>
    <div>
        <form action="#" method="post">
            <h3><?= $game["nom_game"]?></h3>
            <div><img src="../../<?= $game["img_game"]?>" alt="<?= $game["nom_game"]?>" class="sizeup" width="200px"></div>
            <label for="temps_completer">Indiquer votre temps de jeu : </label>
            <input type="number" name="temps_completer" placeholder="Temps de jeu" required><br>
            <label for="note_completer">Veuillez donner une note : </label>
            <select name="note_completer" required>
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select><br>
            <label for="note_completer">Indiquer le nombre d'achievement obtenus : </label>
            <input type="number" name="achievement_completer" placeholder="Achievements obtenus" required>
            <input type="submit" value="Ajouter" class="sizeup">
            <?php include('controllers/create/createCompleter.php') ?>
        </form>
        <a href="<?=URL?>jeux/description/<?=$game['id_game']?>">Retour</a>
    </div>
</div>
<aside></aside>

<?php
$title = "Ajout - ".$game["nom_game"];
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