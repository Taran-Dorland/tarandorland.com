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

            <form action="index.php" method="post">
			
			
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

//Values from html input form
$firstName = @$_POST['firstname'];
$lastName = @$_POST['lastname'];
$age = @$_POST['age'];

//Values used to connect to DB
$servername = "localhost";
$username = "tarandb";
$password = "dblogin13542";
$database = "3400_project";
$sql = "INSERT INTO test_table_1(firstName, lastName, age) VALUES($firstName, $lastName, $age);";

//Connect to database
$conn = mysqli_connect($servername, $username, $password, $database);

//Check connection
if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: ".mysqli_connect_error();
} else {
    echo "Succesfully connected to MySQL";
}

//Execute database query
mysqli_query($conn, $sql);

//Check if it is successful
if (mysqli_query($conn, $sql)) {
    echo "Data submitted successfully";
} else {
    echo "Error submitting data: " . mysqli_error();
}

//Close database connection
mysqli_close($conn);

?>