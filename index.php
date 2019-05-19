<?php






    $title = "Index";
    include '/Includes/header.php';
?>

<body>
    <main>

        <?php include '/Includes/nav.php'; ?>

        <?php

        echo "TEST123 ";
        echo $title . " ";

        var_dump(substr(sprintf('%o', fileperms('/include/libs.php')), -4));
        ?>


    </main>

    <?php include '/Includes/libraries.php'; ?>

    <!-- Custom JS -->
    <script src="includes/js/index.js"></script>

</body>


<?php









?>