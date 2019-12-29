<?php

$title = "Contact";
include 'Includes/header.php';
?>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Taran Dorland</h3>
            <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="https://projects.tarandorland.com">Projects</a>
            <a class="nav-link active" href="#">Contact</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <div class="inner">
          <h3 class="cover-heading">Contact methods:</h3>
          <ul>
            <li><i class="fab fa-github"></i><a class="contact-item" href="https://github.com/Taran-Dorland">Github</a></li>
            <li><i class="fab fa-linkedin"></i><a class="contact-item" href="https://www.linkedin.com/in/taran-d-44332b147/">LinkedIn</a></li>
            <li><i class="fas fa-envelope-square"></i><a class="contact-item" href="#">taran@tarandorland.com</a></li>
          </ul>
        </div>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p class="foot-text"></p>
        </div>
      </footer>
    </div>

    <?php include 'Includes/libraries.php'; ?>

  </body>
</html>