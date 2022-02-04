<?php
class User {
    // Connection
    private $conn;

    //Atributs
    private $id_user;
    public function get_id_user(){return $this->id_user;}
    public function set_id_user($new){$this->id_user = $new;}
    private $pseudo_user;
    public function get_pseudo_user(){return $this->pseudo_user;}
    public function set_pseudo_user($new){$this->pseudo_user = $new;}
    private $mdp_user;
    public function get_mdp_user(){return $this->mdp_user;}
    public function set_mdp_user($new){$this->mdp_user = $new;}
    private $email_user;
    public function get_email_user(){return $this->email_user;}
    public function set_email_user($new){$this->email_user = $new;}
    private $img_user;
    public function get_img_user(){return $this->img_user;}
    public function set_img_user($new){$this->img_user = $new;}
    private $id_role;
    public function get_id_role(){return $this->id_role;}
    public function set_id_role($new){$this->id_role = $new;}

    //constructeur
    public function __construct($db){
        $this->conn = $db;
    }

    //méthodes

    public function createUser(){
        try {
            $this->mdp_user = password_hash($this->mdp_user, PASSWORD_DEFAULT);
            $req = $this->conn->prepare("SELECT * FROM user WHERE pseudo_user = :pseudo"); //verification si le pseudo existe déja
            $req->execute(array('pseudo'=>$this->pseudo_user));
            $test_Pseudo = $req->fetch();
            if($test_Pseudo) {
                echo "<p>Pseudo deja utilisé</p>";
            }
            else {
                try{
                    $req = $this->conn->prepare("SELECT * FROM user WHERE email_user = :email"); //verification si l'e-mail existe déja
                    $req->execute(array('email'=>$this->email_user));
                    $test_email = $req->fetch();
                    if($test_email){
                        echo "<p>E-mail deja utilisé</p>";
                    }
                    else {
                        try {
                            $req = $this->conn->prepare("INSERT INTO user (pseudo_user, email_user, mdp_user, img_user, id_role) 
                                VALUES (:pseudo, :email, :mdp,  'images/img_users/default_user.png', 1)"); //creation de l'utilisateur dans la bdd
                            $req->execute(array(
                                'pseudo' => $this->pseudo_user,
                                'email' => $this->email_user,
                                'mdp' => $this->mdp_user
                            ));
                            if($req) {
                                echo "<p>Compte créer avec succés !<br>Veuillez vous connecter</p>";
                            }
                        }
                        catch(Exception $e) {
                            die('Erreur : '.$e->getMessage());
                        }
                    }
                }   
                catch(Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readUser(){
        try{
            $req = $this->conn->prepare("SELECT * FROM user WHERE pseudo_user = :pseudo");
            $req->execute(array('pseudo'=>$this->pseudo_user));
            $test = $req->fetch();
            return $test['id_user'];
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function login(){            
        try {
            $req = $this->conn->prepare("SELECT * FROM user WHERE email_user = ?"); //verification si l'e-mail existe
            $req->execute(array($this->email_user));
            $test = $req->fetch();
            if($test) {
                if (password_verify($this->mdp_user, $test['mdp_user'])) { //verification du mot de passe
                    $_SESSION['pseudo'] = $test['pseudo_user'];
                    $_SESSION['email'] = $test['email_user'];
                    $_SESSION['role'] = $test['id_role'];
                    $_SESSION['image'] = $test['img_user'];
                    header("location: ".URL."accueil");
                }
                else {
                    echo "<p>Invalid password</p>";
                }
            }
            else {
                echo "<p>Invalid Mail</p>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updatePseudo(){
        try{
            $req = $this->conn->prepare("SELECT * FROM user WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();
            if (password_verify($this->mdp_user, $test['mdp_user'])){ //verification du mot de passe
                if($this->pseudo_user == $_SESSION['pseudo']){ //verification si le pseudo n'est pas identique
                    echo "<script>alert(\"Pseudo identique\")</script>";
                }
                else {
                    try{
                        $req = $this->conn->prepare("SELECT * FROM user WHERE pseudo_user = :pseudo"); //verification si le pseudo est deja utlisé par un autre utilisateur
                        $req->execute(array('pseudo'=>$this->pseudo_user));
                        $test_Pseudo = $req->fetch();
                        if($test_Pseudo) {
                            echo "<script>alert(\"Pseudo déjà utilisé\")</script>";
                        }
                        else {
                            try{
                                $req = $this->conn->prepare("UPDATE user SET pseudo_user = :pseudo WHERE email_user = :email"); //modification pseudo
                                $req->execute(array(
                                    'pseudo'=>$this->pseudo_user,
                                    'email'=>$_SESSION['email']
                                ));
                                if($req){
                                    $_SESSION['pseudo'] = $this->pseudo_user;
                                    header("Refresh:0; url=./option");
                                    echo "<script>alert(\"Pseudo modifié\")</script>";
                                }
                            }
                            catch(Exception $e) {
                                die('Erreur : '.$e->getMessage());
                            }
                        }
                    }
                    catch(Exception $e) {
                        die('Erreur : '.$e->getMessage());
                    }
                }
            }
            else {
                echo "<script>alert(\"Invalid password\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateImg(){
        try {
            $req = $this->conn->prepare("UPDATE user SET img_user = :img WHERE email_user = :email");
            $req->execute(array(
                "img"=> $this->img_user,
                "email"=> $_SESSION["email"]
            ));
            if($req){
                $_SESSION["image"] = $this->img_user;
                header("Refresh:0; url=./option");
                echo "<script>alert(\"Image de profil mise à jour\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateMail(){
        try {
            $req = $this->conn->prepare("SELECT * FROM user WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();
            if (password_verify($this->mdp_user, $test['mdp_user'])){ //verification du mot de passe
                if($this->email_user == $_SESSION['email']){ //verification si l'e-mail n'est pas identique
                    echo "<script>alert(\"E-mail identique\")</script>";
                }
                else {
                    try{
                        $req = $this->conn->prepare("SELECT * FROM user WHERE email_user = :email"); //verification si l'e-mail est deja utlisé par un autre utilisateur
                        $req->execute(array('email'=>$this->email_user));
                        $test_email = $req->fetch();
                        if($test_email) {
                            echo "<script>alert(\"E-mail déjà utilisé\")</script>";
                        }
                        else {
                            try{
                                $req = $this->conn->prepare("UPDATE user SET email_user = :new_email WHERE email_user = :email"); //modification e-mail
                                $req->execute(array(
                                    'new_email'=>$this->email_user,
                                    'email'=>$_SESSION['email']
                                ));
                                if($req){
                                    $_SESSION['email'] = $this->email_user;
                                    header("Refresh:0; url=./option");
                                    echo "<script>alert(\"E-mail modifié\")</script>";
                                }
                            }
                            catch(Exception $e) {
                                die('Erreur : '.$e->getMessage());
                            }
                        }
                    }
                    catch(Exception $e) {
                        die('Erreur : '.$e->getMessage());
                    }
                }
            }
            else {
                echo "<script>alert(\"Invalid password\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function UpdateMdp($new_mdp){
        try{
            $req = $this->conn->prepare("SELECT * FROM user WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();        
            if(password_verify($this->mdp_user, $test['mdp_user'])) { //verification du mot de passe
                $new_mdp = password_hash($new_mdp, PASSWORD_DEFAULT);
                try{
                    $req = $this->conn->prepare("UPDATE user SET mdp_user = :mdp WHERE email_user = :email"); //modification mot de passe
                    $req->execute(array(
                        'mdp'=>$new_mdp,
                        'email'=>$_SESSION['email']
                    ));
                    if($req){
                        header("Refresh:0; url=./option");
                        echo "<script>alert(\"Mot de passe modifié\")</script>";
                    }
                }
                catch(Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }
            }        
            else {
                echo "<script>alert(\"Invalid password\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function deleteUser(){
        try{
            $req = $this->conn->prepare("SELECT * FROM user WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();        
            if(password_verify($this->mdp_user, $test['mdp_user'])) { //verification mot de passe
                try{
                    $req = $this->conn->prepare("DELETE FROM user WHERE pseudo_user = ?"); //supresion utilisateur
                    $req->execute(array($_SESSION['pseudo']));
                    if($req){
                        echo "<script>alert(\"Compte suprimer veuillez vous déconecter\")</script>";
                    }
                }
                catch(Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }
            }
            else {
                echo "<script>alert(\"Invalid password\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}