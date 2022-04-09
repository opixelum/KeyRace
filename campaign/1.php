<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Home | KeyRace";
      include("../src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("../src/includes/navbar.php"); ?>
        </header>

        <main class="col d-flex justify-content-center align-items-start flex-wrap h-100 ms-2 rounded rgb-shadow">
            <h1 class="mx-auto my-3">Quest 1</h1>
            <div id="stats"></div>
            <div class="fs-3 m-5 px-2 input-field rounded text-break" id="typing-field"></div>
          </div>
        </main>
      </div>
    </div>

    <script src="../src/scripts/js/main.js"></script>
  </body>
</html>
