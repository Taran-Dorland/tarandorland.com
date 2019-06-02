<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Mods.json");
    $obj = json_decode($JSON, TRUE);

    $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($obj), RecursiveIteratorIterator::SELF_FIRST);

    include 'wfbuilder-includes/dblib.php';

    $pdo = & dbconnect();


    //rint_r($obj[0]);

    
    //foreach ($jsonIterator as $key => $val) {
        //if(!is_array($val)) {
            
            


        //}
    //}















?>