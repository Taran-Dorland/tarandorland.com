<?php

    $JSON = file_get_contents("../node_modules/warframe-items/data/json/Mods.json");
    $obj = json_decode($JSON, TRUE);

    //include 'wfbuilder/wfbuilder-includes/dblib.php';

    //$pdo = & dbconnect();

    //$sql = "INSERT INTO wf_mods(Mod_Category, Mod_Name, Mod_Desc, Mod_Polarity, Mod_Base, Mod_Limit, Mod_Rarity, Mod_Image) VALUES (?,?,?,?,?,?,?,?)";

    $_MODNAME;
    $_MODPOLARITY;
    $_MODRARITY;
    $_MODDRAIN;
    $_MODLIMIT;
    $_MODDESC;
    $_MODTYPE;
    $_MODIMG;

    foreach ($obj as $arr) {
        foreach ($arr as $key => $val) {

            //Get correct variables
            switch ($key) {
                case "name":
                    $_MODNAME = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;

                case "polarity":
                    $_MODPOLARITY = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;

                case "rarity":
                    $_MODRARITY = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;

                case "baseDrain":
                    $_MODDRAIN = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;

                case "fusionLimit":
                    $_MODLIMIT = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;

                case "description":
                    $_MODDESC = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;

                case "type":
                    $_MODTYPE = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;

                case "imageName":
                    $_MODIMG = $val;
                    //echo $key . ": " . $val . "<br>";
                    break;
            }
            
        }

        //Execute SQL
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$_MODTYPE, $_MODNAME, $_MODDESC, $_MODPOLARITY, $_MODDRAIN, $_MODLIMIT, $_MODRARITY, $_MODIMG]);

    }

    //Return
    header("Location: main.php");
?>