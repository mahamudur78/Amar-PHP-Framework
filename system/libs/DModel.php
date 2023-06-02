<?php

    class DModel{

        protected $db = array();

        public function __construct(){
            $dsn = 'mysql:dbname=db_mvc; host=localhost';
            $user = 'root';
            $password = '';

            $this->db = new Database($dsn, $user, $password);
        }
    }
?>