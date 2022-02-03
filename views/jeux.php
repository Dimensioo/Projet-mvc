<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
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
                    <div><a href="<?=URL?>jeux" id="active">Jeux</a></div>
                    <div><a href="<?=URL?>liste">Liste</a></div>
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
        <div id="listGame"> <!--List game-->
            <h2>Liste des jeux <i class="fas fa-scroll"></i></h2>
            <div>
                <div><a href="<?=URL?>jeux/description"><img src="https://picsum.photos/150/200?random=1" alt="image du jeu" class="sizeup"></a></div>
                <article>
                    <div>
                        <a href="<?=URL?>jeux/description"><h3>Titre du jeu</h3></a>
                        <a href="#" class="sizeup">Ajouter à votre liste</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa odio eligendi deserunt cum iusto totam facilis dolor repudiandae autem? Necessitatibus unde hic nobis aspernatur. Reiciendis culpa doloremque unde minus earum error iste excepturi numquam, fugiat obcaecati consequuntur accusamus quo non ab officiis quas velit cum dignissimos porro odio dolor! Cumque veritatis natus asperiores provident minus ex facilis deserunt, porro voluptatem amet non delectus? Unde reprehenderit labore facere nesciunt quas aperiam consequatur similique quos aliquam sequi minima aut repellat molestiae harum, perferendis, delectus rerum in architecto corrupti odit veniam nisi. Quia, consectetur aperiam ullam similique perferendis omnis autem eaque odio culpa.</p>
                </article>
            </div>
            <div>
                <div><a href="<?=URL?>jeux/description"><img src="https://picsum.photos/150/200?random=2" alt="image du jeu" class="sizeup"></a></div>
                <article>
                    <div>
                        <a href="<?=URL?>jeux/description"><h3>Titre du jeu</h3></a>
                        <a href="#" class="sizeup">Ajouter à votre liste</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint natus nisi, nihil exercitationem eligendi libero. Incidunt molestias eos velit soluta ipsam enim laboriosam similique quis. Assumenda sunt minus nemo doloremque praesentium sapiente vero fuga natus corporis eligendi optio repellendus laboriosam similique adipisci obcaecati quis, illo tempora dolores. Reiciendis qui, consequatur sit iure neque natus fugit excepturi rem magni? Earum aut ex, amet aspernatur quasi, laborum repudiandae ipsum totam nesciunt, hic natus optio iusto praesentium pariatur qui perferendis iste dolor magnam provident laudantium! Accusantium eius sunt aspernatur perspiciatis inventore, autem velit, quod eligendi maxime, dolorum harum adipisci optio sint incidunt impedit!</p>
                </article> 
            </div>
            <div>
                <div><a href="<?=URL?>jeux/description"><img src="https://picsum.photos/150/200?random=3" alt="image du jeu" class="sizeup"></a></div>
                <article>
                    <div>
                        <a href="<?=URL?>jeux/description"><h3>Titre du jeu</h3></a>
                        <a href="#" class="sizeup">Ajouter à votre liste</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint natus nisi, nihil exercitationem eligendi libero. Incidunt molestias eos velit soluta ipsam enim laboriosam similique quis. Assumenda sunt minus nemo doloremque praesentium sapiente vero fuga natus corporis eligendi optio repellendus laboriosam similique adipisci obcaecati quis, illo tempora dolores. Reiciendis qui, consequatur sit iure neque natus fugit excepturi rem magni? Earum aut ex, amet aspernatur quasi, laborum repudiandae ipsum totam nesciunt, hic natus optio iusto praesentium pariatur qui perferendis iste dolor magnam provident laudantium! Accusantium eius sunt aspernatur perspiciatis inventore, autem velit, quod eligendi maxime, dolorum harum adipisci optio sint incidunt impedit!</p>
                </article>
            </div>
            <div>
                <div><a href="<?=URL?>jeux/description"><img src="https://picsum.photos/150/200?random=4" alt="image du jeu" class="sizeup"></a></div>
                <article>
                    <div>
                        <a href="<?=URL?>jeux/description"><h3>Titre du jeu</h3></a>
                        <a href="#" class="sizeup">Ajouter à votre liste</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa odio eligendi deserunt cum iusto totam facilis dolor repudiandae autem? Necessitatibus unde hic nobis aspernatur. Reiciendis culpa doloremque unde minus earum error iste excepturi numquam, fugiat obcaecati consequuntur accusamus quo non ab officiis quas velit cum dignissimos porro odio dolor! Cumque veritatis natus asperiores provident minus ex facilis deserunt, porro voluptatem amet non delectus? Unde reprehenderit labore facere nesciunt quas aperiam consequatur similique quos aliquam sequi minima aut repellat molestiae harum, perferendis, delectus rerum in architecto corrupti odit veniam nisi. Quia, consectetur aperiam ullam similique perferendis omnis autem eaque odio culpa.</p>
                </article>
            </div>
            <div>
                <div><a href="<?=URL?>jeux/description"><img src="https://picsum.photos/150/200?random=5" alt="image du jeu" class="sizeup"></a></div>
                <article>
                    <div>
                        <a href="<?=URL?>jeux/description"><h3>Titre du jeu</h3></a>
                        <a href="#" class="sizeup">Ajouter à votre liste</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa odio eligendi deserunt cum iusto totam facilis dolor repudiandae autem? Necessitatibus unde hic nobis aspernatur. Reiciendis culpa doloremque unde minus earum error iste excepturi numquam, fugiat obcaecati consequuntur accusamus quo non ab officiis quas velit cum dignissimos porro odio dolor! Cumque veritatis natus asperiores provident minus ex facilis deserunt, porro voluptatem amet non delectus? Unde reprehenderit labore facere nesciunt quas aperiam consequatur similique quos aliquam sequi minima aut repellat molestiae harum, perferendis, delectus rerum in architecto corrupti odit veniam nisi. Quia, consectetur aperiam ullam similique perferendis omnis autem eaque odio culpa.</p>
                </article>
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