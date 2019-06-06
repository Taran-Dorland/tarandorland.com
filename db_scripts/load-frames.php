<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Warframes.json");
    $obj = json_decode($JSON, TRUE);


    //include 'wfbuilder/wfbuilder-includes/dblib.php';

    //$pdo = & dbconnect();

    //$sql = "";

    //
    foreach ($obj as $key => $val) {

        print_r($val['name']);

    }




?>