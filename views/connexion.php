<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
                <?php include('controllers/connected.php') ?>
            </div>
            <div id="nav2">
                <div>
                    <div><a href="<?=URL?>accueil"><i class="fas fa-home"></i></a></div>
                    <div><a href="<?=URL?>jeux">Jeux</a></div>
                    <?php 
                        if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."liste/".$_SESSION["id"]."\">Liste</a></div>";}
                        else{echo "<div><a href=\"".URL."liste\">Liste</a></div>";}
                        if($_SESSION && $_SESSION["pseudo"]){echo "<div><a href=\"".URL."option\">Option</a></div>";}
                        if($_SESSION && $_SESSION['role'] == 2){echo "<div><a href=\"".URL."admin\">Admin</a></div>";}
                    ?>
                </div>
                <div>
                    <div><input type="search" name="recherche" placeholder="Rechercher un jeu"></div>
                    <div><button><i class="material-icons">search</i></button></div>
                </div>
            </div>
        </nav>  
    </header>
    <div id="container">
        <aside></aside>
        <div>
            <div id=formulaire>
                <form id=connexion action="#" method="POST"> <!--Log in-->
                    <legend><h2>Se connecter</h2></legend>
                    <label for="conn_email_user">Adresse E-mail :</label><br>
                    <input type="email" id="conn_mail" name="conn_email_user" required><br>
                    <label for="con_mdp_user">Mot de passe :</label><br>
                    <input type="password" id="conn_mdp" name="conn_mdp_user" required><br>
                    <input type="submit" value="Se connecter" class="sizeup">
                    <?php include('controllers/login.php') ?>
                </form>
                <form id=creationCompte action="#" method="POST"> <!--Create Account-->
                    <legend><h2>Creer votre compte</h2></legend>
                    <label for="pseudo_user">Pseudo :</label><br>
                    <input type="text" id="pseudo" name="pseudo_user" required><br>
                    <label for="email_user">Adresse E-mail :</label><br>
                    <input type="email" id="mail" name="email_user" required><br>
                    <label for="mdp_user">Mot de passe :</label><br>
                    <input type="password" id="mdp" name="mdp_user" required><br>
                    <input type="submit" value="Créer un compte" class="sizeup">
                    <?php include('controllers/createUser.php') ?>
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