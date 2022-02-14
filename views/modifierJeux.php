<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un jeu</title>
    <link rel="stylesheet" href="<?=URL?>styles/admin.css">
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
                    <div><a href="<?=URL?>accueil"><i class="fas fa-home"></i></a></div>
                    <div><a href="<?=URL?>jeux">Jeux</a></div>
                    <div><a href="<?=URL?>liste/<?= $_SESSION["id"] ?>" id="active">Liste</a></div>
                    <div><a href="<?=URL?>option">Option</a></div>
                    <?php if($_SESSION && $_SESSION['role'] == 2){echo "<div><a href=\"".URL."admin\">Admin</a></div>";}?>
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
                <?php else : ?>
                <h4>Vous n'avez aucun jeu dans votre liste</h4>
                <?php endif ?>
            </div>
        </div>
        <aside></aside>
    </div>
    <footer>
        <a href="https://twitter.com"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="https://facebook.com"><i class="fab fa-facebook-f"></i> facebook</a>
        <a href="https://youtube.com"><i class="fab fa-youtube"></i> Youtube</a>
        <a href="https://github.com/Dimensioo"><i class="fab fa-github"></i> GitHub</a>
    </footer>
</body>
</html>