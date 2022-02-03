<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/autre.css">
    <link rel="stylesheet" href="../css/anim.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="../../images/favicon.png"/>
    <script src="https://kit.fontawesome.com/3df32f415a.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <div id="nav1">
                <div><h1>Game List <i class="fas fa-gamepad"></i></h1></div>
                <?php
                    include('../../REA6_backEnd/connected.php');
                ?>
            </div>
            <div id="nav2">
                <div>
                    <div><a href="accueil.php"><i class="fas fa-home"></i></a></div>
                    <div><a href="jeux.php">Jeux</a></div>
                    <div><a href="liste.php">Liste</a></div>
                    <div><a href="option.php">Option</a></div>
                    <div><a href="gestionAdmin.php" id="active">Admin</a></div>
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
                <form action="#" method="post"> <!--Ajout d'un jeu a la DB-->
                    <h3>Ajouter Jeu</h3>
                    <input type="text" name="nom_game" placeholder="Non du jeu" required>
                    <input type="date" name="date_game" required>
                    <input type="text" name="description_game" placeholder="Description" required>
                    <select name="id_editeur" required>
                    <option>Selectioner un éditeur</option>
                        <?php
                            include_once('../../REA6_backEnd/config.php');
                            $database = new Database();
                            $db = $database->getConnection();
                            $req = $db->prepare("SELECT * FROM editeur");
                            $req->execute();
                            while($donnees = $req->fetch()){
                                echo '<option>'.$donnees['nom_editeur'].'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Ajouter" class="sizeup">
                    <?php include('../../REA6_backEnd/createGame.php') ?>
                </form>
                <form action="#" method="post"> <!--Supresion d'un jeu-->
                    <h3>Suprimer Jeu</h3>
                    <select name="nom_game2" required>
                        <option>Selectioner un jeu</option>
                        <?php
                            include_once('../../REA6_backEnd/config.php');
                            $database = new Database();
                            $db = $database->getConnection();
                            $req = $db->prepare("SELECT * FROM game");
                            $req->execute();
                            while($donnees = $req->fetch()){
                                echo '<option>'.$donnees['nom_game'].'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Suprimer" class="sizeup">
                    <?php include('../../REA6_backEnd/deleteGame.php') ?>
                </form>
            </div>
            <h2>Gestion Editeur</h2>
            <div>
                <form action="#" method="post"> <!--Ajout d'un editeur a la DB-->
                    <h3>Ajouter Editeur</h3>
                    <input type="text" name="nom_editeur" placeholder="Nom Editeur" required>
                    <input type="submit" value="Ajouter" class="sizeup">
                    <?php include('../../REA6_backEnd/createEditeur.php') ?>
                </form>
                <form action="#" method="post"> <!--Supresion d'un editeur-->
                    <h3>Suprimer editeur</h3>
                    <select name="nom_editeur2" required>
                        <option>Selectioner un editeur</option>
                        <?php
                            include_once('../../REA6_backEnd/config.php');
                            $database = new Database();
                            $db = $database->getConnection();
                            $req = $db->prepare("SELECT * FROM editeur");
                            $req->execute();
                            while($donnees = $req->fetch()){
                                echo '<option>'.$donnees['nom_editeur'].'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Suprimer" class="sizeup">
                    <?php include('../../REA6_backEnd/deleteEditeur.php') ?>
                </form>
            </div>
            <h2>Gestion News</h2>
            <div>
                <form action="#" method="post"> <!--Création news-->
                    <h3>Ecrire News</h3>
                    <input type="text" name="titre_news" placeholder="Titre" required>
                    <input type="submit" value="Créer" class="sizeup"><br>
                    <textarea name="contenu_news" cols="120" rows="10" placeholder="Contenu" required></textarea>
                    <?php include('../../REA6_backEnd/createNews.php') ?>
                </form>
                <form action="#" method="post"> <!--Supresion news-->
                    <h3>Suprimer News</h3>
                    <select name="nom_news" required>
                        <option>Selectioner une news</option>
                        <?php
                            include_once('../../REA6_backEnd/config.php');
                            $database = new Database();
                            $db = $database->getConnection();
                            $req = $db->prepare("SELECT * FROM news");
                            $req->execute();
                            while($donnees = $req->fetch()){
                                echo '<option>'.$donnees['titre_news'].'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Suprimer" class="sizeup">
                    <?php include('../../REA6_backEnd/deleteNews.php') ?>
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