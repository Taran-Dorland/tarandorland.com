<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Primary.json");
    $obj = json_decode($JSON, TRUE);

    //include '../wfbuilder/wfbuilder-includes/dblib.php';
    //$pdo = & dbconnect();
    //$sql = "";

    foreach ($obj as $key => $val) {

        $polarities = "";
        if (isset($val['polarities'])) {
            $polarities = implode(",", $val['polarities']);
        }

        $dmgTypes = "";
        if (isset($val['damageTypes'])) {
            $dmgTypes = implode(",", $val['damageTypes']);
        }

        print_r($val['name'] . $val['type'] . $val['magazineSize'] . $val['reloadTime'] . $val['ammo'] . $val['totalDamage'] . $dmgTypes . $val['damagePerSecond'] . $val['accuracy'] . $val['criticalChance'] . $val['criticalMultiplier'] . $val['procChance'] . "<br>");
        echo $polarities . "<br>";

    }





?>