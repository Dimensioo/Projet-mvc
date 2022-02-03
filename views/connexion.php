<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/projet.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/autre.css">
    <link rel="stylesheet" href="../css/anim.css">
    <link rel="stylesheet" href="../css/posFooter.css">
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
                    <?php if($_SESSION){echo "<div><a href=\"option.php\">Option</a></div>";}?>
                    <?php if($_SESSION && $_SESSION['role'] == 2){echo "<div><a href=\"gestionAdmin.php\">Admin</a></div>";}?>
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
                    <?php include('../../REA6_backEnd/login.php') ?>
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
                    <?php include('../../REA6_backEnd/createUser.php') ?>
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