<?php
    class UserModele extends DModel{
        public function __construct(){
            parent::__construct();
        }

        public function userList( $table ){
            $sql = "select * from $table ORDER BY id DESC";
            return $this->db->select( $sql );
        } 
        
        public function userById( $table, $id ){
            $sql = "select * from $table where id=:id";
            $data = array( ':id' => $id );
            return $this->db->select( $sql, $data );
        }


        public function insertUser($table, $data){
            return $this->db->insert($table, $data);
        }

        public function userUpdate( $table, $data, $cond ){
            return $this->db->update( $table, $data, $cond );
        }

        public function delUserById($table, $cond, $limit = 1){
            return $this->db->delete($table, $cond, $limit);
        }
    }
?>