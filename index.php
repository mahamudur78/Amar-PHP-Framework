<?php
    //Include Config File
    include_once 'config/config.php';
    //SPL Autoload Register
    spl_autoload_register(function( $class ){
        include_once 'system/libs/'.$class.'.php';
    });

    //Call Main OBject
    new Main();
?>