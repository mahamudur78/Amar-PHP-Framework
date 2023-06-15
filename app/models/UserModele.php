<?php
    class UserModele extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function userList( $table ){
            $table = Database::DBPrefix($table);
            $sql = "select * from $table ORDER BY id DESC";
            return $this->db->select( $sql );
        } 
        
        public function userById( $table, $id ){
            $table = Database::DBPrefix($table);
            $sql = "select * from $table where id=:id";
            $data = array( ':id' => $id );
            return $this->db->select( $sql, $data );
        }


        public function insertUser($table, $data){
            $table = Database::DBPrefix($table);
            return $this->db->insert($table, $data);
        }

        public function userUpdate( $table, $data, $cond ){
            $table = Database::DBPrefix($table);
            return $this->db->update( $table, $data, $cond );
        }

        public function delUserById($table, $cond, $limit = 1){
            $table = Database::DBPrefix($table);
            return $this->db->delete($table, $cond, $limit);
        }
    }
?>