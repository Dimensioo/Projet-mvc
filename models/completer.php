<?php
    class Completer {
        // Connection
        private $conn;

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
        public function __construct($db){
            $this->conn = $db;
        }

        //méthodes
    }
?>