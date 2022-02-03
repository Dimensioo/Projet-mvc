<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Option</title>
    <link rel="stylesheet" href="<?=URL?>styles/projet.css">
    <link rel="stylesheet" href="<?=URL?>styles/header.css">
    <link rel="stylesheet" href="<?=URL?>styles/autre.css">
    <link rel="stylesheet" href="<?=URL?>styles/anim.css">
    <link rel="stylesheet" href="<?=URL?>styles/posFooter.css">
    <link rel="stylesheet" href="<?=URL?>styles/display.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/png" href="<?=URL?>images/favicon.png"/>
    <script src="https://kit.fontawesome.com/3df32f415a.js" crossorigin="anonymous"></script>
    <script src="<?=URL?>js/displayOption.js" defer></script>
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
                    <div><a href="<?=URL?>option" id="active">Option</a></div>
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
        <div id="option">
            <h2>Informations du compte</h2> <!--Resumé information du compte-->
            <div>
                <div>
                    <p><b>Pseudo : </b><?php if($_SESSION){echo $_SESSION['pseudo'];}?></p>
                    <p><b>Adresse E-mail : </b><?php if($_SESSION){echo $_SESSION['email'];}?></p>
                    <p><b>Inscrit depuis le :</b></p>
                </div>
                <div>
                    <?php //Affichage image de profil utilisateur
                        if($_SESSION){
                            echo '<img src="images/img_users/'.$_SESSION['image'].'" alt="Image de profil" class="sizeup" height=150px>';
                        }
                        else{
                            echo '<img src="images/img_users/default_user.png" alt="Image de profil" class="sizeup" height=150px>';
                        }
                    ?>
                </div>
            </div>
            <h2>Modifier Informations <i class="fas fa-cog"></i></h2> <!--Bouton d'option pour modifier informations du compte-->
            <div>
                <a onClick="change_pseudo()" href="#" class="sizeup">Modifier pseudo</a>
                <a onClick="change_pic()" href="#" class="sizeup">Modifier image de profil</a>
                <a onClick="change_mail()" href="#" class="sizeup">Modifier adrese E-mail</a>
                <a onClick="change_mdp()" href="#" class="sizeup">Modifier mot de passe</a>
                <a onClick="delete_account()" href="#" class="sizeup">Suprimer mon compte <i class="far fa-trash-alt"></i></a>
            </div>            
            <form action="" method="post" class="invisible" id="change_pseudo"> <!--formulaire modification pseudo -->
                <label for="new_pseudo">Nouveau pseudo</label><br>
                <input type="text" name="new_pseudo" required><br>
                <label for="verif_mdp_pseudo">Entrer votre mot de passe</label><br>
                <input type="password" name="verif_mdp_pseudo" required><br>
                <input type="submit" value="Modifier Pseudo" class="sizeup">
                <?php include('controllers/updatePseudo.php') ?>
            </form>
            <form action="" method="post" class="invisible" id="change_pic"> <!--formulaire modification image de profil -->
                <label for="new_pic">Nouvelle image de profil</label><br>
                <input type="file" accept=".jpg, .png" name="new_pic" required><br>
                <input type="submit" value="Modifier Image de profil" class="sizeup">
            </form>
            <form action="" method="post" class="invisible" id="change_mail"> <!--formulaire modification e-mail -->
                <label for="new_email">Nouveau E-mail</label><br>
                <input type="text" name="new_email" required><br>
                <label for="verif_mdp_mail">Entrer votre mot de passe</label><br>
                <input type="password" name="verif_mdp_mail" required><br>
                <input type="submit" value="Modifier E-mail" class="sizeup">
                <?php include('controllers/updateMail.php') ?>
            </form>
            <form action="" method="post" class="invisible" id="change_mdp"> <!--formulaire modification mot de passe -->
                <label for="verif_mdp">Ancien mot de passe</label><br>
                <input type="password" name="verif_mdp" required><br>
                <label for="new_mdp">Nouveau mot de passe</label><br>
                <input type="password" name="new_mdp" required><br>
                <input type="submit" value="Modifier mot de passe" class="sizeup">
                <?php include('controllers/updatePassword.php') ?>
            </form>
            <form action="" method="post" class="invisible" id="delete_account"> <!--formulaire supression du compte -->
                <label for="verif_del_mdp">Entrer votre mot de passe</label><br>
                <input type="password" name="verif_del_mdp" required><br>
                <input type="submit" value="Suprimer mon compte" class="sizeup">
                <?php include('controllers/deleteUser.php') ?>
            </form>
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