<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Admin</title>
    <link rel="stylesheet" href="<?=URL?>styles/admin.css">
    <link rel="stylesheet" href="<?=URL?>styles/header.css">
    <link rel="stylesheet" href="<?=URL?>styles/autre.css">
    <link rel="stylesheet" href="<?=URL?>styles/anim.css">
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
                    <div><a href="<?=URL?>jeux">Jeux</a></div>
                    <div><a href="<?=URL?>liste">Liste</a></div>
                    <div><a href="<?=URL?>option">Option</a></div>
                    <div><a href="<?=URL?>admin" id="active">Admin</a></div>
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
        <div id="admin">
            <h2>Gestion Jeux</h2> <!--Resumé information du compte-->
            <div>
                <form action="#" method="post" enctype="multipart/form-data"> <!--Ajout d'un jeu a la DB-->
                    <h3>Ajouter Jeu</h3>
                    <input type="text" name="nom_game" placeholder="Non du jeu" required>
                    <input type="date" name="date_game" required>
                    <input type="text" name="description_game" placeholder="Description" required>
                    <select name="id_editeur" required>
                    <option>Selectioner un éditeur</option>
                        <?php
                            require "./controllers/readAllEditeur.php";
                            foreach ($editeurs as $editeur) : 
                        ?>
                        <option><?= $editeur["nom_editeur"]?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                    <input type="file" name="img_game" accept=".jpg, .png" required>
                    <input type="submit" value="Ajouter" class="sizeup">
                    <?php include('controllers/createGame.php') ?>
                </form>
                <form action="#" method="post"> <!--Supresion d'un jeu-->
                    <h3>Suprimer Jeu</h3>
                    <select name="nom_game2" required>
                        <option>Selectioner un jeu</option>
                        <?php
                            require "./controllers/readAllGame.php";
                            foreach ($games as $game) : 
                        ?>
                        <option><?= $game["nom_game"]?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Suprimer" class="sizeup">
                    <?php include('controllers/deleteGame.php') ?>
                </form>
            </div>
            <h2>Gestion Editeur</h2>
            <div>
                <form action="#" method="post"> <!--Ajout d'un editeur a la DB-->
                    <h3>Ajouter Editeur</h3>
                    <input type="text" name="nom_editeur" placeholder="Nom Editeur" required>
                    <input type="submit" value="Ajouter" class="sizeup">
                    <?php include('controllers/createEditeur.php') ?>
                </form>
                <form action="#" method="post"> <!--Supresion d'un editeur-->
                    <h3>Suprimer editeur</h3>
                    <select name="nom_editeur2" required>
                        <option>Selectioner un editeur</option>
                        <?php
                            require "./controllers/readAllEditeur.php";
                            foreach ($editeurs as $editeur) : 
                        ?>
                        <option><?= $editeur["nom_editeur"]?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Suprimer" class="sizeup">
                    <?php include('controllers/deleteEditeur.php') ?>
                </form>
            </div>
            <h2>Gestion News</h2>
            <div>
                <form action="#" method="post"> <!--Création news-->
                    <h3>Ecrire News</h3>
                    <input type="text" name="titre_news" placeholder="Titre" required>
                    <input type="submit" value="Créer" class="sizeup"><br>
                    <textarea name="contenu_news" cols="120" rows="10" placeholder="Contenu" required></textarea>
                    <?php include('controllers/createNews.php') ?>
                </form>
                <form action="#" method="post"> <!--Supresion news-->
                    <h3>Suprimer News</h3>
                    <select name="nom_news" required>
                        <option>Selectioner une news</option>
                        <?php
                            require "./controllers/readAllNews.php";
                            foreach ($news as $new) : 
                        ?>
                        <option><?= $new["titre_news"]?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Suprimer" class="sizeup">
                    <?php include('controllers/deleteNews.php') ?>
                </form>
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