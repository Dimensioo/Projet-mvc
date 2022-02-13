<?php
class Role {
    // Connection
    private $conn;
    private $table = 'role';

    //Atributs
    private $id_role;
    public function get_id_role(){return $this->id_role;}
    public function set_id_role($new){$this->id_role = $new;}
    private $type_role;
    public function get_type_role(){return $this->type_role;}
    public function set_type_role($new){$this->type_role = $new;}

    //constructeur
    public function __construct() {
        $db = new Database(); //connexion a la base de donnée
        $this->conn = $db->getConnection();
    }

    //méthodes
    public function readRole() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE type_role = :type");
            $req->execute(array('type'=>$this->type_role));
            $result = $req->fetch();
            if($result) {
                return $result;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readAllRole() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." ORDER BY id_role");
            $req->execute();
            while($donnees = $req->fetch()) {
                $roles[] = $donnees;
            }
            return $roles;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}