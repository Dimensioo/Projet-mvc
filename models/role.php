<?php
class Role {
    // Connection
    private $conn;
    private $table = 'role';

    //Atributs
    private $id_role;
    public function get_id_role(){return $this->id_role;}
    public function set_id_role($new){$this->id_role = $new;}
    private $nom_role;
    public function get_nom_role(){return $this->nom_role;}
    public function set_nom_role($new){$this->nom_role = $new;}

    //constructeur
    public function __construct(){
        $db = new Database(); //connexion a la base de donnée
        $this->conn = $db->getConnection();
    }

    //méthodes
}