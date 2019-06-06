<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Warframes.json");
    $obj = json_decode($JSON, TRUE);


    //include 'wfbuilder/wfbuilder-includes/dblib.php';

    //$pdo = & dbconnect();

    //$sql = "INSERT INTO wf_frames(Name, Armour, Energy, Health, Shield, Sprint_Speed, Passive_Desc, Aura_Polarity, Polarities, Wiki_Thumb, Wiki_Url) VALUES(?,?,?,?,?,?,?,?,?,?,?);";

    foreach ($obj as $key => $val) {

        print_r($key['name'] . $key['armor'] . $key['power'] . $key['health'] . $key['shield'] . $key['sprintspeed'] . $key['passivedescription'] . $key['aura'] . $key['polarities'] . $key['wikiaThumbnail'] . $key['wikiaUrl'] . "<br>");

        //$stmt = $pdo -> prepare($sql);
        //$stmt -> execute([$key['name'], $key['armor'], $key['power'], $key['health'], $key['shield'], $key['sprintspeed'], $key['passivedescription'], $key['aura'], $key['polarities'], $key['wikiaThumbnail'], $key['wikiaUrl']]);
    }




?>