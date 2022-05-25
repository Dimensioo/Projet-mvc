<?php ob_start(); ?>

<aside></aside>
<div id="admin">
    <h2>Gestion Jeux</h2> <!--Resumé information du compte-->
    <div>
        <form action="#" method="POST" enctype="multipart/form-data"> <!--Ajout d'un jeu a la DB-->
            <h3>Ajouter Jeu</h3>
            <input type="text" name="nom_game" placeholder="Non du jeu" required>
            <input type="date" name="date_game" required>
            <input type="text" name="description_game" placeholder="Description" required>
            <select name="id_editeur" required>
                <option disabled selected>Selectioner un éditeur</option>
                <?php
                    require "./controllers/read/readAllEditeur.php";
                    foreach ($editeurs as $editeur) : 
                ?>
                <option><?= $editeur["nom_editeur"]?></option>
                <?php endforeach; ?>
            </select>
            <input type="file" name="img_game" accept=".jpeg, .jpg, .png" required>
            <input type="submit" value="Ajouter" class="sizeup">
            <?php include('controllers/create/createGame.php') ?>
        </form>
        <form action="#" method="POST" enctype="multipart/form-data"> <!--Modfication d'un jeu de la BDD-->
            <h3>Modifier jeu</h3>
            <p>choisissez le jeu à modifier</p>
            <select name="modif_nom_game" required>
                <option disabled selected>Selectioner un jeu</option>
                <?php
                    require "./controllers/read/readAllGame.php";
                    foreach ($totalGame as $game) : 
                ?>
                <option><?= $game["nom_game"]?></option>
                <?php endforeach; ?>
            </select>
            <p>Indiquer les nouvelles Informations</p>
            <input type="text" name="new_nom_game" placeholder="Non du jeu" required>
            <input type="date" name="modif_date_game" required>
            <input type="text" name="modif_description_game" placeholder="Description" required>
            <select name="modif_id_editeur" required>
                <option disabled selected>Selectioner un éditeur</option>
                <?php
                    require "./controllers/read/readAllEditeur.php";
                    foreach ($editeurs as $editeur) : 
                ?>
                <option><?= $editeur["nom_editeur"]?></option>
                <?php endforeach; ?>
            </select>
            <input type="file" name="modif_img_game" accept=".jpeg, .jpg, .png" required>
            <input type="submit" value="Modifier" class="sizeup">
            <?php include('controllers/update/updateGame.php') ?>
        </form>
        <form action="#" method="POST"> <!--Supresion d'un jeu-->
            <h3>Supprimer Jeu</h3>
            <select name="nom_game2" required>
                <option disabled selected>Selectioner un jeu</option>
                <?php
                    require "./controllers/read/readAllGame.php";
                    foreach ($totalGame as $game) : 
                ?>
                <option><?= $game["nom_game"]?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Supprimer" class="sizeup">
            <?php include('controllers/delete/deleteGame.php') ?>
        </form>
    </div>
    <h2>Gestion Editeur</h2>
    <div>
        <form action="#" method="POST"> <!--Ajout d'un editeur a la DB-->
            <h3>Ajouter Editeur</h3>
            <input type="text" name="nom_editeur" placeholder="Nom Editeur" required>
            <input type="submit" value="Ajouter" class="sizeup">
            <?php include('controllers/create/createEditeur.php') ?>
        </form>
        <form action="#" method="POST"> <!--Modification editeur-->
            <h3>Modifier Editeur</h3>
            <select name="modif_nom_editeur" required>
                <option disabled selected>Selectioner l'éditeur à modifier</option>
                <?php
                    require "./controllers/read/readAllEditeur.php";
                    foreach ($editeurs as $editeur) : 
                ?>
                <option><?= $editeur["nom_editeur"]?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="new_nom_editeur" placeholder="Entrer nouveau nom éditeur" required>
            <input type="submit" value="Modifier" class="sizeup">
            <?php include('controllers/update/updateEditeur.php') ?>
        </form>
        <form action="#" method="POST"> <!--Supresion d'un editeur-->
            <h3>Supprimer editeur</h3>
            <select name="nom_editeur2" required>
                <option disabled selected>Selectioner un éditeur</option>
                <?php
                    require "./controllers/read/readAllEditeur.php";
                    foreach ($editeurs as $editeur) : 
                ?>
                <option><?= $editeur["nom_editeur"]?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Supprimer" class="sizeup">
            <?php include('controllers/delete/deleteEditeur.php') ?>
        </form>
    </div>
    <h2>Gestion News</h2>
    <div>
        <form action="#" method="POST"> <!--Création news-->
            <h3>Ecrire News</h3>
            <input type="text" name="titre_news" placeholder="Titre" required>
            <input type="submit" value="Créer" class="sizeup"><br>
            <textarea name="contenu_news" rows="10" placeholder="Contenu" required></textarea>
            <?php include('controllers/create/createNews.php') ?>
        </form>
        <form action="#" method="POST"> <!--Modification news-->
            <h3>Modifier News</h3>
            <p>choisissez la news à modifier</p>
            <select name="modif_nom_news" required>
                <option disabled selected>Selectioner une news</option>
                <?php
                    require "./controllers/read/readAllNews.php";
                    foreach ($news as $new) : 
                ?>
                <option><?= $new["titre_news"]?></option>
                <?php endforeach; ?>
            </select>
            <p>Indiquer les nouvelles Informations</p>
            <input type="text" name="modif_titre_news" placeholder="Titre" required>
            <input type="submit" value="Modifier" class="sizeup"><br>
            <textarea name="modif_contenu_news" rows="10" placeholder="Contenu" required></textarea>
            <?php include('controllers/update/updateNews.php') ?>
        </form>
        <form action="#" method="POST"> <!--Supresion news-->
            <h3>Supprimer News</h3>
            <select name="nom_news" required>
                <option disabled selected>Selectioner une news</option>
                <?php
                    require "./controllers/read/readAllNews.php";
                    foreach ($news as $new) : 
                ?>
                <option><?= $new["titre_news"]?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Supprimer" class="sizeup">
            <?php include('controllers/delete/deleteNews.php') ?>
        </form>
    </div>
    <h2>Gestion Rôles</h2>
    <div>
        <form action="#" method="POST"> <!--Modification rôle utilisateur-->
            <h3>Modifier rôle utilisateur</h3>
            <select name="user" required>
                <option disabled selected>Selectioner un utilisateur</option>
                <?php
                    require "./controllers/read/readAllUser.php";
                    foreach ($users as $user) : 
                ?>
                <option><?= $user["pseudo_user"]?></option>
                <?php endforeach; ?>
            </select>
            <select name="role" required>
                <option disabled selected>Attribuer un rôle</option>
                <?php
                    require "./controllers/read/readAllRole.php";
                    foreach ($roles as $role) : 
                ?>
                <option><?= $role["type_role"]?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Modifier" class="sizeup">
            <?php include('controllers/update/updateRoleUser.php') ?>
        </form>
    </div>
    <a href="#admin" id="up">Retour Haut de page <i class="fas fa-arrow-up"></i></a>
</div>
<aside></aside>

<?php
$title = "Gestion Admin";
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