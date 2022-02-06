<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
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
                    include('controllers/connected.php');
                ?>
            </div>
            <div id="nav2">
                <div>
                    <div><a href="<?=URL?>accueil"><i class="fas fa-home"></i></a></div>
                    <div><a href="<?=URL?>jeux">Jeux</a></div>
                    <div><a href="<?=URL?>liste" id="active">Liste</a></div>
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
            <div id="userStat"> <!--User summary-->
                <?php //Affichage image de profil utilisateur
                    if($_SESSION && $_SESSION['image']){
                        echo '<img src="'.$_SESSION['image'].'" alt="Image de profil" height=250px>';
                    }
                    else{
                        echo '<img src="images/img_users/default_user.png" alt="Image de profil" height=250px>';
                    }
                ?>
                <div>
                    <h2><i class="fas fa-user"></i>
                    <?php 
                        if($_SESSION){
                            echo $_SESSION['pseudo'];
                        }
                        else{
                            echo "Nom Utilisateur : ";
                        }
                    ?></h2>
                    <table>
                        <?php require "./controllers/readSummaryUser.php"; ?>
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
                        <th>Non du jeu</th>
                        <th>Editeur</th>
                        <th>Date de sortie</th>
                        <th>Temps de jeu</th>
                        <th>Succès</th>
                        <th>Note</th>
                    </tr>
                    <?php
                        require "./controllers/readCompleter.php";
                        foreach ($listGameUser as $completer) : 
                    ?>
                    <tr>
                        <?php 
                            require "./controllers/readList.php"; 
                        ?>
                        <td><a href="<?=URL?>jeux/description/<?= $completer["id_game"]?>"><?= $idGame["nom_game"]?></a></td>
                        <td><?= $idEditeur["nom_editeur"]?></td>
                        <td><?= $idGame["date_game"]?></td>
                        <td><?= $completer["temps_completer"]?></td>
                        <td><?= $completer["achievement_completer"]?></td>
                        <td><?= $completer["note_completer"]?> / 10</td>
                    </tr>
                    <?php endforeach; ?>
                </table>
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