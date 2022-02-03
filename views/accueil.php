<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="<?=URL?>styles/projet.css">
    <link rel="stylesheet" href="<?=URL?>styles/header.css">
    <link rel="stylesheet" href="<?=URL?>styles/accueil.css">
    <link rel="stylesheet" href="<?=URL?>styles/anim.css">
    <link rel="stylesheet" href="<?=URL?>styles/display.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="<?=URL?>images/favicon.png"/>
    <script src="https://kit.fontawesome.com/3df32f415a.js" crossorigin="anonymous"></script>
    <script src="<?=URL?>js/displayRanking.js" defer></script>
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
                    <div><a href="<?=URL?>accueil" id="active"><i class="fas fa-home"></i></a></div>
                    <div><a href="<?=URL?>jeux">Jeux</a></div>
                    <div><a href="<?=URL?>liste">Liste</a></div>
                    <?php if($_SESSION && $_SESSION["pseudo"]){
                        echo "<div><a href=\"".URL."option\">Option</a></div>";}?>
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
            <div id="body1">
                <section id="release"> <!--Last released game-->
                    <h2>Dernières sortie</h2>
                    <div>
                        <div class="sizeup"> 
                            <img src="https://picsum.photos/150/200?random=1" alt="image du jeu">
                            <h3>Titre jeu</h3>
                        </div>
                        <div class="sizeup">
                            <img src="https://picsum.photos/150/200?random=2" alt="image du jeu">
                            <h3>Titre jeu</h3>
                        </div>
                        <div class="sizeup">
                            <img src="https://picsum.photos/150/200?random=3" alt="image du jeu">
                            <h3>Titre jeu</h3>
                        </div>
                        <div class="sizeup">
                            <img src="https://picsum.photos/150/200?random=4" alt="image du jeu">
                            <h3>Titre jeu</h3>
                        </div>
                        <div class="sizeup">
                            <img src="https://picsum.photos/150/200?random=5" alt="image du jeu">
                            <h3>Titre jeu</h3>
                        </div>
                    </div>
                </section>
                <section id="news"> <!--Newsfeed-->
                    <h2>News <i class="far fa-newspaper"></i></h2>
                    <?php
                        include_once('config.php');
                        $database = new Database();
                        $db = $database->getConnection();
                        $req = $db->prepare("SELECT * FROM news");
                        $req->execute();
                        while($donnees = $req->fetch()){
                            echo '<h3>'.$donnees['titre_news'].'</h3>
                            <p>'.$donnees['contenu_news'].'</p>';
                        }
                    ?>
                </section>
            </div>
            <div id="body2">
                <section id="ranking"> <!--Best ranked game-->
                    <h2>Classement <i class="fas fa-trophy"></i></h2>
                    <div>
                        <div>
                            <img src="https://picsum.photos/90/120?random=1" alt="image du jeu" class="sizeup">
                            <h3>1 Titre jeu</h3>
                        </div>
                        <div>
                            <img src="https://picsum.photos/90/120?random=2" alt="image du jeu" class="sizeup">
                            <h3>2 Titre jeu</h3>
                        </div>
                        <div>
                            <img src="https://picsum.photos/90/120?random=3" alt="image du jeu" class="sizeup">
                            <h3>3 Titre jeu</h3>
                        </div>
                        <div>
                            <img src="https://picsum.photos/90/120?random=4" alt="image du jeu" class="sizeup">
                            <h3>4 Titre jeu</h3>
                        </div>
                        <div>
                            <img src="https://picsum.photos/90/120?random=5" alt="image du jeu" class="sizeup">
                            <h3>5 Titre jeu</h3>
                        </div>
                        <section class="invisible" id="rank6">
                            <img src="https://picsum.photos/90/120?random=6" alt="image du jeu" class="sizeup">
                            <h3>6 Titre jeu</h3>
                        </section>
                        <section class="invisible" id="rank7">
                            <img src="https://picsum.photos/90/120?random=7" alt="image du jeu" class="sizeup">
                            <h3>7 Titre jeu</h3>
                        </section>
                        <section class="invisible" id="rank8">
                            <img src="https://picsum.photos/90/120?random=8" alt="image du jeu" class="sizeup">
                            <h3>8 Titre jeu</h3>
                        </section>
                        <section class="invisible" id="rank9">
                            <img src="https://picsum.photos/90/120?random=9" alt="image du jeu" class="sizeup">
                            <h3>9 Titre jeu</h3>
                        </section>
                        <section class="invisible" id="rank10">
                            <img src="https://picsum.photos/90/120?random=10" alt="image du jeu" class="sizeup">
                            <h3>10 Titre jeu</h3>
                        </section>
                    </div>
                    <p><a onClick="displayRank()" href="#" id="buttonRank">Voir plus...</a></p>
                </section>
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