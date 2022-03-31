<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Home | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <main class="col h-100 ms-2 rounded rgb-shadow">
          <div class="container-fluid h-100 p-3" id="welcome">
            <div class="row h-25">
              <div class="col-3 h-100">
                <img
                  alt="Top-left cars"
                  class="img-fluid"
                  src="./src/images/ts-cars.png"
                >
              </div>

              <div
                class="col-6 h-100 d-flex justify-content-center align-items-end rgb-text"
              >
                <h1
                  class="fw-bold text-center"
                  style="font-size:60px; letter-spacing: 0.5em"
                >KeyRace</h1>
              </div>

              <div class="col-3 h-100 d-flex justify-content-end">
                <img
                  alt="Top-right resources"
                  class="img-fluid"
                  src="./src/images/te-resources.png"
                >
              </div>
            </div>

            <div class="row h-50">
              <div class="col-3 h-100"></div>
              <div
                class="col-6 h-100 d-flex flex-column justify-content-center align-item-center rgb-text"
                style="color:white; word-spacing:1em"
              >
                <h3 class="w-100 fs-1 text-center">
                  <span>Race</span> against fast typers
                </h3>

                <h3 class="w-100 fs-1 text-center">
                  Show off your <span>speed</span>
                </h3>

                <h3 class="w-100 fs-1 text-center">
                  <span>Play</span> and earn now!
                </h3>
              </div>
              <div class="col-3 h-100"></div>
            </div>

            <div class="row h-25">
              <div class="col-3 h-100 d-flex align-items-end">
                <img
                  alt="Bottom-left avatars"
                  class="img-fluid"
                  src="./src/images/bs-avatars.png"
                >
              </div>

              <div
                class="col-6 h-100 d-flex justify-content-center align-items-start"
              >
                <button class="btn" id="start-btn">Start</button>
              </div>

              <div
                class="col-3 h-100 d-flex justify-content-end align-items-end"
              >
                <img
                  alt="Bottom-right cars"
                  class="img-fluid"
                  src="./src/images/be-cars.png"
                >
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
  </body>
</html>
