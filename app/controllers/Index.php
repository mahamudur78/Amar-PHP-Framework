<?php 
    /*
    * Index Controller
    */
    
    class Index extends DController{
        
        
        public function __construct()
        {
            parent::__construct();    
        }

        public function home(){
            $this->load->view('header');
            $data = array();          
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');
            $data['pageTitle'] = 'Home';
            $data['allpost'] = $postModel->getAllPost( $tablePost, $tableCat );
            $this->load->view('content', $data);

           $this->load->view('sidebar');
           $this->load->view('fooder');
        }

        public function postDetails($id){
            $this->load->view('header');
            $data = array();
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');
            $data['pageTitle'] = 'Post Details';
            $data['postbyid'] = $postModel->getPostById( $tablePost, $tableCat, $id );
            $this->load->view('details', $data);

            $this->load->view('sidebar');
            $this->load->view('fooder');
        }

        public function postByCat($id){
            $this->load->view('header');
            $data = array();          
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');
            $data['pageTitle'] = 'Category Post';
            $data['allpost'] = $postModel->getPostByCat( $tablePost, $tableCat, $id );
            $this->load->view('content', $data);
 
            $this->load->view('sidebar');
            $this->load->view('fooder');
        }
    }
?>