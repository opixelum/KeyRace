<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Campaign | KeyRace";
      include("src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <main class="col d-flex justify-content-center align-items-start flex-wrap h-100 ms-2 rounded rgb-shadow">
          <?php
            // If no quest parameter in url, display campaign menu
            if (!isset($_GET["quest"]) || $_GET["quest"] < 1 || $_GET["quest"] > 8)
            {
              echo 
              "
                <h1 class='text-center w-100 my-3'>Campaign</h1>
                <h3 class='text-center w-100 my-3'>
                  Prove that you're the fastest racer in KeyTown!
                </h3>
                <div class='btn-group-vertical w-25'>
              ";

              // Buttons for each quest
              for ($i = 1; $i <= 8; $i++)
              {
                // TODO: Put ternary for "disabled" class
                echo "<button id='quest${i}-btn' type='button' class='btn'>Quest ${i}</button>";
              }

              echo
              "
                </div>
                <script src='src/scripts/js/campaign_menu.js'></script>
              ";
            }
            // If quest parameter in url, display corresponding quest
            else
            {
              echo
              "
                <h1 class='text-center w-100 my-3'>Quest $_GET[quest]</h1>
                <div id='stats'></div>
                <div class='fs-3 m-5 px-2 input-field rounded text-break' id='typing-field'></div>
                <script src='src/scripts/js/typing.js'></script>
              ";
            }
          ?>
        </main>
      </div>
    </div>

    <script src="../src/scripts/js/main.js"></script>
  </body>
</html>
