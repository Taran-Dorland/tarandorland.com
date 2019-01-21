<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shopify Challenge</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="css/main-projects.css" rel="stylesheet">
    
</head>

<body>

    <div class="wrapper-top">
        <div class="main-container">
            <div class="row-info">

                <h2><u>Toronto Waste Lookup</u></h2>

                <p>
                    Description:
                </p>

                <div><a class="btn-return" href="https://projects.tarandorland.com">Return to Project Directory</a></div>
                <div><a href="https://secure.toronto.ca/cc_sr_v1/data/swm_waste_wizard_APR?limit=1000" target="_blank">JSON Data being used</a></div>
                <div><a href="#" target="_blank">Source Code</a></div>
                

            </div>
            <div class="row-search">
                <form action="#" method="POST">
                    <div class="search-bar">
                        <input id="in1" class="form-control mr-sm-2" placeholder="Example: takeout" aria-label="Search" type="text" name="searchTxt" required>
                    </div>
                    <div class="btn-container">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search">
                    </div>
                </form>
            </div>
        </div>
        <div class="main-container">
            <h4>Results:</h4>
        </div>
    </div>

    <?php
    //-------------------------------------------------------------------------------------------------------------==
    $json = file_get_contents("https://secure.toronto.ca/cc_sr_v1/data/swm_waste_wizard_APR?limit=1000");
    $obj = json_decode($json);

    $list = new SplDoublyLinkedList();

    //Add all the keywords and their associated object reference to the linked list
    for ($x = 0; $x < count($obj); $x++) {

        //Needs to account for both ',' and ' ' in order to search keywords correctly
        $keywords = explode(",", $obj[$x] -> keywords);
        $spc_sep = implode(" ", $keywords);
        $keywords = explode(" ", $spc_sep);

        //Put each obj into an array, then put those arrays into the linked list
        for ($i = 0; $i < count($keywords); $i++) {

            //Keyword + associated objects ref
            $arrData = array($keywords[$i], (string)$x);
            $list -> push($arrData);
        }
    }

    //Grab user input, search items in the list
    if (isset($_POST['submit'])) {

        //Get user input
        $inStr = $_POST['searchTxt'];

        //Set to lowercase
        $inStr = strtolower($inStr);
        
        $resultObjRef;

        //Checks input str against each keyword str in the linked list
        for ($list -> rewind(); $list -> valid(); $list -> next()) {

            $curStr = $list -> current()[0];
            $curNum = $list -> current()[1];
            
            //SPECIAL CASES:
            $inStr_spc = "(" . $inStr . ")";

            //String up the approproiate obj number references to be exploded into an array
            if ($curStr == $inStr) {
                //Strings match
                $resultObjRef = $resultObjRef . $curNum . ",";
            } else if ($curStr == $inStr_spc) {
                //Strings match
                $resultObjRef = $resultObjRef . $curNum . ",";
            }
        }

        //Put results into an array
        $resultRefs = explode(",", $resultObjRef);

        //No duplicate Values
        $result_refs = array_unique($resultRefs);

        //Output results
        outputResults($result_refs, $obj);
    }

    function outputResults($rrOut, $obj_out) { ?>

        <div class="wrapper-content">
            <div class="main-container-3">

        <?php

        //Cant think of another way to fix this bug
        $stop = false;

        //Output the results from the user's search
        for ($i = 0; $i < count($obj_out); $i++) {
            for ($j = 0; $j < count($rrOut); $j++) {

                $oot = $obj_out[$i] -> title;
                $oob = $obj_out[$i] -> body;

                //Prevents duplication results from obj 0
                if ($i == 0) {
                    if ($rrOut[$j] == 0) {
                        if ($stop == true) {
                            $rrOut[$j] = -1;
                        }
                        $stop = true;
                    }
                }

                //If the result matches a json object, output json data, decode body for html elements
                //All html items are generated with an id corresponding to the id of the appropriate json obj
                if ($i == $rrOut[$j]) : ?>

                    <div id="r<?=$i?>" class="results">
                        <div id="s<?=$i?>" class="star">
                            <a href="#id=<?=$i?>" id="st<?=$i?>" class="favA">
                                <span id="sp<?=$i?>" onclick="favouriteItem()" class="fa fa-star" checked="false"></span>
                            </a>
                        </div>
                        <div id="t<?=$i?>" class="title">
                            <?=$oot = html_entity_decode($oot)?>
                        </div>
                        <div id="b<?=$i?>" class="body">
                            <?=$oob = html_entity_decode($oob)?>
                        </div>
                    </div>

            <?php endif;

            }
        }
    }
    ?>
        </div>

        <div id="favCon" class="main-container">
            <h4>Favourites:</h4>
        </div>
    </div>

    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>

    <!-- Popper -->
    <script src="js/popper.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Javascript -->
    <script src="js/shopchallenge.js"></script>

</body>
</html>

<?php



?>