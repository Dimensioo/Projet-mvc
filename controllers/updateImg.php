<?php
    include_once('config.php');
    include_once('models/user.php');

    $database = new Database(); //connexion a la base de donnée
    $db = $database->getConnection();

    if(isset($_POST['new_pic'])){
        $user = new User($db);
        $user->set_img_user($_POST['new_pic']);

        $user->updateImg();
    }
?>