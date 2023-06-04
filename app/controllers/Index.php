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
           $table = 'post';
           $postModel = $this->load->model('PostModel');
           $data['allpost'] = $postModel->getAllPost( $table );
           $this->load->view('content', $data);

           $this->load->view('sidebar');
           $this->load->view('fooder');
        }

        public function postDetails(){
            $this->load->view('header');
            $data = array();
            $table = 'post';
            $postModel = $this->load->model('PostModel');
            $data['postDetails'] = $postModel->getPostDetails( $table );
            $this->load->view('postDetails', $data);

            $this->load->view('sidebar');
            $this->load->view('fooder');
 
        }

        
    }
?>