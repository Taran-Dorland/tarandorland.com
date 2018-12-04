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

            <input type="submit" name='submit'>	

            </center>

        </form>

        </div>
    </div>

    <div class="div-bottom">
        <a href="index.html">Return</a>
    </div>

    <div style="Padding-left: 23.5%;">
        <button action="3400project.php" type="button" name="saveBtn">Save Data</button>
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

//Connect to DB
$conn = new mysqli($servername, $username, $password, $database);

//Check connection
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

//Saves data from table to .csv
if (lisset($_POST['saveBtn'])) {
    saveTableData($conn);
}

//Uses prepared statements to insert data into table
if (isset($_POST['submit'])) {
    insertTableData($conn);
}

$conn -> close();

function saveTableData($conn) {

    $sql = "SELECT * FROM customer ORDER BY CustomerID DESC;";

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  

    $output = fopen("php://output", "w");

    fputcsv($output, array('Customer ID', 'First Name', 'Last Name', 'Date of Birth', 'Email', 'Phone Number'));

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result))
    {  
        fputcsv($output, $row);  
    }

    fclose($output);
}

function insertTableData($conn) {

    $sql = "INSERT INTO customer(CustomerID, FirstName, LastName, DateOfBirth, Email, PhoneNumber) VALUES(?,?,?,?,?,?);";

    //Prepare and Bind
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("isssss", $_POST['customerId'], $_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['email'], $_POST['phoneNum']);

    //Execute
    $stmt -> execute();

    //Close connections
    $stmt -> close();
    $conn -> close();

    header("location: 3400project.php");
}

?>