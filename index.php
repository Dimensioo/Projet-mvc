<?php
session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

try {
    if (isset($_GET['page'])) {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    }
    if (empty($url[0])) {
        require "./views/accueil.php";
    }
    else {
        switch ($url[0]) {
            case "accueil":
                require "./views/accueil.php";
                break;
            case "jeux":
                if (empty($url[1])){
                    require "./views/jeux.php";
                    break;
                }
                else if ($url[1] === "description") {
                    require "./views/descriptionJeu.php";
                    break;
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "liste":
                require "./views/liste.php";
                break;
            case "option":
                if ($_SESSION && $_SESSION["pseudo"]) {
                    require "./views/option.php";
                    break;
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "admin":
                if ($_SESSION && $_SESSION["role"] == 2) {
                    require "./views/gestionAdmin.php";
                    break;
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "connexion":
                require "./views/connexion.php";
                break;
            case "logout":
                require "./controllers/logout.php";
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
}
catch (Exception $e) {
    echo $e->getMessage();
    // require "views/error.view.php";
}