<?php
include_once('config.php');
include_once('models/user.php');

if(isset($_POST['new_mdp'], $_POST['verif_mdp'])) {
    if($_POST['new_mdp'] == $_POST['verif_mdp']) {
        echo "<script>alert(\"Veuillez saisir un mot de passe different\")</script>";
    }
    else {
        $user = new User; //creation de l'objet
        $user->set_mdp_user(htmlspecialchars(strip_tags(trim($_POST['verif_mdp'])))); //assignation dans les attributs de l'objet
        $new_mdp = htmlspecialchars(strip_tags(trim($_POST['new_mdp'])));

        $user->UpdateMdp($new_mdp); //fonction modification du Mot de passe
    }
}