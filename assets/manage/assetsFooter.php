<?php 
    if(isset($GLOBALS['enqueueJsFooter'])){
        foreach($GLOBALS['enqueueJsFooter'] as $key => $value){
            echo $value."\n";
        } 
    }
?>