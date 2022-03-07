<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Settings | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <!-- Navbar -->
        <div id="navbar" class="navbar col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div id="main" class="main col ms-2 rounded rgb-shadow">
          <form class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch"
            id="theme-switch">
            <label class="form-check-label" for="theme-switch">
            Dark / Light mode</div>
        </div>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./src/scripts/settings.js"></script>
    <script src="./src/scripts/main.js"></script>
  </body>
</html>
