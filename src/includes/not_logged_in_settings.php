<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "settings";
      $title = "Settings | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main class="col d-flex flex-column justify-content-between align-items-center flex-wrap h-100 ms-2 rounded rgb-shadow p-5">
          <div class="col d-flex flex-column justify-content-evenly align-items-center p-3">
            <form class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch"
              id="theme-switch">
              <label class="form-check-label" for="theme-switch">
                Dark / Light mode
              </label>
            </form>
          </div>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/settings.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
