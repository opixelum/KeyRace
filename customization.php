<?php 
  session_start();

  // If user is not logged in, redirect to index
  if (!isset($_SESSION["id"]))
  {
    header("location: index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "index";
      $title = "Home | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <!-- Menu -->
        <main class="col h-100 ms-2 rounded d-flex flex-wrap rgb-shadow">
          <h1 class="mx-auto my-3">Customization</h1>
          <div class="w-100 justify-content-evenly d-flex">
            <button id="car-btn" class="btn col-2">Car</button>
            <button id="avatar-btn" class="btn col-2">Avatar</button>
          </div>

          <!-- Customization -->
          <div class="container h-75"></div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
    <script src="src/scripts/js/customization.js"></script>
    <script src="src/scripts/js/avatar_display.js"></script>
    <script src="src/scripts/js/avatar_maker.js"></script>
  </body>
</html>
