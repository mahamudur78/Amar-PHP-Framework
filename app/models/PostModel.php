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

        public function getPostList( $tablePost, $tableCat ){
            // $sql = "select * from $table ORDER BY id DESC LIMIT 3";
            $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
                    INNER JOIN $tableCat
                    ON $tablePost.cat = $tableCat.id
                    ORDER BY id DESC";
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

        public function getSearchResult( $tablePost, $tableCat, $Keyword,  $catId){

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
            return $this->db->insert($table, $data);
        }
    }
?>