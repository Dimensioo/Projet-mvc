<?php
class Game {
    // Connection
    private $conn;
    private $table = 'game';

    //Atributs
    private $id_game;
    public function get_id_game(){return $this->id_game;}
    public function set_id_game($new){$this->id_game = $new;}
    private $nom_game;
    public function get_nom_game(){return $this->nom_game;}
    public function set_nom_game($new){$this->nom_game = $new;}
    private $date_game;
    public function get_date_game(){return $this->date_game;}
    public function set_date_game($new){$this->date_game = $new;}
    private $description_game;
    public function get_description_game(){return $this->description_game;}
    public function set_description_game($new){$this->description_game = $new;}
    private $img_game;
    public function get_img_game(){return $this->img_game;}
    public function set_img_game($new){$this->img_game = $new;}
    private $id_editeur;
    public function get_id_editeur(){return $this->id_editeur;}
    public function set_id_editeur($new){$this->id_editeur = $new;}

    //constructeur
    public function __construct() {
        $db = new Database(); //connexion a la base de donnée
        $this->conn = $db->getConnection();
    }

    //méthodes

    public function createGame() {
        try{
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE nom_game = :nom");
            $req->execute(array('nom'=>$this->nom_game));
            $test = $req->fetch();
            if($test) {
                echo "<p>Ce jeu existe déja</p>";
            }
            else{
                try {
                    $req = $this->conn->prepare("INSERT INTO ".$this->table." (nom_game, date_game, description_game, img_game, id_editeur)
                        VALUES (:nom, :date, :description, :img, :editeur)");
                    $req->execute(array(
                        'nom'=> $this->nom_game,
                        'date'=> $this->date_game,
                        'description'=> $this->description_game,
                        'img'=> $this->img_game,
                        'editeur'=> $this->id_editeur
                    ));
                    if($req) {
                        echo "<p>Jeu ajouter à la base de données</p>";
                    }
                }
                catch(Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }
            }
        }
        catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readGameByID() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." INNER JOIN editeur ON ".$this->table.".id_editeur = editeur.id_editeur WHERE id_game = :id");
            $req->execute(array('id'=>$this->id_game));
            $result = $req->fetch();
            if($result) {
                return $result;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readGameByName() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." INNER JOIN editeur ON ".$this->table.".id_editeur = editeur.id_editeur WHERE nom_game = :nom");
            $req->execute(array('nom'=>$this->nom_game));
            $result = $req->fetch();
            if($result) {
                return $result;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readAllGame() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." INNER JOIN editeur ON ".$this->table.".id_editeur = editeur.id_editeur ORDER BY nom_game");
            $req->execute();
            while($donnees = $req->fetch()) {
                $games[] = $donnees;
            }
            return $games;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function readLastGame() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." ORDER BY id_game DESC LIMIT 5");
            $req->execute();
            while($donnees = $req->fetch()) {
                $LastGames[] = $donnees;
            }
            return $LastGames;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function deleteGame() {
        try {
            $req = $this->conn->prepare("DELETE FROM ".$this->table." WHERE nom_game = ?");
            $req->execute(array($this->nom_game));
            if($req){
                echo "<p>Jeu suprimer</p>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function search(){
        try {
            $req = $this->conn->prepare('SELECT * FROM '.$this->table.' WHERE nom_game LIKE "%'.$this->nom_game.'%" ORDER BY nom_game');
            $req->execute();
            while($donnees = $req->fetch()) {
                $search[] = $donnees;
            }
            if(!empty($search)) {
                return $search;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function ranking() {
        try {
            $req = $this->conn->prepare("SELECT ".$this->table.".id_game, nom_game, img_game, date_game, AVG(note_completer) FROM ".$this->table." INNER JOIN completer ON ".$this->table.".id_game = completer.id_game GROUP BY nom_game ORDER BY note_completer DESC");
            $req->execute();
            while($donnees = $req->fetch()) {
                $rank[] = $donnees;
            }
            return $rank;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function top5() {
        try {
            $req = $this->conn->prepare("SELECT ".$this->table.".id_game, nom_game, img_game, date_game, AVG(note_completer) FROM ".$this->table." INNER JOIN completer ON ".$this->table.".id_game = completer.id_game GROUP BY nom_game ORDER BY note_completer DESC LIMIT 5");
            $req->execute();
            while($donnees = $req->fetch()) {
                $rank[] = $donnees;
            }
            return $rank;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}