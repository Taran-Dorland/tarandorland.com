<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Melee.json");
    $obj = json_decode($JSON, TRUE);

    include '../wfbuilder/wfbuilder-includes/dblib.php';
    $pdo = & dbconnect();
    $sql = "";

    foreach ($obj as $key => $val) {

        //Fits all polarities into a col
        $polarities = "";
        if (isset($val['polarities'])) {
            $polarities = implode(",", $val['polarities']);
        }

        $dmgTypes = "";
        if (isset($val['damageTypes'])) {

            //Fit all the damage types with their names and damage into a col
            $array = array();
            foreach ($val['damageTypes'] as $k => $v) {

                $element = $k . ":" . $v;
                array_push($array, $element);
            }

            $dmgTypes = implode(",", $array);
        }

        //SQL queries setup to avoid errors
        if (isset($val['ammo']) && isset($val['damage'])) {
            $sql = "INSERT INTO wf_melee_weapons(Name, Type, Mag_Size, Reload_Time, Max_Ammo, Damage, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $val['ammo'], $val['damage'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);

        } else if (!isset($val['ammo']) && !isset($val['damage'])) {
            $sql = "INSERT INTO wf_melee_weapons(Name, Type, Mag_Size, Reload_Time, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);

        } else if (!isset($val['damage'])) {
            $sql = "INSERT INTO wf_melee_weapons(Name, Type, Mag_Size, Reload_Time, Max_Ammo, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $val['ammo'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);

        } else if (!isset($val['ammo'])) {
            $sql = "INSERT INTO wf_melee_weapons(Name, Type, Mag_Size, Reload_Time, Damage, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $val['damage'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);
        }

    }

    //Return
    header("Location: ../wfbuilder/main.php");
?>