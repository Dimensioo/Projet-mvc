<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= $style ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="<?=URL?>images/favicon.png"/>
    <script src="https://kit.fontawesome.com/3df32f415a.js" crossorigin="anonymous"></script>
    <script src="<?=URL?>script/displayOption.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <div id="nav1">
                <div><h1>Game List <i class="fas fa-gamepad"></i></h1></div>
                <?php
                    if(isset($_SESSION["pseudo"])) { //affichage quand utilisateur connécté
                        echo "<div><p>Bienvenue ".$_SESSION['pseudo']."</p></div>";
                        echo "<div class=\"sizeup\"><a href=\"".URL."logout\">Déconnexion</a></div>";
                    }
                    else { //affichage quand utilisateur déconecté
                        echo "<div class=\"sizeup\"><a href=\"".URL."connexion\">Se connecter / S'inscrire</a></div>";
                    }
                ?>
            </div>
            <div id="nav2">
                <div>
                    <?php if(empty($url)){$url[0] = 'accueil';} ?>
                    <div><a href="<?=URL?>accueil" <?php if($url[0] && $url[0] == 'accueil'){echo 'id="active"';}?>><i class="fas fa-home"></i></a></div>
                    <div><a href="<?=URL?>jeux" <?php if($url[0] == 'jeux' || $url[0] == 'recherche' || $url[0] == 'classement'){echo 'id="active"';}?>>Jeux</a></div>
                    <?php
                        if($_SESSION && $_SESSION["pseudo"] && $url[0] != 'liste'){echo "<div><a href=\"".URL."liste/".$_SESSION["id"]."\">Liste</a></div>";}
                        else if($_SESSION && $_SESSION['pseudo'] && $url[0] == 'liste'){echo "<div><a href=\"".URL."liste/".$_SESSION["id"]."\" id=\"active\">Liste</a></div>";}
                        else{echo "<div><a href=\"".URL."liste\">Liste</a></div>";}
                        if($_SESSION && $_SESSION['pseudo'] && $url[0] != 'option'){echo "<div><a href=\"".URL."option\">Option</a></div>";}
                        if($_SESSION && $_SESSION["pseudo"] && $url[0] == 'option'){echo "<div><a href=\"".URL."option\" id=\"active\">Option</a></div>";}
                        if($_SESSION && $_SESSION['role'] == 2 && $url[0] != 'admin'){echo "<div><a href=\"".URL."admin\">Admin</a></div>";}
                        if($_SESSION && $_SESSION['role'] == 2 && $url[0] == 'admin'){echo "<div><a href=\"".URL."admin\" id=\"active\">Admin</a></div>";}
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
        <?= $content ?>
    </div>
    <footer>
        <a href="https://github.com/Dimensioo"><i class="fab fa-github"></i> GitHub</a>
    </footer>
</body>
</html>