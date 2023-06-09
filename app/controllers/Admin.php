<?php
    class Admin extends DController{
        public function __construct()
        {
            parent::__construct();
        }

        public function Index(){
            $this->home();
        }

        public function home(){
            $this->load->view('admin/home');
        }
    }
?>