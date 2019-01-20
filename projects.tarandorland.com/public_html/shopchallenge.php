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

    <!-- CSS -->
    <link href="css/main-projects.css" rel="stylesheet">
    
</head>

<body>

    <div class="wrapper-top">
        <div class="main-container">
            <div class="row-info">

                <h3><u>Toronto Waste Lookup</u></h3>

                <p>
                    Description:
                </p>

                <a class="btn-return" href="https://projects.tarandorland.com">Return to Project Directory</a>

            </div>
            <div class="row-search">
                <form action="shopchallenge.php" method="POST">
                    <div class="search-bar">
                        <input id="in1" class="form-control mr-sm-2" placeholder="Example: takeout" aria-label="Search" type="text" name="searchTxt" required>
                    </div>
                    <div class="btn-container">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    //-------------------------------------------------------------------------------------------------------------==
    $json = file_get_contents("https://secure.toronto.ca/cc_sr_v1/data/swm_waste_wizard_APR?limit=1000");
    $obj = json_decode($json);

    $list = new SplDoublyLinkedList();

    //Add all the keywords and their associated object reference to the linked list
    for ($x = 0; $x < count($obj); $x++) {

        $keywords = explode(",", $obj[$x] -> keywords);

        for ($i = 0; $i < count($keywords); $i++) {

            //Keyword + associated objects ref
            $arrData = array($keywords[$i], (string)$x);
            $list -> push($arrData);
        }
    }

    //Grab user input, send to search function
    if (isset($_POST['submit'])) {

        $inStr = $_POST['searchTxt'];
        
        $resultObjRef;

        for ($list -> rewind(); $list -> valid(); $list -> next()) {

            $curStr = $list -> current()[0];

            if ($curStr == $inStr) {
                //Strings match
                $resultObjRef = $resultObjRef . $list -> current()[1] . ",";
            }

            if ($list -> current()[0] == $inStr) {
                //Strings match
                $resultObjRef = $resultObjRef . $list -> current()[1] . ",";
            }
            echo $resultObjRef;
        }

        echo $resultObjRef;

        //Put results into an array
        $resultRefs = explode(",", $resultObjRef);
        
        for ($x = 0; $x < count($resultRefs); $x++) {
            echo $resultRefs[$x];
        }

        outputResults($resultRefs);
    }

    ?>

    <div class="wrapper-content">
        <div class="main-container">
            <?php 

            function outputResults($resultRefs) {

                //Output the results from the user's search
                for ($i = 0; $i < count($obj); $i++) {
                    for ($j = 0; $j < count($resultRefs); $j++) {

                        //If the result matches a json object, output json data
                        if ($i == $resultRefs[$j]) : ?>

                            <div class="results">
                                <?=$obj[$i] -> title?>
                            </div>

                    <?php endif;

                    }
                }
            }
                
            ?>
        </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>

</body>
</html>

<?php



?>