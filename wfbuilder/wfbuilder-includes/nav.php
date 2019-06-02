<?php



?>

<nav class="navbar navbar-expand-sm navbar-collapse-sm navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Builds
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="builds.php">Builds</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="builds.php#frames">Warframes</a>
                    <a class="dropdown-item" href="builds.php#primary">Primary Weapons</a>
                    <a class="dropdown-item" href="builds.php#secondary">Secondary Weapons</a>
                    <a class="dropdown-item" href="builds.php#melee">Melee Weapons</a>
                    <a class="dropdown-item" href="builds.php#companions">Companions</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newbuild.php">Create a Build</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="load-data.php">Mod List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Arcane List</a>
            </li>
        </ul>
    </div>
</nav>

<?php




?>