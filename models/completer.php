<?php
class Completer {
    // Connection
    private $conn;
    private $table = 'completer';

    //Atributs
    private $id_game;
    public function get_id_game(){return $this->id_game;}
    public function set_id_game($new){$this->id_game = $new;}
    private $id_user;
    public function get_id_user(){return $this->id_user;}
    public function set_id_user($new){$this->id_user = $new;}
    private $temps_completer;
    public function get_temps_completer(){return $this->temps_completer;}
    public function set_temps_completer($new){$this->temps_completer = $new;}
    private $note_completer;
    public function get_note_completer(){return $this->note_completer;}
    public function set_note_completer($new){$this->note_completer = $new;}
    private $achievement_completer;
    public function get_achievement_completer(){return $this->achievement_completer;}
    public function set_achievement_completer($new){$this->achievement_completer = $new;}

    //constructeur
    public function __construct() {
        $db = new Database(); //connexion a la base de donnée
        $this->conn = $db->getConnection();
    }

    //méthodes
    public function createCompleter() {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE id_game = :game AND id_user = :user");
            $req->execute(array(
                'game' => $this->id_game,
                'user' => $this->id_user
            ));
            $test = $req->fetch();
            if($test) {
                echo "<h4>Ce jeu est déja dans votre liste</h4>";
            }
            else {
                try {
                    $req = $this->conn->prepare("INSERT INTO ".$this->table." (id_game, id_user, temps_completer, note_completer, achievement_completer)
                        VALUES (:game, :user, :temps, :note, :achievement)");
                    $req->execute(array(
                        'game' => $this->id_game,
                        'user' => $this->id_user,
                        'temps' => $this->temps_completer,
                        'note' => $this->note_completer,
                        'achievement' => $this->achievement_completer
                    ));
                    if($req) {
                        echo "<h4>Jeu ajouter à votre liste !</h4>";
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

    public function readCompleter($userId) {
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." INNER JOIN game ON ".$this->table.".id_game = game.id_game WHERE id_user = :user ORDER BY nom_game ASC");
            $req->execute(array('user'=>$userId));
            while($donnees = $req->fetch()) {
                $userGames[] = $donnees;
            }
            if(!empty($userGames)) {
                return $userGames;
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function totalGameUser($userId) {
        $totalGame = 0;
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE id_user = :user");
            $req->execute(array('user'=>$userId));
            while($req->fetch()) {
                $totalGame++;
            }
            return $totalGame;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function totalPlayTime($userId) {
        try {
            $req = $this->conn->prepare("SELECT SUM(temps_completer) AS temps_total FROM ".$this->table." WHERE id_user = :user");
            $req->execute(array('user'=>$userId));
            $playTime = $req->fetch();
            return $playTime['temps_total'];
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function totalAchievement($userId) {
        try {
            $req = $this->conn->prepare("SELECT SUM(achievement_completer) AS achievement_total FROM ".$this->table." WHERE id_user = :user");
            $req->execute(array('user'=>$userId));
            $achievement = $req->fetch();
            return $achievement['achievement_total'];
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function averageNote($userId) {
        try {
            $req = $this->conn->prepare("SELECT AVG(note_completer) AS note_avg FROM ".$this->table." WHERE id_user = :user");
            $req->execute(array('user'=>$userId));
            $avg = $req->fetch();
            return $avg['note_avg'];
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function totalUser($gameId) {
        $totalUser = 0;
        try {
            $req = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE id_game = :game");
            $req->execute(array('game'=>$gameId));
            while($req->fetch()) {
                $totalUser++;
            }
            return $totalUser;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function globalNote($gameId) {
        try {
            $req = $this->conn->prepare("SELECT AVG(note_completer) AS note_avg FROM ".$this->table." WHERE id_game = :game");
            $req->execute(array('game'=>$gameId));
            $avg = $req->fetch();
            return $avg['note_avg'];
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function updateCompleter() {
        try {
            $req = $this->conn->prepare("UPDATE ".$this->table." SET temps_completer = :temps, note_completer = :note, achievement_completer = :achievement WHERE id_game = :game AND id_user = :user");
            $req->execute(array(
                "game"=> $this->id_game,
                "user"=> $this->id_user,
                "temps"=> $this->temps_completer,
                "note"=> $this->note_completer,
                "achievement"=> $this->achievement_completer
            ));
            if($req) {
                echo "<h4>Le jeu a bien été modifié !</h4>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function deleteCompleter() {
        try {
            $req = $this->conn->prepare("DELETE FROM ".$this->table." WHERE id_game = :game AND id_user = :user");
            $req->execute(array(
                "game"=>$this->id_game,
                "user"=>$this->id_user
            ));
            if($req) {
                echo "<h4>Jeu suprimer de votre liste !</h4>";
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}