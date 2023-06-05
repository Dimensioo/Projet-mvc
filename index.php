<?php
session_start();
//error_reporting(0);
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

try {
    if(isset($_GET['page'])) {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    }
    if(empty($url[0])) {
        require "./views/accueil.php";
    }
    else {
        switch($url[0]) {
            case "accueil":
                require "./views/accueil.php";
                break;
            case "jeux":
                if(empty($url[1])) {
                    require "./views/jeux.php";
                    break;
                }
                if($url[1] == "page") {
                    require "./views/jeux.php";
                    break;
                }
                else if($url[1] == "description") {
                    if(!empty($url[2])) {
                        require "./controllers/read/readGame.php";
                        break;
                    }
                    else {
                        throw new Exception("La page n'existe pas");
                    }
                }
                else if ($url[1] == "ajout") {
                    if($_SESSION && $_SESSION["pseudo"] && !empty($url[2])) {
                        require "./controllers/read/readGame.php";
                        break;
                    }
                    else if(empty($_SESSION)) {
                        throw new Exception("Vous devez être connecté pour réaliser cette action !");
                    }
                    else {
                        throw new Exception("La page n'existe pas");
                    }
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "recherche" :
                if(!empty($_POST["search"])) {
                    require "./views/recherche.php";
                    break;
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "liste":
                if($_SESSION && $_SESSION["pseudo"]) {
                    require "./controllers/read/readUser.php";
                    break;
                }
                if(empty($_SESSION)) {
                    throw new Exception("Vous devez être connecté pour réaliser cette action !");
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "classement" :
                if(empty($url[1])) {
                    require "./views/classement.php";
                    break;
                }
                if($url[1] == "page") {
                    require "./views/classement.php";
                    break;
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "option":
                if($_SESSION && $_SESSION["pseudo"]) {
                    require "./views/option.php";
                    break;
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "admin":
                if($_SESSION && $_SESSION["role"] == 2) {
                    require "./views/gestionAdmin.php";
                    break;
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            case "connexion":
                if($_SESSION && $_SESSION["pseudo"]) {
                    throw new Exception("La page n'existe pas");
                }
                else {
                    require "./views/connexion.php";
                    break;
                }
            case "logout":
                require "./controllers/logout.php";
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
}
catch (Exception $e) {
    $error = $e->getMessage();
    require "views/error.php";
}
"test";