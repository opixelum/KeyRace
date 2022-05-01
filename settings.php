<?php session_start(); ?>

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

        <main class="col ms-2 rounded d-flex flex-wrap h-100 rgb-shadow">
          <form class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch"
            id="theme-switch">
            <label class="form-check-label" for="theme-switch">
              Dark / Light mode
            </label>
          </form>

          <?php

              if (isset($_SESSION["email"]))
              {
                  include('src/scripts/php/db_connect.php');

                  $query = "SELECT role FROM USER WHERE email = :email";
                  $prepared_query = $db->prepare($query);
              
                  $prepared_query->execute(["email" => $_SESSION["email"]]);
              
                  $result = $prepared_query->fetchAll();

                  if ($result[0]['role'] == 3)
                  {
                      include('src/includes/users.php');
                  }
              }
            ?>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/settings.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
