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
              <p>Highest WPM: 106.5</p>
              <p>Average WPM: 83</p>
            </div>
            <div class="col-2">
              <!-- Spacing column -->
            </div>
            <div class="col-5 d-flex justify-content-around">
              <p>Rank: 2</p>
              <p>Time played: 19h30min</p>
            </div>
          </div>

          <!-- Username & friends list button --> 
          <div class="row">
            <div class="col d-flex flex-wrap justify-content-center">
              <h3 class="m-3 text-center w-100">Opixelum</h3>
              <button class="btn">Friends list</button>
            </div>
          </div>

          <div class="row my-3 h-50">
          <!-- Car -->
            <div class="border-end h-100 col-6 d-flex flex-wrap justify-content-center align-items-center">
              <h3 class="w-100 text-center">Car</h3>
              <img alt="Car" class="profile-car" src="./src/images/cars/lambo.png">
              <p class="m-0 w-100 text-center">Model: Lamborghini</p>
              <p class="m-0 w-100 text-center">Color: Yellow</p>
            </div>

            <!-- Achievements -->
            <div class="border-start h-100 container col-6 d-flex flex-wrap justify-content-center">
              <h3 class="w-100 text-center">Achievements</h3>
              <div class="row w-75 h-25">
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
              </div>
              <div class="row w-75 h-25">
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
              </div>
              <div class="row w-75 h-25">
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
                <div class="col-4 d-flex justify-content-center h-100">
                  <img alt="Achievement" class="h-100" src="./src/images/achievement.png">
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
  </body>
</html>
