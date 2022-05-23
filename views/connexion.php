<?php ob_start(); ?>

<aside></aside>
<div>
    <div id=formulaire>
        <form id=connexion action="#" method="POST"> <!--Log in-->
            <legend><h2>Se connecter</h2></legend>
            <label for="conn_email_user">Adresse E-mail :</label><br>
            <input type="email" id="conn_mail" name="conn_email_user" required><br>
            <label for="con_mdp_user">Mot de passe :</label><br>
            <input type="password" id="conn_mdp" name="conn_mdp_user" required><br>
            <input type="submit" value="Se connecter" class="sizeup">
            <?php include('controllers/login.php') ?>
        </form>
        <form id=creationCompte action="#" method="POST"> <!--Create Account-->
            <legend><h2>Créer votre compte</h2></legend>
            <label for="pseudo_user">Pseudo :</label><br>
            <input type="text" id="pseudo" name="pseudo_user" required><br>
            <label for="email_user">Adresse E-mail :</label><br>
            <input type="email" id="mail" name="email_user" required><br>
            <label for="mdp_user">Mot de passe :</label><br>
            <input type="password" id="mdp" name="mdp_user" required><br>
            <input type="submit" value="Créer un compte" class="sizeup">
            <?php include('controllers/create/createUser.php') ?>
        </form>
    </div>
</div>
<aside></aside>

<?php
$title = "Connexion";
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