<?php

$title = "Contact";
include 'Includes/header.php';
?>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Taran Dorland</h3>
            <nav class="nav nav-masthead justify-content-center navbar-custom">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="https://projects.tarandorland.com">Projects</a>
            <a class="nav-link active" href="#">Contact</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <div class="inner text-left">
          <div class="text-left text-nowrap">
            <h2 class="cover-heading">About</h2>
            <p class="date-text">28-12-2019</p>
          </div>
          <hr class="seperator">
          <p class="lead">I am a software <a href="https://www.youtube.com/watch?v=KMU0tzLwhbE" target="_blank">developer</a> who is open to all kinds of opportunities. Factorio and Rimworld are
            my current favourite games. I have seen the light and now use Linux as my everyday OS, specifically Manjaro.
          </p>
          <hr class="seperator">
          <h2 class="cover-heading">Contact</h2>
          <div class="inner-list-text">
            <li class="contact-list-item"><i class="fab fa-github"></i> <a class="contact-item" href="https://github.com/Taran-Dorland" target="_blank">Github</a></li>
            <li class="contact-list-item"><i class="fab fa-linkedin"></i> <a class="contact-item" href="https://www.linkedin.com/in/taran-d-44332b147/" target="_blank">LinkedIn</a></li>
            <li class="contact-list-item"><i class="fas fa-envelope-square"></i> <a class="contact-item" href="#" target="_blank">taran@tarandorland.com</a></li>
          </div>
        </div>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p class="foot-text">This is a <a href="https://en.wikipedia.org/wiki/LAMP_(software_bundle)" target="_blank">LAMP</a> server, hosted on <a href="https://www.digitalocean.com/" target="_blank">Digital Ocean</a>.</p>
        </div>
      </footer>
    </div>

    <?php include 'Includes/libraries.php'; ?>

  </body>
</html>