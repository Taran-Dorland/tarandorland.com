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

    //Data Structure
    //INFO:
    //https://rosettacode.org/wiki/AVL_tree#Java
    //https://stackoverflow.com/questions/14288534/php-compare-alphabet-position
    //https://en.wikipedia.org/wiki/AVL_tree
    //https://stackoverflow.com/questions/15538479/search-for-multiple-keywords-with-php-and-mysql-where-x-like
    //https://stackoverflow.com/questions/10758897/parsing-json-array-with-php-foreach
    //https://stackoverflow.com/questions/29308898/how-do-i-extract-data-from-json-with-php
    class AVL {

        private $root;

        public function _construct() {
            
        }


        public function insert($val) {

            if ($root == null) {
                $root = new Node($val, null);
                return true;
            }

            $n = $root;
            while (true) {
                if ($n -> val == $val) {
                    return false;
                }

                $parNode = $n;

                //EDIT THIS WITH STRING CHECK
                $goLeft = $n -> val > $val;

                $n = $goLeft ? $n -> left : $n -> right;

                if ($n == null) {
                    if ($goLeft) {
                        $parNode -> left = new Node($val, $parNode);
                    } else {
                        $parNode -> right = new Node($val, $parNode);
                    }
                    rebalance($parNode);
                    break;
                }

            }
            return true;
        }

        private function rebalance(Node $n) {

            setBalance1($n);

            if ($n -> balance == -2) {
                if (height($n -> left -> left) >= height($n -> left -> right)) {
                    $n = rotateRight($n);
                } else {
                    $n = rotateLeftThenRight($n);
                }
            } else if ($n -> balance == 2) {
                if (height($n -> right -> right) >= height($n -> right -> left)) {
                    $n = rotateLeft($n);
                } else {
                    $n = rotateRightThenLeft($n);
                }
            }

            if ($n -> parentNode != null) {
                rebalance($n -> parentNode);
            } else {
                $root = $n;
            }
        }

        private function rotateLeft(Node $a) {

        }

        private function rotateRight(Node $a) {

        }

        private function rotateLeftThenRight(Node $n) {

            $n -> left = rotateLeft($n -> left);
            return rotateRight($n);
        }

        private function rotateRightThenLeft(Node $n) {

            $n -> right = rotateRight($n -> right);
            return rotateLeft($n);
        }

        private function height(Node $n) {
            if ($n == null) {
                return -1;
            }
            return $n -> height;
        }

        private function setBalance1(Node $n) {

        }

        private function setBalance2(Node $n1, Node $n2) {

        }


    }

    class Node {

        private $val;
        private $balance;
        private $height;
        private $left;
        private $right;
        private $parentNode;

        public function _construct($val, $parentNode) {
            $this -> val = $val;
            $this -> parentNode = $parentNode;
        }
    }
    //

    ?>

    <div class="wrapper-content">
        <div class="main-container">
            <?php 

            function outputResults() {

            //Output the results from the user's search
            for ($x = 0; $x < count($obj); $x++) : ?>

                <div class="results">
                    <?=$obj[$x] -> keywords?>
                </div>

            <?php endfor; } ?>
        </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php




?>