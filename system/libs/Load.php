<?php
    class Load {
        
        public function __construct(){}

        public function view( $fileName, $data = null ){

            if( $data !== null ){
                extract( $data );
            }

            include 'app/views/'.$fileName.'.php';
        }

        public function model( $modelName ){
            include 'app/models/'.$modelName.'.php';
            return new $modelName();
        }

        public function validation( $validationName ){
            include 'app/validation/'.$validationName.'.php';
            return new $validationName();
        }
    }
?>