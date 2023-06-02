<?php
    include_once 'header.php';
       echo '<h1>Category By ID</h1>';

       foreach( $catbyid as $key => $value){
        echo $value['name'].'<br>';
        
       }
    include_once 'fooder.php';
?>