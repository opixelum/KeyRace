<!DOCTYPE html>
<html lang="en">
  <?php
      session_start();
      $page = "leaderboard";
      $title = "Leaderboard | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <main class="col h-100 ms-2 d-flex rounded flex-wrap rgb-shadow">
          <h1 class="mx-auto my-3">Leaderboard</h1>
          <div class="w-100 justify-content-evenly d-flex">
            <button id="record-btn" class="btn col-2">WPM record</button>
            <button id="races-won-btn" class="btn col-2">Races won</button>
            <button id="races-ran-btn" class="btn col-2">Races ran</button>
            <button id="time-btn" class="btn col-2">Game time (min)</button>
          </div>
            <?php
                include('src/scripts/php/db_connect.php');

                if (isset($_GET['orderedBy'])) {
                  switch ($_GET['orderedBy']) {
                    case 1 : 
                        $q = 'SELECT id, username, highest_wpm FROM USER, STATS WHERE
                              STATS.user_id = USER.id ORDER BY highest_wpm DESC';
                        $leaderboardTab = 'highest_wpm';
                        $leaderboardTabName = 'WPM record';
                        break;
  
                    case 2 : 
                      $q = 'SELECT id, username, races_won FROM USER, STATS WHERE
                            STATS.user_id = USER.id ORDER BY races_won DESC';
                      $leaderboardTab = 'races_won';
                      $leaderboardTabName = 'Races won';
                      break;
  
                    case 3 : 
                      $q = 'SELECT id, username, races_ran FROM USER, STATS WHERE
                            STATS.user_id = USER.id ORDER BY races_ran DESC';
                      $leaderboardTab = 'races_ran';
                      $leaderboardTabName = 'Races ran';
                      break;
  
                    case 4 : 
                      $q = 'SELECT id, username, time_played FROM USER, STATS WHERE
                            STATS.user_id = USER.id ORDER BY time_played DESC';
                      $leaderboardTab = 'time_played';
                      $leaderboardTabName = 'Time played';
                      break;
  
                    default:
                      $q = 'SELECT id, username, highest_wpm FROM USER, STATS WHERE
                            STATS.user_id = USER.id ORDER BY highest_wpm DESC';
                      $leaderboardTab = 'highest_wpm';
                      $leaderboardTabName = 'WPM record';
                      break;
                  }
                }
                else
                {
                  $q = 'SELECT id, username, highest_wpm FROM USER, STATS WHERE
                        STATS.user_id = USER.id ORDER BY highest_wpm DESC';
                  $leaderboardTab = 'highest_wpm';
                  $leaderboardTabName = 'WPM record';
                }

                $req = $db->query($q);
                $results = $req->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div id="leaderboard" class="w-100 h-75 p-0 d-flex justify-content-center">
              <table class="table table-bordered w-100 h-25 m-2">
              <tr>
                  <th class="text-center">Rank</th>
                  <?php $rank = 1; ?>
                  <th class="text-center">Username</th>
                  <?php echo "<th class='text-center'>$leaderboardTabName</th>";?>
                  <th class="text-center">Profile</th>
              </tr>

              <?php
                  foreach ($results as $key => $stats) {
                    if ($stats["$leaderboardTab"] != 0) {
                      echo '<tr>';
                        echo '<td class="text-center">' . $rank++ . '</td>';
                        echo '<td class="text-center">' . $stats['username'] . '</td>';
                        echo '<td class="text-center">' . $stats["$leaderboardTab"] . '</td>';
                        echo '<td class="text-nowrap text-center">';
                          echo '<a class="btn btn-primary btn-sm col-6" href="profile.php?id=' . $stats['id'] . '">Profile</a>';
                        echo '</td>';
                      echo '</tr>';
                    }
                  }
              ?>
              </table>
            </div>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
    <script src="src/scripts/js/leaderboard.js"></script>
  </body>
</html>
