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
    <title>KeyRace | Home</title>
  </head>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <!-- Navbar -->
          <div id="navbar" class="navbar col-2 p-0 me-2 rounded rgb-shadow">
            <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div id="main" class="main h-100 col ms-2 rounded rgb-shadow">
          <div id="welcome" class="container-fluid h-100 p-3">
          <div class="row h-30">
            <div class="col-3 h-100">
              <img src="./src/images/ts-cars.png" class="img-fluid" alt="Top-left cars">
            </div>
            <div class="col-6 h-100 d-flex justify-content-center align-items-end rgb-text">
              <h1 class="fw-bold text-center mb-5" style="font-size:60px; letter-spacing: 0.5em">KeyRace</h1>
            </div>
            <div class="col-3 h-100 d-flex justify-content-end">
              <img alt="Top-right resources" src="./src/images/te-resources.png" class="img-fluid" class="img-fluid">
            </div>
          </div>

          <div class="row h-40">
            <div class="col-3 h-100">
            </div>
            <div class="col-6 h-100 d-flex flex-column justify-content-center align-item-center rgb-text" style="color:white; word-spacing:1em">
              <h3 class="w-100 fs-1 text-center"><span>Race</span> against fast typers</h3>
              <h3 class="w-100 fs-1 text-center">Show off your <span>speed</span></h3>
              <h3 class="w-100 fs-1 text-center"><span>Play</span> and earn now!</h3>
            </div>
            <div class="col-3 h-100"></div>
          </div>

          <div class="row h-30">
            <div class="col-3 h-100 d-flex align-items-end">
              <img src="./src/images/bs-avatars.png" class="img-fluid" alt="Bottom-left avatars">
            </div>
            <div class="col-6 h-100 d-flex justify-content-center align-items-start">
              <button id="start-btn" class="btn">Start</button>
            </div>
            <div class="col-3 h-100 d-flex justify-content-end align-items-end">
              <img src="./src/images/be-cars.png" class="img-fluid" alt="Bottom-right cars">
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="src/scripts/main.js"></script>
  </body>
</html>
