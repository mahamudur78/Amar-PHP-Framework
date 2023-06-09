<?php
    //SPL Autoload Register
    spl_autoload_register(function( $class ){
        include_once "system/libs/".$class.".php";
    });

    include_once "app/config/config.php";
    //Call Main OBject
    new Main();
?>