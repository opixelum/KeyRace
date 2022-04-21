<?php
  session_start();

  // If user is not logged in, redirect to index
  if (!isset($_SESSION["id"]))
  {
    header("location: index.php");
    exit();
  }

  // Connect to database
  include("src/scripts/php/db_connect.php");

  // Request username 
  $query = "SELECT username FROM USER WHERE id=:id;";
  $prepared_query = $db->prepare($query);
  $prepared_query->execute(["id" => $_GET["id"]]);
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
  $prepared_query->execute(["id" => $_GET["id"]]);
  $result = $prepared_query->fetchAll();

  if (!$result)
  {
      header("location: index.php?type=danger&message=We couldn't load user's stats due to an unexpected error. Please try later or contact support.");
      exit;
  }

  $average_wpm = $result[0]["average_wpm"];
  $highest_wpm = $result[0]["highest_wpm"];
  $time_played = $result[0]["time_played"];
  $achievements = $result[0]["achievements"];
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
              <img
                alt="Banner"
                class="w-100 h-100"
                src=<?php echo "./src/images/banners/$username.png" ?>
              >
              <img
                alt="Profile picture"
                class="profile-avatar rounded-circle"
                src=<?php echo "./src/images/avatars/$username.png" ?>
              >
            </div>
          </div>

          <!-- Stats -->
          <div class="row my-4">
            <div class="col-5 d-flex justify-content-around">
              <p class="fs-4">Average WPM: <?php echo $average_wpm ?></p>
              <p class="fs-4">Highest WPM: <?php echo $highest_wpm?></p>
            </div>
            <div class="col-2">
              <!-- Spacing column -->
            </div>
            <div class="col-5 d-flex justify-content-around">
              <p class="fs-4">Rank: 2</p>
              <p class="fs-4">Time played: <?php echo $time_played ?></p>
            </div>
          </div>

          <!-- Username & friends list button --> 
          <div class="row">
            <div class="col d-flex flex-wrap justify-content-center">
              <h2 class="mb-3 text-center w-100"><?php echo $username ?></h3>
              <a class="btn d-flex justify-content-center align-items-center" href="friends.php">Friends list</a>
            </div>
          </div>

          <div class="row my-3 h-50">
          <!-- Car -->
            <div class="border-end h-100 col-6 d-flex flex-wrap justify-content-center">
              <h3 class="w-100 text-center">Car</h3>
              <div class="d-flex justify-content-center flex-wrap">
                <img alt="Car" class="h-25" src="./src/images/cars/lambo.png">
                <p class="m-0 fs-5 w-100 text-center">Model: Lamborghini</p>
                <p class="m-0 fs-5 w-100 text-center">Color: Yellow</p>
              </div>
            </div>

            <!-- Achievements -->
            <div class="border-start h-100 col-6 d-flex flex-wrap justify-content-center">
              <h3 class="w-100 text-center">Achievements</h3>
              <div class="container h-75">

                <?php
                  for ($i = 0; $i < 3; $i++)
                  {
                    echo "<div class='row w-100'>";
                    for ($j = 1; $j <= 3; $j++)
                    {
                      // Since there's only 8 achievements, the 9th one has a different logic
                      if ($i === 2 && $j === 3)
                      {
                        echo 
                        "
                          <div class='col-4 d-flex justify-content-center'>
                            <abbr title='Type faster than 150 wpm'>
                              <img
                                alt='Achievement 9'
                                class='achievement
                        ";
                        echo str_contains($achievements, 9) ? "'" : "opacity-25'";
                        echo
                        "
                                src='./src/images/achievement.png'
                              >
                            </abbr>
                          </div>
                        ";
                      }
                      else
                      {
                        echo 
                        "
                          <div class='col-4 d-flex justify-content-center'>
                            <abbr title='Complete quest " . 3 * $i + $j . "'>
                              <img
                                alt='Achievement " . 3 * $i + $j . "'
                                class='achievement
                        ";
                        echo str_contains($achievements, 3 * $i + $j) ? "'" : "opacity-25'";
                        echo
                        "
                                src='./src/images/achievement.png'
                              >
                            </abbr>
                          </div>
                        ";
                      }
                    }
                    echo "</div>";
                  }
                ?>

              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
  </body>
</html>
