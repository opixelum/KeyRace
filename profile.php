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

        <main class="col h-100 ms-2 rounded rgb-shadow">
          <div class="d-flex flex-wrap justify-content-center h-25 w-100">
            <img alt="Banner" class="w-100 h-100" src="./src/images/banner.png">
            <img alt="Banner" class="profile-avatar rounded-circle" src="./src/images/avatar.png">
          </div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
  </body>
</html>
