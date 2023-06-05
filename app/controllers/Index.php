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
            //Header
            $this->load->view('header');
            //Content
            $data = array();          
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');
            $data['pageTitle'] = 'Home';
            $data['allpost'] = $postModel->getAllPost( $tablePost, $tableCat );
            $this->load->view('content', $data);
            //SIdebar
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            $data['larestPost'] = $postModel->getLarestPost( $tablePost );
            $this->load->view('sidebar', $data);
            //Footer
            $this->load->view('fooder');
        }

        public function postDetails($id){
            //Header
            $this->load->view('header');
            //Content
            $data = array();
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');
            $data['pageTitle'] = 'Post Details';
            $data['postbyid'] = $postModel->getPostById( $tablePost, $tableCat, $id );
            $this->load->view('details', $data);
            //SIdebar
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            $data['larestPost'] = $postModel->getLarestPost( $tablePost );
            $this->load->view('sidebar', $data);
            //Footer
            $this->load->view('fooder');
        }

        public function postByCat($id){
            //Header
            $this->load->view('header');
            //Content
            $data = array();          
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');
            $data['pageTitle'] = 'Category Post';
            $data['allpost'] = $postModel->getPostByCat( $tablePost, $tableCat, $id );
            $this->load->view('content', $data);
            //SIdebar
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            $data['larestPost'] = $postModel->getLarestPost( $tablePost );
            $this->load->view('sidebar', $data);
            //Footer
            $this->load->view('fooder');
        }
    }
?>