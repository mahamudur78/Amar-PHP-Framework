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
            $this->load->view('admin/home');
        }
    }
?>