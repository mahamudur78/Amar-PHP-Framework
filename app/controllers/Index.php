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
            $data = array();          
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');

            //Header
            $this->load->view('header');
            //Search
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            $this->load->view('search', $data);
            //Content
            $data['pageTitle'] = 'Home';
            $data['allpost'] = $postModel->getAllPost( $tablePost, $tableCat );
            $this->load->view('content', $data);
            //Sidebar
            $data['larestPost'] = $postModel->getLarestPost( $tablePost );
            $this->load->view('sidebar', $data);
            //Footer
            $this->load->view('fooder');
        }

        public function postDetails($id){
            $data = array();
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');

            //Header
            $this->load->view('header');
            //Search
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            $this->load->view('search', $data);
            //Content
            $data['pageTitle'] = 'Post Details';
            $data['postbyid'] = $postModel->getPostById( $tablePost, $tableCat, $id );
            $this->load->view('details', $data);
            //SIdebar
            $data['larestPost'] = $postModel->getLarestPost( $tablePost );
            $this->load->view('sidebar', $data);
            //Footer
            $this->load->view('fooder');
        }

        public function postByCat($id){
            $data = array();          
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');

            //Header
            $this->load->view('header');
            //Search
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            $this->load->view('search', $data);
            //Content
            $data['pageTitle'] = 'Category Post';
            $data['allpost'] = $postModel->getPostByCat( $tablePost, $tableCat, $id );
            $this->load->view('content', $data);
            //SIdebar
            $data['larestPost'] = $postModel->getLarestPost( $tablePost );
            $this->load->view('sidebar', $data);
            //Footer
            $this->load->view('fooder');
        }

        public function search(  ){
            $data = array();
            $Keyword = $_REQUEST['keyword'];     
            $catId = $_REQUEST['cat'];     
            $tablePost = 'post';
            $tableCat = 'category';
            $postModel = $this->load->model('PostModel');

            //Header
            $this->load->view('header');
            //Search
            $data['catlist'] = $postModel->getAllCategory( $tableCat );
            $this->load->view('search', $data);
            //Content
            $data['pageTitle'] = $postModel->getSearchTitle($tableCat, $Keyword, $catId);
            $data['searchResult'] = $postModel->getSearchResult( $tablePost, $tableCat, $Keyword,  $catId);
            $this->load->view('searchResult', $data);
            //SIdebar
            $data['larestPost'] = $postModel->getLarestPost( $tablePost );
            $this->load->view('sidebar', $data);
            //Footer
            $this->load->view('fooder');
        }
    }
?>