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
                    <input id="in1" class="form-control mr-sm-2" placeholder="Example: lirik" aria-label="Search" type="text">
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

    ?>

    <div class="wrapper-content">
        <div class="main-container">
            <?php 

            $test = "TEST MESSAGE";

            //echo $obj[1] -> keywords;

            for ($x = 0; $x < 100; $x++) {
                echo $obj[$x] -> keywords;
            }
            
            ?>
        </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php




?>