<?php
  session_start();

  // If user is not logged in, redirect to index
  if (!isset($_SESSION["id"]))
  {
    header("location: index.php");
    exit();
  }

  // If id not provided in URL, get it from session
  if (!isset($_GET["id"])) $id = $_SESSION["id"];
  else $id = $_GET["id"];

  // Connect to database
  include("src/scripts/php/db_connect.php");

  // Request username 
  $query = "SELECT username FROM USER WHERE id=:id;";
  $prepared_query = $db->prepare($query);
  $prepared_query->execute(["id" => $id]);
  $result = $prepared_query->fetchAll();

  if (!$result)
  {
      header("location: index.php?type=danger&message=We couldn't load user's name due to an unexpected error. Please try later or contact support.");
      exit;
  }

  $username = $result[0]["username"];

  // Request user's stats
  $query = "SELECT * FROM STATS WHERE user_id=:id;";
  $prepared_query = $db->prepare($query);
  $prepared_query->execute(["id" => $id]);
  $result = $prepared_query->fetchAll();

  if (!$result)
  {
      header("location: index.php?type=danger&message=We couldn't load user's stats due to an unexpected error. Please try later or contact support.");
      exit;
  }

  $highest_wpm = $result[0]["highest_wpm"];
  $races_won = $result[0]["races_won"];
  $races_ran = $result[0]["races_ran"];
  $achievements = $result[0]["achievements"];
  $time_played = $result[0]["time_played"];

  // Request user's car
  $query = "SELECT car FROM ASSETS WHERE user_id=:id;";
  $prepared_query = $db->prepare($query);
  $prepared_query->execute(["id" => $id]);
  $result = $prepared_query->fetchAll();

  if (!$result)
  {
      header("location: index.php?type=danger&message=We couldn't load user's car due to an unexpected error. Please try later or contact support.");
      exit;
  }

  $car = $result[0]["car"];
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
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <main class="col container h-100 ms-2 rounded rgb-shadow">
          <!-- Profile assets -->
          <div class="row h-25">
            <div class="col d-flex flex-wrap justify-content-center h-100 w-100">
              <img
                alt="Banner"
                class="w-100 h-100"
                src=<?php
                  if (file_exists("src/images/banners/$username.png"))
                    echo "src/images/banners/$username.png";
                  else echo "src/images/banners/default.png";
                ?>
              >
              <canvas id="avatar-canvas" class="profile-canvas rounded-circle" width="200" height="200"></canvas>
            </div>
          </div>

          <!-- Stats -->
          <div class="row my-4">
            <div class="col-5 d-flex justify-content-around">
              <p class="fs-4">Game time: <?php echo $time_played ?> min</p>
              <p class="fs-4">Highest WPM: <?php echo $highest_wpm?></p>
            </div>
            <div class="col-2">
              <!-- Spacing column -->
            </div>
            <div class="col-5 d-flex justify-content-around">
              <p class="fs-4">Races ran: <?php echo $races_ran ?></p>
              <p class="fs-4">Races won: <?php echo $races_won ?></p>
            </div>
          </div>

          <!-- Username --> 
          <div class="row">
            <div class="col d-flex flex-wrap justify-content-center">
              <h2 class="mb-3 text-center w-100"><?php echo $username ?></h3>
            </div>
          </div>

          <div class="row my-3 h-50">
          <!-- Car -->
            <div class="border-end h-100 col-6 d-flex flex-wrap justify-content-center">
              <h3 class="w-100 text-center">Car</h3>
              <img alt="Car" class="h-25" <?php echo "src='./src/images/cars/$car.png'" ?>>
              <p class="m-0 fs-5 w-100 text-center" style="height: 1em;">Model: <?php echo ucfirst($car) ?></p>
            </div>

            <!-- Achievements -->
            <div class="border-start h-100 col-6 d-flex flex-wrap justify-content-center">
              <h3 class="w-100 text-center">Achievements</h3>
              <div class="container h-75">
                <div class="row">
                  <div class='col-4 d-flex justify-content-center'>
                    <img
                      alt='Achievement 1'
                      <?php
                        echo "class='achievement";
                        echo str_contains($achievements, 1)
                          ? "'" 
                          : " opacity-25'";
                        echo "src='src/images/achievement.png'";
                      ?>
                    >
                  </div>
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Complete quest 2'>
                      <img
                        alt='Achievement 2'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 2)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Complete quest 3'>
                      <img
                        alt='Achievement 3'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 3)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                </div>
                <div class="row">
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Complete quest 4'>
                      <img
                        alt='Achievement 4'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 4)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Complete quest 5'>
                      <img
                        alt='Achievement 5'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 5)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Complete quest 6'>
                      <img
                        alt='Achievement 6'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 6)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                </div>
                <div class="row">
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Complete quest 7'>
                      <img
                        alt='Achievement 7'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 7)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Complete quest 8'>
                      <img
                        alt='Achievement 8'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 8)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                  <div class='col-4 d-flex justify-content-center'>
                    <abbr title='Type faster than 150 wpm'>
                      <img
                        alt='Achievement 9'
                        <?php
                          echo "class='achievement";
                          echo str_contains($achievements, 9)
                            ? "'" 
                            : " opacity-25'";
                          echo "src='src/images/achievement.png'";
                        ?>
                      >
                    </abbr>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/avatar_maker.js"></script>
    <script src="src/scripts/js/main.js"></script>
  </body>
</html>
