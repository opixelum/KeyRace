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
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <!-- Menu -->
        <main class="col h-100 ms-2 rounded d-flex flex-wrap rgb-shadow">
          <h1 class="mx-auto my-3">Customization</h1>
          <div class="w-100 justify-content-evenly d-flex">
            <button id="car-btn" class="btn col-2">Car</button>
            <button id="avatar-btn" class="btn col-2">Avatar</button>
            <button id="interface-btn" class="btn col-2">Interface</button>
            <button id="shop-btn" class="btn col-2">Shop</button>
          </div>

          <!-- Customization -->
          <div id="customization-menu" class="w-50 h-75 flex-wrap justify-content-evenly d-flex"></div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
    <script src="src/scripts/js/avatar_maker.js"></script>
    <script src="src/scripts/js/customization.js"></script>
  </body>
</html>
