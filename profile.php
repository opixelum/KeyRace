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
      $page = "profile";
      $title = "Profile | KeyRace";
      include("src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <main class="col container h-100 ms-2 rounded rgb-shadow">
          <!-- Profile assets -->
          <div class="row h-25">
            <div class="col d-flex flex-wrap justify-content-center h-100 w-100">
              <img alt="Banner" class="w-100 h-100" src="./src/images/banner.png">
              <img alt="Banner" class="profile-avatar rounded-circle" src="./src/images/avatar.png">
            </div>
          </div>

          <!-- Stats -->
          <div class="row my-4">
            <div class="col-5 d-flex justify-content-around">
              <h5>Highest WPM: 106.5</h5>
              <h5>Average WPM: 83</h5>
            </div>
            <div class="col-2">
              <!-- Spacing column -->
            </div>
            <div class="col-5 d-flex justify-content-around">
              <h5>Rank: 2</h5>
              <h5>Time played: 19h30min</h5>
            </div>
          </div>

          <!-- Username & friends list button --> 
          <div class="row">
            <div class="col d-flex flex-wrap justify-content-center">
              <h3 class="m-3 text-center w-100">Opixelum</h3>
              <button class="btn">Friends list</button>
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
  </body>
</html>
