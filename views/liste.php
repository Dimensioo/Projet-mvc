<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste - <?= $user['pseudo_user'] ?></title>
    <link rel="stylesheet" href="<?=URL?>styles/projet.css">
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
                    <?php 
                        if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."liste/".$_SESSION["id"]."\" id=\"active\">Liste</a></div>";}
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
            <div id="userStat"> <!--User summary-->
                <img src="<?php if(!empty($url[2])){echo "../";}?>../<?= $user['img_user'] ?>" alt="Image de profil" height=250px><!-- Affichage image de profil utilisateur -->
                <div>
                    <h2><i class="fas fa-user"></i> <?= $user['pseudo_user'] ?></h2>
                    <table>
                        <?php require "./controllers/read/readSummaryUser.php"; ?>
                        <tr>
                            <td >Nombre de jeux :</td>
                            <td>Nombre total d'heures joués :</td>
                        </tr>
                        <tr>
                            <td class="bold"><?= $totalGame ?></td>
                            <td class="bold"><?= $playTime ?> h</td>
                        </tr>
                        <tr>
                            <td>Succès / Achievements obtenues :</td>
                            <td>Note moyenne données :</td>
                        </tr>
                        <tr>
                            <td class="bold"><?= $achievements ?></td>
                            <td class="bold"><?= round($avgNote, 2) ?> / 10</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="userList"> <!--User game list-->
                <table> 
                    <tr>
                        <th><a href="<?=URL?>liste/<?= $url[1] ?>/name">Non du jeu <?php if(!empty($url[2]) && $url[2]=="name"){echo "<i class=\"fa fa-caret-down\"></i>";} ?></a></th>
                        <th><a href="<?=URL?>liste/<?= $url[1] ?>/editeur">Editeur <?php if(!empty($url[2]) && $url[2]=="editeur"){echo "<i class=\"fa fa-caret-down\"></i>";} ?></a></th>
                        <th><a href="<?=URL?>liste/<?= $url[1] ?>/date">Date de sortie <?php if(!empty($url[2]) && $url[2]=="date"){echo "<i class=\"fa fa-caret-down\"></i>";} ?></a></th>
                        <th><a href="<?=URL?>liste/<?= $url[1] ?>/time">Temps de jeu <?php if(!empty($url[2]) && $url[2]=="time"){echo "<i class=\"fa fa-caret-down\"></i>";} ?></a></th>
                        <th><a href="<?=URL?>liste/<?= $url[1] ?>/achievement">Succès <?php if(!empty($url[2]) && $url[2]=="achievement"){echo "<i class=\"fa fa-caret-down\"></i>";} ?></a></th>
                        <th><a href="<?=URL?>liste/<?= $url[1] ?>/note">Note <?php if(!empty($url[2]) && $url[2]=="note"){echo "<i class=\"fa fa-caret-down\"></i>";} ?></a></th>
                    </tr>
                    <?php
                        require "./controllers/read/readCompleter.php";
                        if(!empty($listGameUser)) :
                        foreach ($listGameUser as $completer) : 
                    ?>
                    <tr>
                        <?php require "./controllers/read/readList.php" ?>
                        <td><a href="<?=URL?>jeux/description/<?= $completer["id_game"]?>"><?= $completer["nom_game"]?></a></td>
                        <td><?= $idEditeur["nom_editeur"]?></td>
                        <td><?= $completer["date_game"]?></td>
                        <td><?= $completer["temps_completer"]?></td>
                        <td><?= $completer["achievement_completer"]?></td>
                        <td><?= $completer["note_completer"]?> / 10</td>
                    </tr>
                    <?php endforeach; endif; ?>
                </table><br>
            </div>
            <?php 
                if($url[1]==$_SESSION['id']){
                    echo "<div>
                        <a href=\"".URL."liste/modifier\" id=\"modify\" >Modifier un jeu</a>
                        <a href=\"".URL."liste/supprimer\" id=\"modify\" >Supprimer un jeu</a>
                    </div><br>";
                }
            ?>
        </div>
        <aside></aside>
    </div>
    <footer>
        <a href="https://github.com/Dimensioo"><i class="fab fa-github"></i> GitHub</a>
    </footer>
</body>
</html>