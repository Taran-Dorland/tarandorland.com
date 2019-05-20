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
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="includes/css/main-projects.css" rel="stylesheet">
    
</head>

<body>

    <div class="wrapper-top">
        <div class="main-container">
            <div class="row-info">

                <h2><u>Toronto Waste Lookup</u></h2>

                <p>
                    Allow's the user to search through waste items using the Toronto Waste Wizard database, and save frequently used ones. <br>
                    Good Examples: can, paper, bottle
                </p>

                <div><a class="btn-return" href="https://projects.tarandorland.com">Return to Project Directory</a></div>
                <div><a href="https://secure.toronto.ca/cc_sr_v1/data/swm_waste_wizard_APR?limit=1000" target="_blank">Data being used (JSON)</a></div>
                <div><a href="https://github.com/Taran-Dorland/tarandorland.com/blob/master/projects.tarandorland.com/public_html/shopchallenge.php" target="_blank">Source Code</a></div>
                

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
    /*  By: Taran Dorland
        Date: 1/20/2019
        Created with: PHP, Javascript

        Files Being Used:
            - shopchallenge.php
            - js/shopchallenge.js
            - css/main-projects.css

        Purpose: Fetches waste data from public api, allows user to search the data and it will return
                 data (Title and information) based on keywords. User can also favourite each object returned
                 which will be displayed with a green star next to them.

        Known bugs/poor design decisions:
            - Object 0 will be returned no matter what keyword was searched because of the data structure I used (Linked list),
              and how I fetched and compared the data inside of it
            - The search button is strictly php so every time the user enters a search their list of favourites disappears (Page reloads
              itself because it uses an html form and php's $_POST), should have used JS
            - Overall design (css) could look nicer
            - Probably could have used more javascript to handle more of the client side tasks (searching, outputting)
    */

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
    <script src="includes/js/jquery.min.js"></script>

    <!-- Popper -->
    <script src="includes/js/popper.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="includes/js/bootstrap.min.js"></script>

    <!-- Custom Javascript -->
    <script src="includes/js/shopchallenge.js"></script>

</body>
</html>