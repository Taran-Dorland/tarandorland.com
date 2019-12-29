<?php

$title = "Index";
include 'Includes/header.php';
?>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Taran Dorland</h3>
            <nav class="nav nav-masthead justify-content-center navbar-custom">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="https://projects.tarandorland.com">Projects</a>
            <a class="nav-link" href="contact.php">Contact</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Welcome to my webpage</h1>
        <p class="lead"></p>
        <p class="lead">
          <a href="contact.php" class="btn btn-lg btn-secondary">Learn more</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p class="foot-text">Boring, clean, yet functional webpage.</p>
        </div>
      </footer>
    </div>

    <?php include 'Includes/libraries.php'; ?>

  </body>
</html>

<?php




?>