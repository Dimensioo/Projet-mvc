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
                require "./views/jeux.php";
                break;
            case "liste":
                require "./views/liste.php";
                break;
            case "option":
                require "./views/option.php";
                break;
            case "admin":
                require "./views/gestionAdmin.php";
                break;
            case "connexion":
                require "./views/connexion.php";
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
}
catch (Exception $e) {
    $error = $e->getMessage();
    // require "views/error.view.php";
}