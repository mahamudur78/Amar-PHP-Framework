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

        public function categoryList(){
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $data = array();
            $table = 'category';
            $catModel = $this->load->model('catModel');
            $data['cat'] = $catModel->catList( $table );
            $this->load->view('admin/category', $data);

            $this->load->view('admin/fooder');
        }
        
    }
?>