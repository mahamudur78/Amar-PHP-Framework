<?php
    class Logout extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function Index(){
            $this->logout();
        }

        public function logout(){
            Session::init();
            Session::destroy();
            header('Location: ' .BASE_URL.'/Login');
        }

    }
?>