<?php

    class Model{

        protected $db = array();

        public function __construct(){
            $dsn = 'mysql:dbname='.DB_NAME.'; host='.DB_HOST;
            $user = DB_USERNAME;
            $password = DB_PASSWORD;

            $this->db = new Database($dsn, $user, $password);
        }
    }
?>