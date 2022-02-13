<?php
class Editeur {
    // Connection
    private $conn;
    private $table = 'editeur';

    //Atributs
    private $id_editeur;
    public function get_id_editeur(){return $this->id_editeur;}
    public function set_id_editeur($new){$this->id_editeur = $new;}
    private $nom_editeur;
    public function get_nom_editeur(){return $this->nom_editeur;}
    public function set_nom_editeur($new){$this->nom_editeur = $new;}

    //constructeur
    public function __construct() {
        $db = new Database(); //connexion a la base de donnée
        $this->conn = $db->getConnection();
    }

    //méthodes

    public function createEditeur() {
        try{
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE nom_editeur = :nom");
            $req->execute(array('nom'=>$this->nom_editeur));
            $test = $req->fetch();
            if($test) {
                echo "<p>Cet editeur existe déja</p>";
            }
            else{
                try{
                    $req = $this->conn->prepare("INSERT INTO ".$this->table." (nom_editeur) VALUES (:nom)");
                    $req->execute(array('nom'=> $this->nom_editeur,));
                    if($req) {
                        echo "<p>Editeur ajouter à la base de données</p>";
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

    public function readEditeur() {
        try{
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE nom_editeur = :nom");
            $req->execute(array('nom'=>$this->nom_editeur));
            $test = $req->fetch();
            return $test['id_editeur'];
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readEditeuryById() {
        try{
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE id_editeur = :id");
            $req->execute(array('id'=>$this->id_editeur));
            $result = $req->fetch();
            return $result;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readAllEditeur() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." ORDER BY nom_editeur");
            $req->execute();
            while($donnees = $req->fetch()) {
                $editeur[] = $donnees;
            }
            return $editeur;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateEditeur() {
        try {
            $req = $this->conn->prepare("UPDATE ".$this->table." SET nom_editeur = :nom WHERE id_editeur = :id");
            $req->execute(array(
                'id'=>$this->id_editeur,
                'nom'=>$this->nom_editeur
            ));
            if($req) {
                echo "<p>Editeur modifier</p>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function deleteEditeur() {
        try{
            $req = $this->conn->prepare("DELETE FROM ".$this->table." WHERE nom_editeur = ?");
            $req->execute(array($this->nom_editeur));
            if($req) {
                echo "<p>Editeur suprimer</p>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}