<?php
    class User extends DController{
        public function __construct()
        {
            parent::__construct();
            Session::checkSession();
            $data = array();
        }

        public function makeUser(){
            if(Session::get('level') == '1'){
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/user/addUser');
                $this->load->view('admin/fooder');
            }else{
                header("Location:". BASE_URL.'/Admin'); 
            }
        }

        public function addNewUser(){
            if(Session::get('level') == '1'){
                $input = $this->load->validation('Form');
                $input->post('username')->isEmpty()->length(2,32);
                $input->post('password')->isEmpty()->length(4,32);
                $input->post('level')->isEmpty();

                if($input->submit()){
                    $table = "tbl_user";
                    $data = array(
                        'username' => $input->values['username'],
                        'password' => md5($input->values['password']),
                        'level' => $input->values['level']
                    );

                    $userModele = $this->load->model('UserModele');
                    $result = $userModele->insertUser($table, $data);

                    $messageData = array();
                    if($result == 1){
                        $messageData['msg'] = "User Added Successfully...";
                    }else{
                        $messageData['msg'] = "User Not Addad...";
                    }
                    $url = BASE_URL.'/User/userList?msg='.urlencode(serialize($messageData));
                    header("Location:{$url}");
                }else{

                    $url = BASE_URL.'/User/makeUser?errorMessage='.urlencode(serialize($input->errors));
                    header("Location:{$url}");
                }
            }else{
                header("Location:". BASE_URL.'/Admin'); 
            }
        }

        public function userList(){
            if(Session::get('level') == '1'){
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');

                $table = 'tbl_user';
                $userModele = $this->load->model('UserModele');
                $data['userList'] = $userModele->userList( $table );
                
                $data['userLevel'] = array(
                    '1' => 'Administrator',
                    '2' => 'Author',
                    '3' => 'Contributor',
                );
                $this->load->view('admin/user/userList', $data);

                $this->load->view('admin/fooder');
            }else{
                header("Location:". BASE_URL.'/Admin'); 
            }
        }

        public function userDelete($id=null){
            if(Session::get('level') == '1'){
                $table = "tbl_user";
                $cond = "id={$id}";
                $userModele = $this->load->model('UserModele');
                $result = $userModele->delUserById($table, $cond);

                $messageData = array();
                if($result == 1){
                    $messageData['msg'] = "User Delete Successfully...";
                }else{
                    $messageData['msg'] = "User Not Delete...";
                }
                $url = BASE_URL.'/User/userList?msg='.urlencode(serialize($messageData));
                header("Location:{$url}");
            }else{
                header("Location:". BASE_URL.'/Admin'); 
            }
        }

        public function userEdit($id = null){
            if(Session::get('level') == '1'){
                if($id != null){
                    $data = array();
                    $table = 'tbl_user';
                    $id = $id;

                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');

                    $PostModel = $this->load->model('UserModele');
                    $data['userByID'] = $PostModel->userById( $table, $id );
                    $data['userLevel'] = array(
                        '1' => 'Administrator',
                        '2' => 'Author',
                        '3' => 'Contributor',
                    );
                    $this->load->view('admin/user/userEdit', $data);

                    $this->load->view('admin/fooder');
                }else{
                    header("Location:". BASE_URL.'/Admin/articleList');   
                }
            }else{
                header("Location:". BASE_URL.'/Admin'); 
            }
        }

        public function userUpdate($id =null){
            if(Session::get('level') == '1'){
                $input = $this->load->validation('Form');
                $input->post('username')->isEmpty()->length(2,32);
                $input->post('password')->isEmpty()->length(4,32);
                $input->post('level')->isEmpty();

                if($input->submit()){
                    $table = "tbl_user";
                    $cond = "id = {$id}";
                    $data = array(
                        'username' => $input->values['username'],
                        'password' => md5($input->values['password']),
                        'level' => $input->values['level']
                    );

                    $userModele = $this->load->model('UserModele');
                    $result = $userModele->userUpdate( $table, $data, $cond );

                    $messageData = array();
                    if($result == 1){
                        $messageData['msg'] = "User Update Successfully...";
                    }else{
                        $messageData['msg'] = "User Not Update...";
                    }
                    $url = BASE_URL.'/User/userList?msg='.urlencode(serialize($messageData));
                    header("Location:{$url}");
                }else{
                    $url = BASE_URL."/User/userEdit/{$id}?errorMessage=".urlencode(serialize($input->errors));
                    header("Location:{$url}");
                }
            }else{
                header("Location:". BASE_URL.'/Admin'); 
            }
        }
    }