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
           $this->load->view('content');
           $this->load->view('sidebar');
           $this->load->view('fooder');
        }

        
    }
?>