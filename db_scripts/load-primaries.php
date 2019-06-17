<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Primary.json");
    $obj = json_decode($JSON, TRUE);

    include '../wfbuilder/wfbuilder-includes/dblib.php';
    $pdo = & dbconnect();
    $sql = "";

    foreach ($obj as $key => $val) {

        $polarities = "";
        if (isset($val['polarities'])) {
            $polarities = implode(",", $val['polarities']);
        }

        $dmgTypes = "";
        if (isset($val['damageTypes'])) {
            $dmgTypes = implode(",", $val['damageTypes']);
        }

        if (isset($val['ammo']) && isset($val['damage'])) {
            $sql = "INSERT INTO wf_primary_weapons(Name, Type, Mag_Size, Reload_Time, Max_Ammo, Damage, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $val['ammo'], $val['damage'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);

        } else if (!isset($val['ammo']) && !isset($val['damage'])) {
            $sql = "INSERT INTO wf_primary_weapons(Name, Type, Mag_Size, Reload_Time, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);

        } else if (!isset($val['damage'])) {
            $sql = "INSERT INTO wf_primary_weapons(Name, Type, Mag_Size, Reload_Time, Max_Ammo, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $val['ammo'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);

        } else if (!isset($val['ammo'])) {
            $sql = "INSERT INTO wf_primary_weapons(Name, Type, Mag_Size, Reload_Time, Damage, Damage_Type, Fire_Rate, Dps, Accuracy, Crit_Chance, Crit_Mult, Status_Chance, Polarities) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$val['name'], $val['type'], $val['magazineSize'], $val['reloadTime'], $val['damage'], $dmgTypes, $val['fireRate'], $val['damagePerSecond'], $val['accuracy'], $val['criticalChance'], $val['criticalMultiplier'], $val['procChance'], $polarities]);
        }

    }

    //Return
    header("Location: ../wfbuilder/main.php");
?>