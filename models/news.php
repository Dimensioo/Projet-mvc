<?php
class News {
    // Connection
    private $conn;
    private $table = 'news';

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
    public function __construct() {
        $db = new Database(); //connexion a la base de donnée
        $this->conn = $db->getConnection();
    }

    //méthodes

    public function createNews() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE titre_news = :titre");
            $req->execute(array('titre'=>$this->titre_news));
            $test = $req->fetch();
            if($test) {
                echo "<p>Cette news existe déja</p>";
            }
            else{
                try {
                    $req = $this->conn->prepare("INSERT INTO ".$this->table." (titre_news, contenu_news, id_user) 
                        VALUES (:titre, :contenu, :user)");
                    $req->execute(array(
                        'titre' => $this->titre_news,
                        'contenu' => $this->contenu_news,
                        'user' => $this->id_user
                    ));
                    if($req) {
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

    public function readNews() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE titre_news = :titre");
            $req->execute(array('titre'=>$this->titre_news));
            $result = $req->fetch();
            if($result) {
                return $result;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readAllNews() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table."");
            $req->execute();
            while($donnees = $req->fetch()) {
                $news[] = $donnees;
            }
            return $news;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateNews() {
        try {
            $req = $this->conn->prepare("UPDATE ".$this->table." SET titre_news = :titre, contenu_news = :contenu WHERE id_news = :id");
            $req->execute(array(
                'id'=>$this->id_news,
                'titre'=>$this->titre_news,
                'contenu'=>$this->contenu_news
            ));
            if($req) {
                echo "<p>News Modifier</p>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function deleteNews(){
        try {
            $req = $this->conn->prepare("DELETE FROM ".$this->table." WHERE titre_news = ?");
            $req->execute(array($this->titre_news));
            if($req) {
                echo "<p>News suprimer</p>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}