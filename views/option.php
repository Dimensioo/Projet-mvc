<?php ob_start(); ?>

<aside></aside>
<div id="option">
    <h2>Informations du compte</h2> <!--Resumé information du compte-->
    <div>
        <div>
            <p><b>Pseudo : </b><?= $_SESSION['pseudo'] ?></p>
            <p><b>Adresse E-mail : </b><?= $_SESSION['email'] ?></p>
            <p><b>Inscrit depuis le : </b><?= $_SESSION['date'] ?></p>
        </div>
        <div>
            <img src="<?= $_SESSION['image'] ?>" alt="Image de profil" class="sizeup" height=150px>
        </div>
    </div>
    <h2>Modifier Informations <i class="fas fa-cog"></i></h2> <!--Bouton d'option pour modifier informations du compte-->
    <div>
        <a onClick="change_pseudo()" href="#" class="sizeup">Modifier pseudo</a>
        <a onClick="change_pic()" href="#" class="sizeup">Modifier image de profil</a>
        <a onClick="change_mail()" href="#" class="sizeup">Modifier adresse E-mail</a>
        <a onClick="change_mdp()" href="#" class="sizeup">Modifier mot de passe</a>
        <a onClick="delete_account()" href="#" class="sizeup">Suprimer mon compte <i class="far fa-trash-alt"></i></a>
    </div>            
    <form action="" method="post" class="invisible" id="change_pseudo"> <!--formulaire modification pseudo -->
        <label for="new_pseudo">Nouveau pseudo</label><br>
        <input type="text" name="new_pseudo" required><br>
        <label for="verif_mdp_pseudo">Entrer votre mot de passe</label><br>
        <input type="password" name="verif_mdp_pseudo" required><br>
        <input type="submit" value="Modifier Pseudo" class="sizeup">
        <?php include('controllers/update/updatePseudo.php') ?>
    </form>
    <form action="" method="post" class="invisible" id="change_pic" enctype="multipart/form-data"> <!--formulaire modification image de profil -->
        <label for="new_pic">Nouvelle image de profil</label><br>
        <input type="file" accept=".jpeg, .jpg, .png" name="new_pic" required><br>
        <input type="submit" value="Modifier Image de profil" class="sizeup">
        <?php include('controllers/update/updateImg.php') ?>
    </form>
    <form action="" method="post" class="invisible" id="change_mail"> <!--formulaire modification e-mail -->
        <label for="new_email">Nouveau E-mail</label><br>
        <input type="text" name="new_email" required><br>
        <label for="verif_mdp_mail">Entrer votre mot de passe</label><br>
        <input type="password" name="verif_mdp_mail" required><br>
        <input type="submit" value="Modifier E-mail" class="sizeup">
        <?php include('controllers/update/updateMail.php') ?>
    </form>
    <form action="" method="post" class="invisible" id="change_mdp"> <!--formulaire modification mot de passe -->
        <label for="verif_mdp">Ancien mot de passe</label><br>
        <input type="password" name="verif_mdp" required><br>
        <label for="new_mdp">Nouveau mot de passe</label><br>
        <input type="password" name="new_mdp" required><br>
        <input type="submit" value="Modifier mot de passe" class="sizeup">
        <?php include('controllers/update/updatePassword.php') ?>
    </form>
    <form action="" method="post" class="invisible" id="delete_account"> <!--formulaire suppression du compte -->
        <label for="verif_del_mdp">Entrer votre mot de passe</label><br>
        <input type="password" name="verif_del_mdp" required><br>
        <input type="submit" value="Suprimer mon compte" class="sizeup">
        <?php include('controllers/delete/deleteUser.php') ?>
    </form>
</div>
<aside></aside>
</div>

<?php
$title = "Option";
$content = ob_get_clean();
ob_start();
?>

<link rel="stylesheet" href="<?=URL?>styles/projet.css">
<link rel="stylesheet" href="<?=URL?>styles/header.css">
<link rel="stylesheet" href="<?=URL?>styles/autre.css">
<link rel="stylesheet" href="<?=URL?>styles/anim.css">
<link rel="stylesheet" href="<?=URL?>styles/display.css">

<?php
$style = ob_get_clean();
require_once("template.php");