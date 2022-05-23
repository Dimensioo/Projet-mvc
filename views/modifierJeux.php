<?php ob_start(); ?>

<aside></aside>
<div id="admin">
    <h2>Modifier un jeu de ma liste</h2>
    <div>
        <?php 
            require "./controllers/read/readCompleter_forUpdate.php"; 
            if(!empty($listGameUser)) :
        ?>
        <form action="#" method="post">
            <h3>Selectioner le jeu à modifier</h3>
            <select name="nom_game" required>
            <option disabled selected>Selectioner un jeu</option>
                <?php foreach ($listGameUser as $game) :?>
                <option><?= $game["nom_game"]?></option>
                <?php endforeach; ?>
            </select><br>
            <h3>Indiquer les nouvelles Informations</h3>
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
            <input type="submit" value="Modifier" class="sizeup">
            <?php include('controllers/update/updateCompleter.php') ?>
        </form>
        <a href="<?=URL?>liste/<?=$_SESSION['id']?>">Retour</a>
        <?php else : ?>
        <h4>Vous n'avez aucun jeu dans votre liste</h4>
        <?php endif ?>
    </div>
</div>
<aside></aside>

<?php
$title = "Modifier un jeu";
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