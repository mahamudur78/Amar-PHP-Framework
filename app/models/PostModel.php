<?php

    class PostModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function getAllPost( $tablePost, $tableCat ){
            // $sql = "select * from $table ORDER BY id DESC LIMIT 3";
            $tablePost = Database::DBPrefix($tablePost);
            $tableCat = Database::DBPrefix($tableCat);
            $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
                    INNER JOIN $tableCat
                    ON $tablePost.cat = $tableCat.id
                    ORDER BY id DESC LIMIT 3";
            return $this->db->select( $sql );
        } 

        public function getPostList( $tablePost ){
            $tablePost = Database::DBPrefix($tablePost);
            $sql = "select * from $tablePost ORDER BY id DESC";
            return $this->db->select( $sql );
        } 

        public function categoryList( $catTable){
            $catTable = Database::DBPrefix($catTable);
            $sql = "select * from $catTable ORDER BY id DESC";
            return $this->db->select( $sql);
        }

        public function getPostById( $tablePost, $tableCat, $id ){
            $tablePost = Database::DBPrefix($tablePost);
            $tableCat = Database::DBPrefix($tableCat);
            $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
                            INNER JOIN $tableCat
                            ON $tablePost.cat = $tableCat.id
                            WHERE $tablePost.id = $id";
            return $this->db->select( $sql );
        }

        public function getPostByCat($tablePost, $tableCat, $id){
            $tablePost = Database::DBPrefix($tablePost);
            $tableCat = Database::DBPrefix($tableCat);
            $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
                    INNER JOIN $tableCat
                    ON $tablePost.cat = $tableCat.id
                    WHERE $tableCat.id = $id";
            return $this->db->select( $sql );
        }

        public function getAllCategory($table){
            $table = Database::DBPrefix($table);
            $sql = "select * from $table ORDER BY id DESC";
            return $this->db->select( $sql );
        }

        public function getLarestPost( $tablePost ){
            $tablePost = Database::DBPrefix($tablePost);
            $sql = "select * from $tablePost ORDER BY id DESC LIMIT 5";
            return $this->db->select( $sql );
        }

        public function getSearchResult( $tablePost, $tableCat, $Keyword,  $catId){
            $tablePost = Database::DBPrefix($tablePost);
            if(empty($Keyword) && $catId == 0){
                header('Location:'.BASE_URL.'/index/home');
            }
            if( isset($Keyword) && !empty($Keyword)){
                
                $sql = "SELECT * FROM $tablePost WHERE title LIKE '%$Keyword%' OR content LIKE '%$Keyword%'";
            }elseif(isset($catId)){
                
                $sql = "SELECT * FROM $tablePost WHERE cat = $catId";
            }
            
            return $this->db->select( $sql );
        }

        public function getSearchTitle($tableCat, $Keyword, $catId){
            $tableCat = Database::DBPrefix($tableCat);

            $titleKeyword =  (isset($Keyword) && !empty($Keyword)) ? 'Keyword Search: '. $Keyword : '';
            $categoryNameSQL = "SELECT * FROM $tableCat WHERE id = $catId";
            $catName = $this->db->select( $categoryNameSQL );
            $titleCategory = (isset($catName[0]['name']) && $catId != 0) ? 'Category Search: '. $catName[0]['name'] : '';

            if((isset($Keyword) && $Keyword != '') && isset($catId) && $catId != 0){
                $title = $titleKeyword.'<br>'. $titleCategory;
            }else if((isset($Keyword) && $Keyword != '') && $catId == 0){
                $title = $titleKeyword;
            }else if((isset($catId) && $catId != 0)){
                $title = $titleCategory;
            }else{
                $title = 'Search Result';
            }
            
            return $title;
        }

        public function insertPost($table, $data){
            $table = Database::DBPrefix($table);
            return $this->db->insert($table, $data);
        }

        public function delPostById($table, $cond, $limit = 1){
            $table = Database::DBPrefix($table);
            return $this->db->delete($table, $cond, $limit);
        }

        public function postUpdateById( $table, $id ){
            $table = Database::DBPrefix($table);
            $sql = "select * from $table where id=:id";
            $data = array( ':id' => $id );
            return $this->db->select( $sql, $data );
        }

        public function postUpdate( $table, $data, $cond ){
            $table = Database::DBPrefix($table);
            return $this->db->update( $table, $data, $cond );
        }
    }
?>