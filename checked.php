<?php

$skill= $_POST['skill'];
    $a = array(0,0,0,0,0,0,0,0,0,0);

    foreach ($skill as $b){
        echo $b;
        $a[$b]=1;
    }
    
?>
