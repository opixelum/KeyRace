<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <title>KeyRace | Settings</title>
  </head>

  <body>
    <div class="container-fluid vh-100 p-3">
      <div class="row h-100 g-0">
        <!-- Navbar -->
        <div id="navbar" class="navbar col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div id="main" class="main col ms-2 rounded rgb-shadow">
            <button id="mode-btn" class="btn m-2">Mode</button>
        </div>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./src/scripts/settings.js"></script>
    <script src="./src/scripts/main.js"></script>
  </body>
</html>
