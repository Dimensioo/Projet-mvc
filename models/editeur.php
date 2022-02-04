<?php
    class Editeur {
        // Connection
        private $conn;

        //Atributs
        private $id_editeur;
        public function get_id_editeur(){return $this->id_editeur;}
        public function set_id_editeur($new){$this->id_editeur = $new;}
        private $nom_editeur;
        public function get_nom_editeur(){return $this->nom_editeur;}
        public function set_nom_editeur($new){$this->nom_editeur = $new;}

        //constructeur
        public function __construct($db){
            $this->conn = $db;
        }

        //méthodes

        public function createEditeur(){
            try{
                $req = $this->conn->prepare("SELECT * FROM editeur WHERE nom_editeur = :nom");
                $req->execute(array('nom'=>$this->nom_editeur));
                $test = $req->fetch();
                if($test){
                    echo "<p>Cet editeur existe déja</p>";
                }
                else{
                    try{
                        $req = $this->conn->prepare("INSERT INTO editeur (nom_editeur) VALUES (:nom)");
                        $req->execute(array('nom'=> $this->nom_editeur,));
                        if($req){
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

        public function readEditeur(){
            try{
                $req = $this->conn->prepare("SELECT * FROM editeur WHERE nom_editeur = :nom");
                $req->execute(array('nom'=>$this->nom_editeur));
                $test = $req->fetch();
                return $test['id_editeur'];
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }

        public function readAllEditeur() {
            try {
                $req = $this->conn->prepare("SELECT * FROM editeur ORDER BY nom_editeur");
                $req->execute();
                while($donnees = $req->fetch()){
                    $editeur[] = $donnees;
                }
                return $editeur;
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }

        public function deleteEditeur(){
            try{
                $req = $this->conn->prepare("DELETE FROM editeur WHERE nom_editeur = ?");
                $req->execute(array($this->nom_editeur));
                if($req){
                    echo "<p>Editeur suprimer</p>";
                }
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>