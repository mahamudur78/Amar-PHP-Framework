<?php
    class LoginModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function userControl($table, $username, $password){
            $table = Database::DBPrefix($table);
            $sql = "SELECT * FROM $table WHERE username=? and password=?";
            return $this->db->affectedRows($sql, $username, $password);
        }

        public function getUserData($table, $username, $password){
            $table = Database::DBPrefix($table);
            $sql = "SELECT * FROM $table WHERE username=? and password=?";
            return $this->db->selectUser($sql, $username, $password);
        }
        
    }
?>