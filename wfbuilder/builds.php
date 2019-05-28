<?php






    $title = "Builds";
    include 'wfbuilder-includes/header.php';
?>

<body>

    <!-- Custom CSS -->

    <main>

        <?php include 'wfbuilder-includes/nav.php'; ?>

        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#frames">Frames</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#primary">Primary Weapons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#secondary">Secondary Weapons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#melee">Melee Weapons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#companions">Companions</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="frames">
                <?php include 'framebuilds.php'; ?>
            </div>
            <div class="tab-pane fade" id="primary">
                <?php include 'primarybuilds.php'; ?>
            </div>
            <div class="tab-pane fade" id="secondary">
                <?php include 'secondarybuilds.php'; ?>
            </div>
            <div class="tab-pane fade" id="melee">
                <?php include 'meleebuilds.php'; ?>
            </div>
            <div class="tab-pane fade" id="companions">
                <?php include 'companionbuilds.php'; ?>
            </div>
        </div>

    </main>

    <?php include 'wfbuilder-includes/libraries.php'; ?>

    <!-- Custom JS -->

</body>