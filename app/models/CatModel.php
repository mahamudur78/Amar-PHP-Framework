<?php
    class CatModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function catList( $table ){
            $table = Database::DBPrefix($table);
            $sql = "select * from $table ORDER BY id DESC";
            return $this->db->select( $sql );
        } 
        
        public function catById( $table, $id ){
            $table = Database::DBPrefix($table);
            $sql = "select * from $table where id=:id";
            $data = array( ':id' => $id );
            return $this->db->select( $sql, $data );
        }


        public function insertCat($table, $data){
            $table = Database::DBPrefix($table);
            return $this->db->insert($table, $data);
        }

        public function catUpdate( $table, $data, $cond ){
            $table = Database::DBPrefix($table);
            return $this->db->update( $table, $data, $cond );
        }

        public function delCatById($table, $cond, $limit = 1){
            $table = Database::DBPrefix($table);
            return $this->db->delete($table, $cond, $limit);
        }
    }
?>