<?php
    if (isset($_SESSION["email"]))
    {
        include('src/scripts/php/db_connect.php');

        $query = "SELECT role FROM USER WHERE email = :email";
        $prepared_query = $db->prepare($query);

        $prepared_query->execute(["email" => $_SESSION["email"]]);

        $result = $prepared_query->fetchAll();

        if ($result[0]['role'] == 0)
        {
            header('location:index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "customization";
      $title = "Customization | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main class="col h-100 ms-2 rounded d-flex flex-wrap rgb-shadow">
            <h1 class="mx-auto my-3">Customization</h1>
            <div class="w-100 justify-content-evenly d-flex">
                <button id="helmet-btn" class="btn col-2">Helmet</button>
                <button id="visor-btn" class="btn col-2">Visor</button>
                <button id="vest-btn" class="btn col-2">Vest</button>
                <button id="background-btn" class="btn col-2">Background</button>
            </div>
            <div id="sub-selection" class="w-100 justify-content-evenly d-flex">
                <div class="w-100 justify-content-evenly d-flex">
                <button id="default-btn" class="btn col-2">Default</button>
                <button id="duck-btn" class="btn col-2">Duck</button>
                <button id="cross-btn" class="btn col-2">Cross</button>
                <button id="sport-btn" class="btn col-2">Sport</button>
                <button id="race-btn" class="btn col-2">Race</button>
                </div>
            </div>

            <!-- Helmet dropdown menu -->
    <label for="helmet">Choose a helmet:</label>
    <select name="helmet" id="helmet-dropdown">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>

    <br>

    <!-- Vest dropdown menu -->
    <label for="vest">Choose a vest:</label>
    <select name="vest" id="vest-dropdown">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>

    <br>

    <!-- Background color dropdown menu -->
    <label for="bg-color">Choose a background color:</label>
    <select name="bg-color" id="bg-color-dropdown">
      <option value="rgb(255,255,255)">White</option>
      <option value="rgb(255,0,0)">Red</option>
      <option value="rgb(255,150,0)">Orange</option>
      <option value="rgb(255,255,0)">Yellow</option>
      <option value="rgb(0,255,0)">Green</option>
      <option value="rgb(0,255,255)">Cyan</option>
      <option value="rgb(0,0,255)">Blue</option>
      <option value="rgb(150,0,255)">Purple</option>
      <option value="rgb(255,0,255)">Pink</option>
      <option value="rgb(0,0,0)">Black</option>
    </select>
            <!-- Avatar frame -->
            <canvas id="avatar"></canvas>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/avatar_maker.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
