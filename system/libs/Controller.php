<?php
    class Controller{
        
        protected $load = array();
        public function __construct(){
           $this->load = new Load();
        }

        public function cssAssetEnqueue( $handle ){
            
            $data['css'] = ManageAssets::css();
                        
            foreach ($handle as $key => $value ){
                if(isset($data['css'][$value])){
                    $GLOBALS['enqueueCss'][] = "<link rel='stylesheet' href='{$data['css'][$value]}'>";
                } 
            }
        }

        public function jsAssetsEnqueue( $handle ){
           
            $data['js'] = ManageAssets::js();
            
            foreach ($handle as $key => $value ){
                //Header JS Load
                if(isset($data['js'][$value[0]]) && isset($value[0]) && isset($value[1]) && $value[1] == true){
                    $GLOBALS['enqueueJsHader'][] = "<script src='{$data['js'][$value[0]]}'></script>";
                }else{
                    //Footer JS Load
                    if(isset($value[0]) && $value[1] == false){
                        $GLOBALS['enqueueJsFooter'][] = "<script src='{$data['js'][$value[0]]}'></script>";
                    }else{
                        $GLOBALS['enqueueJsFooter'][] = "<script src='{$data['js'][$value]}'></script>";
                    }
                }
            }

            
        }
    }
?>