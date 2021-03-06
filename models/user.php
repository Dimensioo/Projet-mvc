<?php
class User {
    // Connection
    private $conn;
    private $table = 'user';

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
    private $date_user;
    public function get_date_user(){return $this->date_user;}
    public function set_date_user($new){$this->date_user = $new;}
    private $id_role;
    public function get_id_role(){return $this->id_role;}
    public function set_id_role($new){$this->id_role = $new;}

    //constructeur
    public function __construct() {
        $db = new Database(); //connexion a la base de donnée
        $this->conn = $db->getConnection();
    }

    //méthodes

    public function createUser() {
        try {
            $this->mdp_user = password_hash($this->mdp_user, PASSWORD_DEFAULT);
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE pseudo_user = :pseudo"); //verification si le pseudo existe déja
            $req->execute(array('pseudo'=>$this->pseudo_user));
            $test_Pseudo = $req->fetch();
            if($test_Pseudo) {
                echo "<p>Pseudo ou e-mail déjà utilisé</p>";
            }
            else {
                try {
                    $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE email_user = :email"); //verification si l'e-mail existe déja
                    $req->execute(array('email'=>$this->email_user));
                    $test_email = $req->fetch();
                    if($test_email) {
                        echo "<p>Pseudo ou e-mail déjà utilisé</p>";
                    }
                    else {
                        try {
                            $req = $this->conn->prepare("INSERT INTO ".$this->table." (pseudo_user, email_user, mdp_user, img_user, date_user, id_role) 
                                VALUES (:pseudo, :email, :mdp,  'images/img_users/default_user.png', :date, 1)"); //creation de l'utilisateur dans la bdd
                            $req->execute(array(
                                'pseudo' => $this->pseudo_user,
                                'email' => $this->email_user,
                                'mdp' => $this->mdp_user,
                                'date' => date('Y-m-d', time())
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

    public function readUser() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE pseudo_user = :pseudo");
            $req->execute(array('pseudo'=>$this->pseudo_user));
            $result = $req->fetch();
            if($result) {
                return $result;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readUserByID() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE id_user = :id");
            $req->execute(array('id'=>$this->id_user));
            $result = $req->fetch();
            if($result) {
                return $result;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readAllUser() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." ORDER BY pseudo_user");
            $req->execute();
            while($donnees = $req->fetch()) {
                $users[] = $donnees;
            }
            return $users;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function login(){            
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE email_user = ?"); //verification si l'e-mail existe
            $req->execute(array($this->email_user));
            $test = $req->fetch();
            if($test) {
                if(password_verify($this->mdp_user, $test['mdp_user'])) { //verification du mot de passe
                    $_SESSION['id'] = $test['id_user'];
                    $_SESSION['pseudo'] = $test['pseudo_user'];
                    $_SESSION['email'] = $test['email_user'];
                    $_SESSION['role'] = $test['id_role'];
                    $_SESSION['image'] = $test['img_user'];
                    $_SESSION['date'] = $test['date_user'];
                    header("location: ".URL."accueil");
                }
                else {
                    echo "<p>Mot de passe ou E-mail incorrect</p>";
                }
            }
            else {
                echo "<p>Mot de passe ou E-mail incorrect</p>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updatePseudo() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();
            if(password_verify($this->mdp_user, $test['mdp_user'])) { //verification du mot de passe
                if($this->pseudo_user == $_SESSION['pseudo']) { //verification si le pseudo n'est pas identique
                    echo "<script>alert(\"Pseudo identique\")</script>";
                }
                else {
                    try {
                        $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE pseudo_user = :pseudo"); //verification si le pseudo est déjà utlisé par un autre utilisateur
                        $req->execute(array('pseudo'=>$this->pseudo_user));
                        $test_Pseudo = $req->fetch();
                        if($test_Pseudo) {
                            echo "<script>alert(\"Pseudo déjà utilisé\")</script>";
                        }
                        else {
                            try{
                                $req = $this->conn->prepare("UPDATE ".$this->table." SET pseudo_user = :pseudo WHERE email_user = :email"); //modification pseudo
                                $req->execute(array(
                                    'pseudo'=>$this->pseudo_user,
                                    'email'=>$_SESSION['email']
                                ));
                                if($req) {
                                    $_SESSION['pseudo'] = $this->pseudo_user;
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
                echo "<script>alert(\"Mot de passe incorrect\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateImg() {
        try {
            $req = $this->conn->prepare("UPDATE ".$this->table." SET img_user = :img WHERE email_user = :email");
            $req->execute(array(
                "img"=> $this->img_user,
                "email"=> $_SESSION["email"]
            ));
            if($req) {
                $_SESSION["image"] = $this->img_user;
                echo "<script>alert(\"Image de profil mise à jour\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateMail() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();
            if(password_verify($this->mdp_user, $test['mdp_user'])) { //verification du mot de passe
                if($this->email_user == $_SESSION['email']) { //verification si l'e-mail n'est pas identique
                    echo "<script>alert(\"E-mail identique\")</script>";
                }
                else {
                    try {
                        $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE email_user = :email"); //verification si l'e-mail est déjà utlisé par un autre utilisateur
                        $req->execute(array('email'=>$this->email_user));
                        $test_email = $req->fetch();
                        if($test_email) {
                            echo "<script>alert(\"E-mail déjà utilisé\")</script>";
                        }
                        else {
                            try {
                                $req = $this->conn->prepare("UPDATE ".$this->table." SET email_user = :new_email WHERE email_user = :email"); //modification e-mail
                                $req->execute(array(
                                    'new_email'=>$this->email_user,
                                    'email'=>$_SESSION['email']
                                ));
                                if($req) {
                                    $_SESSION['email'] = $this->email_user;
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
                echo "<script>alert(\"Mot de passe incorrect\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function UpdateMdp($new_mdp) {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();        
            if(password_verify($this->mdp_user, $test['mdp_user'])) { //verification du mot de passe
                $new_mdp = password_hash($new_mdp, PASSWORD_DEFAULT);
                try {
                    $req = $this->conn->prepare("UPDATE ".$this->table." SET mdp_user = :mdp WHERE email_user = :email"); //modification mot de passe
                    $req->execute(array(
                        'mdp'=>$new_mdp,
                        'email'=>$_SESSION['email']
                    ));
                    if($req) {
                        echo "<script>alert(\"Mot de passe modifié\")</script>";
                    }
                }
                catch(Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }
            }        
            else {
                echo "<script>alert(\"Mot de passe incorrect\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateRoleUser() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE pseudo_user = :pseudo AND id_role = :role");
            $req->execute(array(
                'pseudo'=>$this->pseudo_user,
                'role'=>$this->id_role
            ));
            if($req->fetch()) {
                echo "<p>Cette utilisateur possede déja ce rôle</p>";
            }
            else {
                try {
                    $req = $this->conn->prepare("UPDATE ".$this->table." SET id_role = :role WHERE pseudo_user = :pseudo");
                    $req->execute(array(
                        'pseudo'=>$this->pseudo_user,
                        'role'=>$this->id_role
                    ));
                    if($req) {
                        echo "<p>Rôle modifier</p>";
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

    public function deleteUser() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE email_user = ?");
            $req->execute(array($_SESSION['email']));
            $test = $req->fetch();      
            if(password_verify($this->mdp_user, $test['mdp_user'])) { //verification mot de passe
                try {
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
                echo "<script>alert(\"Mot de passe incorrect\")</script>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}