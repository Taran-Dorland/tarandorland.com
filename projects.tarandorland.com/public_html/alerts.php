<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>COIS-3400 Project</title>

        <!-- Bootstrap Core CSS -->
        <link href="includes/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="includes/css/main.css" rel="stylesheet">
    
    </head>

    <body>

        <div class="div-form">

            <form action="alerts.php" method="post">
                <input type="submit" name='submit' onclick="">	<br>
            </form>

            <a href="index.html">Return</a> <br>

        </div>

    </body>
</html>

<?php

if (isset($_POST['submit'])) {

    //warframeScrape();

}

function warframeScrape() {

    
    $json = file_get_contents("https://api.warframestat.us/pc");
    $obj = json_decode($json);

    echo $obj;

}
?>