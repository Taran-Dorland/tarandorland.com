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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/main.css" rel="stylesheet">
    
</head>

<body>

    <div class="main-div">
        <p>Your PHP file is working :)</p>
        <div class="div-pasta">
            <p>
            ░░░░░░░░▄▄▄▀▀▀▄▄███▄░░░░░░░░░░░░░░
            ░░░░░▄▀▀░░░░░░░▐░▀██▌░░░░░░░░░░░░░
            ░░░▄▀░░░░▄▄███░▌▀▀░▀█░░░░░░░░░░░░░
            ░░▄█░░▄▀▀▒▒▒▒▒▄▐░░░░█▌░░░░░░░░░░░░
            ░▐█▀▄▀▄▄▄▄▀▀▀▀▌░░░░░▐█▄░░░░░░░░░░░
            ░▌▄▄▀▀░░░░░░░░▌░░░░▄███████▄░░░░░░
            ░░░░░░░░░░░░░▐░░░░▐███████████▄░░░
            ░░░░░le░░░░░░░▐░░░░▐█████████████▄
            ░░░░toucan░░░░░░▀▄░░░▐█████████████▄ 
            ░░░░░░has░░░░░░░░▀▄▄███████████████ 
            ░░░░░arrived░░░░░░░░░░░░█▀██████░░
        </p>
        </div>

        <div class="div-form">

            <form action="3400project.php" method="post">
			
			
            CustomerID: <input type="number" name="customerId" min="0"> <br> <br>
            Firstname: <input type="text" name="firstname">	<br> <br>
            Lastname: <input type="text" name="lastname">	<br> <br>
            Date of Birth: <input type="date" name="age" id="age"> <br> <br>
            Email: <input type="text" name="email"> <br> <br>
            Phone Number: <input type="text" name="phoneNum"> <br> <br>

            <input type="test" name='submit'>

            </center>

        </form>

        </div>
    </div>

    <div class="div-bottom">
        <a href="index.html">Return</a>
    </div>

    <div style="Padding-left: 23.5%;">
        <form action="3400project.php" method="post">
            <input type="submit" name="export"> <br>
        </form>
    </div>

</body>
</html>

<?php

//Sources + Info
//https://www.w3schools.com/php/php_mysql_prepared_statements.asp
//http://php.net/manual/en/mysqli.quickstart.prepared-statements.php
//https://stackoverflow.com/questions/35220022/mysqli-export-table-to-csv

//Values used to connect to DB
$servername = "localhost";
$username = "tarandb";
$password = "dblogin13542";
$database = "3400_project";
$sql = "";

//Connect to DB
$conn = new mysqli($servername, $username, $password, $database);

//Check connection
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

//Saves data from table to .csv file
if (lisset($_POST['export'])) {

    $sql = "SELECT * FROM customer ORDER BY CustomerID DESC;";

    $filename = "backup";
    $mime = "application/x-gzip";

    header("Content-Type: " . $mime);
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $cmd = "mysqldump -u $username --password=$password $database | gzip --best";
    
    passthru($cmd);

    exit(0);
}

//Uses prepared statements to insert data into table
if (isset($_POST['submit'])) {

    $sql = "INSERT INTO customer(CustomerID, FirstName, LastName, DateOfBirth, Email, PhoneNumber) VALUES(?,?,?,?,?,?);";

    //Prepare and Bind
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("ssssss", $_POST['customerId'], $_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['email'], $_POST['phoneNum']);

    //Execute
    $stmt -> execute();

    //Close connections
    $stmt -> close();
    $conn -> close();

    header("location: 3400project.php");
}

$conn -> close();

?>