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
                    if(isset($_SESSION["pseudo"])) { //afichage quand utilisateur connéctée
                        echo "<div><p>Bienvenue ", $_SESSION['pseudo'], "</p></div>";
                        echo "<div class=\"sizeup\"><a href=\"".URL."logout\">Déconnexion</a></div>";
                    }
                    else { //afichage quand utilisateur déconectée
                        echo "<div class=\"sizeup\"><a href=\"".URL."connexion\">Se connecter / S'inscrire</a></div>";
                    } 
                ?>
            </div>
            <div id="nav2">
                <div>
                    <div><a href="<?=URL?>accueil" id="active"><i class="fas fa-home"></i></a></div>
                    <div><a href="<?=URL?>jeux">Jeux</a></div>
                    <?php 
                        if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."liste/".$_SESSION["id"]."\">Liste</a></div>";}
                        else{echo "<div><a href=\"".URL."liste\">Liste</a></div>";}
                        if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."option\">Option</a></div>";}
                        if($_SESSION && $_SESSION['role'] == 2){echo "<div><a href=\"".URL."admin\">Admin</a></div>";}
                    ?>
                </div>
                <div>
                    <form action="<?=URL?>recherche/" method="POST">
                        <div><input type="search" name="search" placeholder="Rechercher un jeu" required></div>
                        <div><input type="submit" value="Rechercher"></div>
                    </form>
                </div>
            </div>
        </nav>  
    </header>
    <div id=container>
        <aside></aside>
        <div>
            <div id="body1">
                <section id="release"> <!--Last released game-->
                    <h2>Dernier ajout </h2>
                    <div>
                        <?php
                            require "./controllers/read/readLastGame.php";
                            foreach ($lastGames as $lastGame) :
                        ?>
                        <div class="sizeup"><a href="<?=URL?>jeux/description/<?= $lastGame["id_game"]?>"> 
                            <img src="<?= $lastGame["img_game"] ?>" alt="image du jeu" height="200px" width="150px">
                            <h3><?= $lastGame["nom_game"] ?></h3>
                        </a></div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <section id="news"> <!--Newsfeed-->
                    <h2>News <i class="far fa-newspaper"></i></h2>
                    <?php
                        require "./controllers/read/readAllNews.php";
                        foreach ($news as $new) : 
                    ?>
                    <h3><?= $new['titre_news'] ?></h3>
                    <p><?= $new['contenu_news'] ?></p>
                    <?php endforeach; ?>
                </section>
            </div>
            <div id="body2">
                <section id="ranking"> <!--Best ranked game-->
                    <h2>Classement <i class="fas fa-trophy"></i></h2>
                    <div>
                        <?php 
                            include "./controllers/read/readTop5.php";
                            foreach($rank as $game) :
                        ?>
                        <div><a href="<?=URL?>jeux/description/<?= $game["id_game"]?>">
                            <img src="<?= $game["img_game"] ?>" alt="image du jeu" class="sizeup" height="150px" width="100px"></a>
                            <h3><?= $game['nom_game'] ?></h3>
                           </div>
                        <?php endforeach;?>
                    </div>
                    <p><a href="<?=URL?>classement/">Voir plus...</a></p>
                </section>
            </div>
        </div>
        <aside></aside>
    </div>
    <footer>
        <a href="https://github.com/Dimensioo"><i class="fab fa-github"></i> GitHub</a>
    </footer>
</body>
</html>