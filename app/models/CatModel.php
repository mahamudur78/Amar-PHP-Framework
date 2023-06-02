<?php
    class CatModel extends DModel{
        public function __construct(){
            parent::__construct();
        }

        public function catList( $table ){
            $sql = "select * from $table";
            return $this->db->select( $sql );
        } 
        
        public function catById( $table, $id ){
            $sql = "select * from $table where id=:id";
            $data = array( ':id' => $id );
            return $this->db->select( $sql, $data );
        }


        public function insertCat($table, $data){
            return $this->db->insert($table, $data);
        }
    }
?>