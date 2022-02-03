<?php
    class News {
        // Connection
        private $conn;

        //Atributs
        private $id_news;
        public function get_id_news(){return $this->id_news;}
        public function set_id_news($new){$this->id_news = $new;}
        private $titre_news;
        public function get_titre_news(){return $this->titre_news;}
        public function set_titre_news($new){$this->titre_news = $new;}
        private $contenu_news;
        public function get_contenu_news(){return $this->contenu_news;}
        public function set_contenu_news($new){$this->contenu_news = $new;}
        private $id_user;
        public function get_id_user(){return $this->id_user;}
        public function set_id_user($new){$this->id_user = $new;}

        //constructeur
        public function __construct($db){
            $this->conn = $db;
        }

        //méthodes

        public function createNews(){
            try{
                $req = $this->conn->prepare("SELECT * FROM news WHERE titre_news = :titre");
                $req->execute(array('titre'=>$this->titre_news));
                $test = $req->fetch();
                if($test){
                    echo "<p>Cette news existe déja</p>";
                }
                else{
                    try{
                        $req = $this->conn->prepare("INSERT INTO news (titre_news, contenu_news, id_user) 
                            VALUES (:titre, :contenu, :user)");
                        $req->execute(array(
                            'titre' => $this->titre_news,
                            'contenu' => $this->contenu_news,
                            'user' => $this->id_user
                        ));
                        if($req){
                            echo "<p>News créer</p>";
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

        public function deleteNews(){
            try{
                $req = $this->conn->prepare("DELETE FROM news WHERE titre_news = ?");
                $req->execute(array($this->titre_news));
                if($req){
                    echo "<p>News suprimer</p>";
                }
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>