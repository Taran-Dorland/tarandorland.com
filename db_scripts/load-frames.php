<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Warframes.json");
    $obj = json_decode($JSON, TRUE);


    //include 'wfbuilder/wfbuilder-includes/dblib.php';

    //$pdo = & dbconnect();

    //$sql = "INSERT INTO wf_frames(Name, Armour, Energy, Health, Shield, Sprint_Speed, Passive_Desc, Aura_Polarity, Polarities, Wiki_Thumb, Wiki_Url) VALUES(?,?,?,?,?,?,?,?,?,?,?);";

    foreach ($obj as $key => $val) {

        print_r($val['name'] . $val['armor'] . $val['power'] . $val['health'] . $val['shield'] . $val['sprintSpeed'] . $val['passiveDescription'] . $val['aura'] . $val['polarities'] . $val['wikiaThumbnail'] . $val['wikiaUrl'] . "<br>");

        //$stmt = $pdo -> prepare($sql);
        //$stmt -> execute([$val['name'], $val['armor'], $val['power'], $val['health'], $val['shield'], $val['sprintspeed'], $val['passivedescription'], $val['aura'], $val['polarities'], $val['wikiaThumbnail'], $val['wikiaUrl']]);
    }




?>