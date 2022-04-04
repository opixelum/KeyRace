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
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main class="col ms-2 rounded rgb-shadow">
          <form class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch"
            id="theme-switch">
            <label class="form-check-label" for="theme-switch">
              Dark / Light mode
            </label>
            <?php
              if (isset($_SESSION["email"]))
              {
                include("src/includes/users.php");
              }
            ?>
          </form>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/settings.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
