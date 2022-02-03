<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Description Jeux</title>
        <link rel="stylesheet" href="../css/projet.css">
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
                        <div><a href="jeux.php" id="active">Jeux</a></div>
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
        <div id=container>
            <aside></aside>
            <div>
                <div id="description"> <!--Page de description Jeu-->
                    <div id="descriptionStat"> <!--1er colone avec image et stats-->
                        <div>
                            <img src="https://picsum.photos/200/250?random=1" alt="image du jeu" class="sizeup">
                        </div>
                        <div>
                            <h3><i class="fas fa-star-half-alt"></i> Note :</h3>
                            <p>--/20</p>
                            <h3><i class="fas fa-trophy"></i> Classement :</h3>
                            <p>#12</p>
                            <h3>Nombre d'Utilisateur :</h3>
                            <p>12 700</p>
                        </div>
                    </div>
                    <div id="descriptionData"> <!--2eme colone avec informations-->
                        <div>
                            <h2>Nom du jeu</h2>
                            <a href="#" class="sizeup">Ajouter à votre liste</a>
                        </div>
                        <div>
                            <h3>Editeur :</h3>
                            <h3>01/01/2000</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis dolor eum recusandae at commodi assumenda a repellendus ipsam? Iste praesentium porro alias cupiditate, quod fugit! Id voluptas, ipsam quibusdam nam commodi excepturi quia enim, aliquid cumque voluptatibus consequatur explicabo culpa esse dignissimos impedit minima veniam dolores vero, iusto asperiores cum quaerat fugit illo soluta. Obcaecati accusantium aut fuga eius saepe illum tempore rerum voluptas impedit rem molestias nulla sapiente praesentium delectus dolorem dignissimos laborum, porro provident? Cum magnam mollitia, autem sed non iusto? Commodi eum amet vero repudiandae voluptates laudantium suscipit et enim, porro maiores error quos! Sed doloremque itaque voluptate, ea magnam iusto eius vel repudiandae voluptates reiciendis! Placeat quis necessitatibus, facilis a, dolore esse reprehenderit adipisci fuga quisquam corporis soluta! Quam perspiciatis numquam recusandae adipisci. Rerum nisi dolorem rem quo ad magnam dignissimos vero omnis perferendis, voluptatem praesentium in itaque earum nam veritatis consequatur officiis quos, ea neque enim accusamus amet? Neque iure quia ipsam molestiae quisquam officiis nulla, cumque excepturi suscipit officia animi expedita ratione dicta natus obcaecati voluptas maiores a nemo rem dolorum ab voluptate nihil! Distinctio ad fugit incidunt, vitae totam deleniti odio aut accusantium eos. Eveniet dolore obcaecati expedita, corporis labore amet accusamus fugiat ullam dolorem iusto quas laboriosam debitis quibusdam facilis mollitia voluptatem minus placeat officia doloremque? Aspernatur iste sint quam! Qui facilis voluptate, sit in est, laboriosam perferendis esse inventore unde hic cum tempora facere. Voluptatem, voluptatibus dolor reiciendis quae ad illum autem quo omnis totam vero, sunt animi exercitationem libero pariatur deleniti beatae laborum est, error reprehenderit nihil. Odio nostrum perspiciatis officiis error natus sint quaerat eius dolore culpa nulla at exercitationem, consectetur dolor delectus nobis necessitatibus optio magnam non rerum sequi harum reprehenderit cupiditate? Nobis omnis mollitia eos, atque unde possimus eaque officia nisi aliquid rem est! Velit alias deleniti dolores reiciendis nostrum consequuntur accusantium quibusdam. Placeat eos error qui modi accusantium molestiae asperiores laudantium ratione corrupti, voluptate libero dicta amet at facilis. Esse, minus quo dolorem harum non ipsum nam, debitis assumenda nisi laboriosam in illum voluptatibus itaque incidunt nostrum tempora repellendus fugit nesciunt! Accusantium doloribus totam maiores velit, quam sequi aspernatur suscipit quidem deserunt harum cum officiis. Dolorum minus ducimus ex nulla iste quis praesentium animi, aperiam quo ea ipsa ut libero vel cum, ipsam consectetur dolores dolore reiciendis quaerat ratione obcaecati repudiandae! Minima, ducimus! Architecto tempora sunt magni fugit tempore rem consectetur aut eos maxime numquam. Itaque cupiditate, adipisci esse illo impedit pariatur. Aut, provident ullam. Impedit blanditiis voluptate minus excepturi inventore harum alias ut placeat, rem quam provident ipsam soluta, laboriosam quo eius id magnam quae. Dolorum id a ipsum accusamus blanditiis quas quisquam at vero, enim nostrum esse iste libero voluptatum qui? Nam aut ullam mollitia veniam, rem voluptatem perferendis, assumenda corporis sit minus quae inventore adipisci eos earum eius. Non saepe fugiat culpa provident illo ipsum placeat similique corporis eaque fugit? Dignissimos asperiores odio quidem quo blanditiis dicta nisi quos esse ratione inventore doloribus excepturi suscipit, natus id, velit incidunt quibusdam voluptatibus veniam commodi?</p>
                    </div>
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