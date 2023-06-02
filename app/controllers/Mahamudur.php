<?php 
    /**
    * Main Class
    */
    include_once 'system/libs/DController.php';

    class Mahamudur extends DController{
        function __construct()
        {
            // echo "I Am Mahamudur form main class";
            //parent::__construct();
        }

        public function rahaman($param = ""){
            echo "Rahaman call.. $param";
        }
    }

?>