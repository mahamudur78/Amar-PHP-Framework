<?php 
    if(isset($GLOBALS['enqueueCss'])){
        foreach($GLOBALS['enqueueCss'] as $key => $value){
            echo $value."\n";
        } 
    }

    if(isset($GLOBALS['enqueueJsHader'])){
        foreach($GLOBALS['enqueueJsHader'] as $key => $value){
            echo $value."\n";
        } 
    }
?>