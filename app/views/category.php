<?php
    include_once 'header.php';
       echo '<h1>Category List</h1>';

       foreach( $cat as $key => $value){
        echo $value['name'].'<br>';
        
       }
    include_once 'fooder.php';
?>