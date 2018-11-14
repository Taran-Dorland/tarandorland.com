<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>COIS-3400 Project</title>

    <!-- CSS -->
    <link href="css/3400project.css" rel="stylesheet">
    
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
			
			
            Firstname: <input type="text" name="firstname">	<br> <br>
            Lastname: <input type="text" name="lastname">	<br> <br>
            Age: <input type="number" name="age" min="13" max="100" id="age"> <br> <br>

            <input type="submit">	

            </center>

        </form>

        </div>
    </div>

    <div class="div-bottom">
        <a href="index.html">Return</a>
    </div>

</body>
</html>

<?php

//Values used to connect to DB
$servername = "tarandorland.com";
$username = "tarandb";
$password = "dblogin13542";
$database = "3400_project";
$sql = "INSERT INTO test_table_1(firstName, lastName, age) VALUES(?,?,?);";

//Connect to DB
$conn = mysqli_connect($servername, $username, $password, $database);

//Prepare statement
if (!($stmt = $conn -> prepare($sql))) {
    echo "Prepare failed: (" . $conn -> errno . ") " . $conn -> error;
}

//Bind statement
$id = 1;
if (!$stmt -> bind_param("i", $id)) {
    echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
}

//Execute statement
if (!$stmt -> execute()) {
    echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
}



?>