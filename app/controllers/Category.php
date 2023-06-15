<?php
    class Category extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function categoryList(){
            $data = array();
            $table = 'category';
            $catModel = $this->load->model('catModel');
            $data['cat'] = $catModel->catList( $table );
            $this->load->view('category', $data);
        }

        public function catById(){
            $data = array();
            $table = 'category';
            $id = 3;
            $catModel = $this->load->model('catModel');
            $data['catbyid'] = $catModel->catById( $table, $id );
            $this->load->view('catbyid', $data);
        }

        public function addCategory(){
            $this->load->view('addCategory');
        }

        public function insertCategory(){
            $table = "category";

            $name = $_POST['name'];
            $title = $_POST['title'];

            $data = array(
                'name' => $name,
                'title' => $title
            );
            $catModel = $this->load->model('catModel');
            $result = $catModel->insertCat($table, $data);

            $messageData = array();
            if($result == 1){
                $messageData['msg'] = "Category Added Successfully...";
            }else{
                $messageData['msg'] = "Category Not Addad...";
            }

            $this->load->view('addCategory', $messageData);
        }

        public function updateCat(){
            $table = "category";

            $id = $_POST['id'];
            $name = $_POST['name'];
            $title = $_POST['title'];

            $data = array(
                'name' => $name,
                'title' => $title
            );
            $cond = "ID = $id";

            $catModel = $this->load->model('catModel');
            $result = $catModel->catUpdate( $table, $data, $cond );

            $messageData = array();
            if($result == 1){
                $messageData['msg'] = "Category Updated Successfully...";
            }else{
                $messageData['msg'] = "Category Not Updated...";
            }

            $this->load->view('addCategory', $messageData);
        }

        public function deleteCatById(){
            $table = "category";
            $cond = 'id=46';
            $catModel = $this->load->model('catModel');
            $catModel->delCatById($table, $cond);
        }

        public function updateCategory(){
            $data = array();
            $table = 'category';
            $id = 1;
            $catModel = $this->load->model('catModel');
            $data['catUpdate'] = $catModel->catById( $table, $id );
            $this->load->view('catUpdate', $data);
        }
    }
?>