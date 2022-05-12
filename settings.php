<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "settings";
      $title = "Settings | KeyRace";
      include("./src/includes/head.php");

      if (isset($_SESSION["id"])) {
          // Connect to db
          include("src/scripts/php/db_connect.php");

          // Get username
          $query = "SELECT username, role FROM USER WHERE id=:id;";
          $prepared_query = $db->prepare($query);
          $prepared_query->execute(["id" => $_SESSION["id"]]);
          $result = $prepared_query->fetchAll();
      }
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main id="settings-main" class="col d-flex flex-column justify-content-between align-items-center h-100 flex-wrap ms-2 rounded rgb-shadow p-3">
        
        <?php
          // If user is not logged in
          if (!isset($_SESSION["id"]))
          {
            include('src/includes/not_logged_in_settings.php');
          }
          // If user is logged in
          else
          {
            include('src/includes/connected_settings.php');
          }
        ?>
      </main>
    </div>
  </div>

  <script src="./src/scripts/js/settings.js"></script>
  <script src="./src/scripts/js/main.js"></script>
</body>
