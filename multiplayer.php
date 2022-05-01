<?php
  session_start();

  if (isset($_SESSION["id"]))
  {
    include('src/scripts/php/db_connect.php');

    $query = "SELECT quest FROM STATS WHERE user_id=:id";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["id" => $_SESSION["id"]]);

    $result = $prepared_query->fetchAll();
  }
  else
  {
    header("location: index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "training";
      $title = "Training | KeyRace";
      include("src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <main class="col container h-100 ms-2 rounded rgb-shadow p-5">
          <div class="row hstack flex-column flex-wrap h-100">
            <!-- Race -->
            <div class="col-8 d-flex justify-content-center flex-wrap h-100">
              <div id="race" class="border-start border-end w-75">
                <hr>
                <div class="w-100">
                  <img
                    alt="User car"
                    id="user-car"
                    src="src/images/cars/f1.png"
                    width="100px"
                    style="transform:translate(-99px)"
                  >
                </div>
                <hr>
                <div class="w-100">
                  <img
                    alt="User car"
                    id="user-car"
                    src="src/images/cars/f1.png"
                    width="100px"
                    style="transform:translate(-99px)"
                  >
                </div>
                <hr>
                <div class="w-100">
                  <img
                    alt="User car"
                    id="user-car"
                    src="src/images/cars/f1.png"
                    width="100px"
                    style="transform:translate(-99px)"
                  >
                </div>
                <hr>
                <div class="w-100">
                  <img
                    alt="User car"
                    id="user-car"
                    src="src/images/cars/f1.png"
                    width="100px"
                    style="transform:translate(-99px)"
                  >
                </div>
                <hr>
                <div class="w-100">
                  <img
                    alt="User car"
                    id="user-car"
                    src="src/images/cars/f1.png"
                    width="100px"
                    style="transform:translate(-99px)"
                  >
                </div>
                <hr>
                <div class="w-100">
                  <img
                    alt="User car"
                    id="user-car"
                    src="src/images/cars/f1.png"
                    width="100px"
                    style="transform:translate(-99px)"
                  >
                </div>
                <hr>
              </div>

              <div class="container w-100">
                  <div class="row d-flex justify-content-between w-100">
                      <div class="col-3 ps-5">
                          <p class="ms-5" id="time">Time: --- s</p>
                      </div>
                      <div class="col-3 ps-5">
                          <p class="ms-5" id="wpm">WPM: ---</p>
                      </div>
                      <div class="col-3 ps-5">
                          <p class="ms-5" id="accuracy">Accuracy: --- %</p>
                      </div>
                      <div class="col-3 ps-5">
                          <p class="ms-5" id="errors">Errors: ---</p>
                      </div>
                  </div>
              </div>
              <div class="fs-3 p-3 input-field rounded text-break" id="typing-field"></div>
            </div>

            <!-- Separator -->
            <div class="separator border-start h-100 p-0"></div>

            <!-- Chat -->
            <div class="col-3 d-flex flex-wrap h-100 justify-content-center p-0">
              <h4>Chat</h4>
              <div class="input-field h-75 w-100 rounded"></div>
              <input id="user-message" class="input-field w-75 ps-2" type="text" placeholder="Your message here">
              <button class="btn send-btn w-25">Send</button>
            </div>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/main.js"></script>
    <script src="./src/scripts/js/training.js"></script>
  </body>
</html>
