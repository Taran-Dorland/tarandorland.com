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
                <div class="search-bar">
                    <input id="in1" class="form-control mr-sm-2" placeholder="Example: takeout" aria-label="Search" type="text">
                </div>
                <div class="btn-container">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="">Search</button>
                </div>
            </div>
        </div>
    </div>

    <?php

    $json = file_get_contents("https://secure.toronto.ca/cc_sr_v1/data/swm_waste_wizard_APR?limit=1000");
    $obj = json_decode($json);

    $LL = new LinkedList();

    //Add all the keywords and their associated object reference to the linked list
    for ($x = 0; $x < count($obj); $x++) {

        $keywords = explode(",", $obj[$x] -> keywords);

        for ($i = 0; $i < count($keywords); $i++) {

            $LL -> addLast($keywords[$i], $x);
        }
    }

    $LL -> outputResults();

    class Node {

        public $next;
        public $data;
        public $numVal;
    }

    class LinkedList {

        private $head;
        private $tail;

        public function _construct() {
            $head = null;
            $tail = null;
        }

        public function addLast($data, $numVal) {

            if ($head == null) {

                $head = new Node();
                $head -> data = $data;
                $head -> numVal = $numVal;
                $head -> next = null;

                $tail = $head;
            } else {

                $toAdd = new Node();
                $toAdd -> data = $data;
                $toAdd -> numVal = $numVal;

                $current = $head;
                while ($current -> next != null) {
                    $current = $current -> next;
                }

                $current -> next = $toAdd;
                $tail = $toAdd;
            }
        }

        public function search($inStr) {

            $curNode = $head;
            while ($curNode -> next != null) {
                //Check each val against input val
            }
        }
    }
    //

    ?>

    <div class="wrapper-content">
        <div class="main-container">
            <?php 

            function outputResults() {

                $cur = $head;

                //Output the results from the user's search
                while ($cur != null) : ?>

                <div class="results">
                    <?=$cur -> data?>
                </div>

                <?php endwhile; } ?>
        </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php




?>