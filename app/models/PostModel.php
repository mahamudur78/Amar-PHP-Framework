<?php

    class PostModel extends DModel{
        public function __construct(){
            parent::__construct();
        }

        public function getAllPost( $table ){
            $sql = "select * from $table ORDER BY id DESC LIMIT 3";
            return $this->db->select( $sql );
        } 

        public function getPostDetails( $table ){
            $sql = "select * from $table ORDER BY id DESC LIMIT 3";
        }
    }
?>