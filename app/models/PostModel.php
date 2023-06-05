<?php

    class PostModel extends DModel{
        public function __construct(){
            parent::__construct();
        }

        public function getAllPost( $tablePost, $tableCat ){
            // $sql = "select * from $table ORDER BY id DESC LIMIT 3";
            $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
                    INNER JOIN $tableCat
                    ON $tablePost.cat = $tableCat.id
                    ORDER BY id DESC LIMIT 3";
            return $this->db->select( $sql );
        } 

        public function getPostById( $tablePost, $tableCat, $id ){
            $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
                            INNER JOIN $tableCat
                            ON $tablePost.cat = $tableCat.id
                            WHERE $tablePost.id = $id";
            return $this->db->select( $sql );
        }

        public function getPostByCat($tablePost, $tableCat, $id){
            $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
                    INNER JOIN $tableCat
                    ON $tablePost.cat = $tableCat.id
                    WHERE $tableCat.id = $id";
            return $this->db->select( $sql );
        }

        public function getAllCategory($table){
            $sql = "select * from $table ORDER BY id DESC LIMIT 5";
            return $this->db->select( $sql );
        }

        public function getLarestPost( $tablePost ){
            $sql = "select * from $tablePost ORDER BY id DESC LIMIT 5";
            return $this->db->select( $sql );
        }
    }
?>