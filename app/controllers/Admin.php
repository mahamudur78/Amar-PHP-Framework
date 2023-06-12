<?php
    class Admin extends DController{
        public function __construct()
        {
            parent::__construct();
            Session::checkSession();
        }

        public function Index(){
            $this->home();
        }

        public function home(){
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/content');
            $this->load->view('admin/fooder');
        }

        public function addCategory(){
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/addCategory');
            $this->load->view('admin/fooder');
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
            $url = BASE_URL.'/Admin/categoryList?msg='.urlencode(serialize($messageData));
            header("Location:{$url}");
        }

        public function categoryList(){
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $data = array();
            $table = 'category';
            $catModel = $this->load->model('catModel');
            $data['cat'] = $catModel->catList( $table );
            $this->load->view('admin/categoryLisr', $data);

            $this->load->view('admin/fooder');
        }

        public function categoryEdit(){
            
        }
        
    }
?>