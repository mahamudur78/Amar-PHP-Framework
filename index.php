<?php
    include_once "system/libs/Main.php";
    include_once 'system/libs/DController.php';
    include_once 'system/libs/DModel.php';
    include_once 'system/libs/Database.php';
    include_once 'system/libs/Load.php';

    $url = isset( $_GET['url'] ) ? $_GET['url'] : null;

    if( $url != null ){
        $url = rtrim($url, '/');
        $url = explode( '/',  filter_var($url, FILTER_SANITIZE_URL));
    }else{
        unset( $url );
    }
    
    if( isset($url[0]) ){
        include 'app/controllers/'.$url[0].'.php';
        $curl = new $url[0]();

        if(isset($url[2])){
            $curl->{$url[1]}($url[2]);
        }else{
            if(isset( $url[1] )){
                $curl->{$url[1]}();
            }
        }
    }else{
        include 'app/controllers/Index.php';
        $curl = new Index();
        $curl->home();
    }
?>