<?php
    class Admin extends Controller{
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
            $this->load->view('admin/categoryList', $data);

            $this->load->view('admin/fooder');
        }

        public function categoryEdit($id = null){
            $data = array();
            $table = 'category';
            $id = $id;

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $catModel = $this->load->model('catModel');
            $data['catUpdate'] = $catModel->catById( $table, $id );
            $this->load->view('admin/categoryEdit', $data);

            $this->load->view('admin/fooder');
        }

        public function categoryUpdate($id = null){
            $table = "category";

            $name = $_POST['name'];
            $title = $_POST['title'];

            $data = array(
                'name' => $name,
                'title' => $title
            );
            $cond = "id = {$id}";
            

            $catModel = $this->load->model('catModel');
            $result = $catModel->catUpdate( $table, $data, $cond );

            $messageData = array();
            if($result == 1){
                $messageData['msg'] = "Category Update Successfully...";
            }else{
                $messageData['msg'] = "Category Not Update...";
            }
            $url = BASE_URL.'/Admin/categoryList?msg='.urlencode(serialize($messageData));
            header("Location:{$url}");
        }

        public function categoryDelete($id = null){
            $table = "category";
            $cond = "id={$id}";
            $catModel = $this->load->model('catModel');
            $result = $catModel->delCatById($table, $cond);

            $messageData = array();
            if($result == 1){
                $messageData['msg'] = "Category Delete Successfully...";
            }else{
                $messageData['msg'] = "Category Not Delete...";
            }
            $url = BASE_URL.'/Admin/categoryList?msg='.urlencode(serialize($messageData));
            header("Location:{$url}");
        }

        public function addArtical(){
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            
            $this->load->view('admin/addPost', $data);
            $this->load->view('admin/fooder');
        }

        public function addNewPost(){
            $input = $this->load->validation('Form');
            $input->post('title')->isEmpty()->length(10,500);
            $input->post('content')->isEmpty();
            $input->post('cat')->isEmpty();

            if($input->submit()){
                $table = "post";
                $data = array(
                    'title' => $input->values['title'],
                    'content' => $input->values['content'],
                    'cat' => $input->values['cat']
                );

                $PostModel = $this->load->model('PostModel');
                $result = $PostModel->insertPost($table, $data);

                $messageData = array();
                if($result == 1){
                    $messageData['msg'] = "Post Added Successfully...";
                }else{
                    $messageData['msg'] = "Post Not Addad...";
                }
                $url = BASE_URL.'/Admin/articleList?msg='.urlencode(serialize($messageData));
                header("Location:{$url}");
            }else{

                $url = BASE_URL.'/Admin/addArtical?errorMessage='.urlencode(serialize($input->errors));
                header("Location:{$url}");
            }   
        }

        public function articleList(){
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $data = array();
            $tablePost = 'post';
            $tableCat = 'category';
            $PostModel = $this->load->model('PostModel');
            $data['allPost'] = $PostModel->getPostList( $tablePost );
            $data['allCategory'] = $PostModel->categoryList( $tableCat);
            $this->load->view('admin/postList', $data);

            $this->load->view('admin/fooder');
        }

        public function postEdit($id = null){

            if($id != null){
                $data = array();
                $table = 'post';
                $tableCat = 'category';
                $id = $id;

                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');

                $PostModel = $this->load->model('PostModel');
                $data['postByID'] = $PostModel->postUpdateById( $table, $id );
                $data['catlist'] = $PostModel->getAllCategory( $tableCat );
                $this->load->view('admin/postEdit', $data);

                $this->load->view('admin/fooder');
            }else{
                header("Location:". BASE_URL.'/Admin/articleList');   
            } 
        }

        public function postUpdate($id = null){
            $input = $this->load->validation('Form');
            $input->post('title')->isEmpty()->length(10,500);
            $input->post('content')->isEmpty();
            $input->post('cat')->isEmpty();

            if($input->submit()){
                $table = "post";
                $cond = "id = {$id}";
                $data = array(
                    'title' => $input->values['title'],
                    'content' => $input->values['content'],
                    'cat' => $input->values['cat']
                );
            
                $postModel = $this->load->model('PostModel');
                $result = $postModel->postUpdate( $table, $data, $cond );

                $messageData = array();
                if($result == 1){
                    $messageData['msg'] = "Post Update Successfully...";
                }else{
                    $messageData['msg'] = "Post Not Update...";
                }
                $url = BASE_URL.'/Admin/articleList?msg='.urlencode(serialize($messageData));
                header("Location:{$url}");
            }else{
                $url = BASE_URL."/Admin/postEdit/{$id}?errorMessage=".urlencode(serialize($input->errors));
                header("Location:{$url}");
            }
        }

        public function postDelete( $id=null ){
            $table = "post";
            $cond = "id={$id}";
            $PostModel = $this->load->model('PostModel');
            $result = $PostModel->delPostById($table, $cond);

            $messageData = array();
            if($result == 1){
                $messageData['msg'] = "Category Delete Successfully...";
            }else{
                $messageData['msg'] = "Category Not Delete...";
            }
            $url = BASE_URL.'/Admin/articleList?msg='.urlencode(serialize($messageData));
            header("Location:{$url}");
        }
    }
?>