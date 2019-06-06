<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Warframes.json");
    $obj = json_decode($JSON, TRUE);

    //include '../wfbuilder/wfbuilder-includes/dblib.php';
    //$pdo = & dbconnect();
    //$sql = "";

    foreach ($obj as $key => $val) {

        //Convert array of polarities to a string
        $polarities = implode(",", $val['polarities']);

        //Frame contains both thumbnail and aura
        if (isset($val['wikiaThumbnail']) && isset($val['aura'])) {
            $sql = "INSERT INTO wf_frames(Name, Armour, Energy, Health, Shield, Sprint_Speed, Passive_Desc, Aura_Polarity, Polarities, Wiki_Thumb, Wiki_Url) VALUES(?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['armor'], $val['power'], $val['health'], $val['shield'], $val['sprintSpeed'], $val['passiveDescription'], $val['aura'], $polarities, $val['wikiaThumbnail'], $val['wikiaUrl']]);

        //Frame contains aura
        } else if (!isset($val['wikiaThumbnail'])) {
            $sql = "INSERT INTO wf_frames(Name, Armour, Energy, Health, Shield, Sprint_Speed, Passive_Desc, Aura_Polarity, Polarities,  Wiki_Url) VALUES(?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['armor'], $val['power'], $val['health'], $val['shield'], $val['sprintSpeed'], $val['passiveDescription'], $val['aura'], $polarities, $val['wikiaUrl']]);

        //Frame contains thumbnail
        } else if (!isset($val['aura'])) {
            $sql = "INSERT INTO wf_frames(Name, Armour, Energy, Health, Shield, Sprint_Speed, Passive_Desc, Polarities, Wiki_Thumb, Wiki_Url) VALUES(?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['armor'], $val['power'], $val['health'], $val['shield'], $val['sprintSpeed'], $val['passiveDescription'], $polarities, $val['wikiaThumbnail'], $val['wikiaUrl']]);

        //Frames contains neither thumbnail or aura
        } else if (!isset($val['aura']) && !isset($val['wikiaThumbnail'])) {
            $sql = "INSERT INTO wf_frames(Name, Armour, Energy, Health, Shield, Sprint_Speed, Passive_Desc, Polarities, Wiki_Url) VALUES(?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['armor'], $val['power'], $val['health'], $val['shield'], $val['sprintSpeed'], $val['passiveDescription'], $polarities, $val['wikiaUrl']]);
        }

    }

    //Return
    header("Location: ../wfbuilder/main.php");
?>