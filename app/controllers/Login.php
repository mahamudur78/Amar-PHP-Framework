<?php
    class Login extends DController{
        public function __construct()
        {
            parent::__construct();
        }

        public function Index(){
            $this->login();
        }

        public function login(){
            $this->load->view('admin/login');
        }

        public function loginAuth(){
            $table = 'tbl_user';
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $loginModel = $this->load->model('LoginModel');
            $count = $loginModel->userControl($table, $username, $password);

            if($count > 0){
                $result = $loginModel->getUserData($table, $username, $password);
                Session::init();
                Session::set('username', $result[0]['username']); 
                Session::set('userID', $result[0]['id']); 
                header('Location: ' .BASE_URL.'/Admin');
            }else{
                header('Location: ' .BASE_URL.'/Login');
            }

        }

    }
?>