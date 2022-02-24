<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KeyRace | Home</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./src/bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./src/css/style.css">
  </head>

  <body>
    <div class="container-fluid vh-100 p-3 bg-black">
      <div class="row h-100 g-0">
        <!-- Navbar -->
        <div class="navbar col-2 p-0 me-2 rounded custom-shadow">
          <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div class="main col ms-2 rounded custom-shadow">
        </div>
      </div>
    </div>

    <!-- Bootstrap bundle script -->
    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts -->
    <script src="./src/scripts/includes/navbar.js"></script>
    <script src="./src/scripts/main.js"></script>
  </body>
</html>