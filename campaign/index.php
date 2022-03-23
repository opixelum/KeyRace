<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Campaign | KeyRace";
      include("../src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("../src/includes/navbar.php"); ?>
        </header>

        <main class="col d-flex justify-content-center align-items-center flex-wrap h-100 ms-2 rounded rgb-shadow">
          <h1 class="text-center w-100">Campaign</h1>
          <h3 class="text-center w-100">
            Prouve that you're the fastest racer in KeyVille!
          </h3>
          <div class="btn-group-vertical w-25">
            <button type="button" class="btn">Quest 1</button>
            <button type="button" class="btn disabled">Quest 2</button>
            <button type="button" class="btn disabled">Quest 3</button>
            <button type="button" class="btn disabled">Quest 4</button>
            <button type="button" class="btn disabled">Quest 5</button>
            <button type="button" class="btn disabled">Quest 6</button>
            <button type="button" class="btn disabled">Quest 7</button>
            <button type="button" class="btn disabled">Quest 8</button>
          </div>
        </main>
      </div>
    </div>

    <script src="../src/scripts/js/main.js"></script>
  </body>
</html>
