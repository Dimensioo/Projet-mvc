<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description Jeux</title>
    <link rel="stylesheet" href="<?=URL?>styles/projet.css">
    <link rel="stylesheet" href="<?=URL?>styles/header.css">
    <link rel="stylesheet" href="<?=URL?>styles/autre.css">
    <link rel="stylesheet" href="<?=URL?>styles/anim.css">
    <link rel="stylesheet" href="<?=URL?>styles/posFooter.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="<?=URL?>images/favicon.png"/>
    <script src="https://kit.fontawesome.com/3df32f415a.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
        <div id="nav1">
            <div><h1>Game List <i class="fas fa-gamepad"></i></h1></div>
            <?php
                include('controllers/connected.php');
            ?>
        </div>
        <div id="nav2">
            <div>
                <div><a href="<?=URL?>accueil"><i class="fas fa-home"></i></a></div>
                <div><a href="<?=URL?>jeux" id="active">Jeux</a></div>
                <div><a href="<?=URL?>liste">Liste</a></div>
                <?php if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."option\">Option</a></div>";}?>
                <?php if($_SESSION && $_SESSION['role'] == 2){echo "<div><a href=\"".URL."admin\">Admin</a></div>";}?>
                </div>
                <div>
                    <div><input type="search" name="recherche" placeholder="Rechercher un jeu"></div>
                    <div><button><i class="material-icons">search</i></button></div>
                </div>
            </div>
        </nav>
    </header>
    <div id=container>
        <aside></aside>
        <div>
            <div id="description"> <!--Page de description Jeu-->
                <div id="descriptionStat"> <!--1er colone avec image et stats-->
                    <div>
                        <img src="../../<?= $game["img_game"]?>" alt="<?= $game["nom_game"]?>" class="sizeup" width="200px">
                    </div>
                    <div>
                        <h3><i class="fas fa-star-half-alt"></i> Note :</h3>
                        <p>--/20</p>
                        <h3><i class="fas fa-trophy"></i> Classement :</h3>
                        <p>#12</p>
                        <h3>Nombre d'Utilisateur :</h3>
                        <p>12 700</p>
                    </div>
                </div>
                <div id="descriptionData"> <!--2eme colone avec informations-->
                    <div>
                        <h2><?= $game["nom_game"]?></h2>
                        <a href="<?=URL?>jeux/ajout/<?= $game["id_game"]?>" class="sizeup">Ajouter à votre liste</a>
                    </div>
                    <div>
                        <?php require "./controllers/readEditeur.php"; ?>
                        <h3>Editeur : <?= $editeur["nom_editeur"]?></h3>
                        <h3>Date de sortie : <?= $game["date_game"]?></h3>
                    </div>
                    <p><?= $game["description_game"] ?></p>
                </div>
            </div>
        </div>
        <aside></aside>
    </div>
    <footer>
        <a href="https://twitter.com"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="https://facebook.com"><i class="fab fa-facebook-f"></i> facebook</a>
        <a href="https://youtube.com"><i class="fab fa-youtube"></i> Youtube</a>
    </footer>
</body>
</html>