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

  <body>
    <div class="container-fluid vh-100 p-3">
      <div class="row h-100 g-0">
        <!-- Navbar -->
          <div class="navbar col-2 p-0 me-2 rounded rgb-shadow">
            <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div class="main col ms-2 rounded rgb-shadow">
          <div id="welcome" class="container-fluid h-100 p-3">
          <div class="row">
            <div class="col">
              <img alt="Top-left cars" src="./src/images/ts-cars.png">
            </div>
            <div class="col d-flex justify-content-end">
              <img class="img-fluid" alt="Top-right resources" src="./src/images/te-resources.png">
            </div>
          </div>

          <div class="row">
            <div class="col">
            </div>
            <div class="col-6 d-flex justify-content-center flex-wrap" style="color:white; word-spacing:1em">
              <h1 class="fw-bold text-center mb-5" style="font-size:60px; letter-spacing: 0.5em">KeyRace</h1>
              <h3 class="w-100 fs-1 m-0 text-center"><span>Race</span> against fast typers</h3>
              <h3 class="w-100 fs-1 m-0 text-center">Show off your <span>speed</span></h3>
              <h3 class="w-100 fs-1 m-0 text-center"><span>Play</span> and earn now!</h3>
              <button id="start-btn" class="btn mt-5">Start</button>
            </div>
            <div class="col"></div>
          </div>

          <div class="row">
            <div class="col d-flex align-items-end">
              <img alt="Bottom-left avatars" src="./src/images/bs-avatars.png">
            </div>
            <div class="col"></div>
            <div class="col d-flex justify-content-end align-items-end">
              <img alt="Bottom-right cars" width="250px" src="./src/images/be-cars.png">
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="src/scripts/main.js"></script>
  </body>
</html>
