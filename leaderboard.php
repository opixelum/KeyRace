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
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php"); ?>
        </header>

        <main class="col h-100 ms-2 rounded d-flex flex-wrap rgb-shadow">
          <h1 class="mx-auto my-3">Leaderboard</h1>
          <div class="w-100 justify-content-evenly d-flex">
            <button id="record-btn" class="btn col-2">WPM record</button>
            <button id="average-btn" class="btn col-2">WPM average</button>
            <button id="races-won-btn" class="btn col-2">Races won</button>
            <button id="races-ran-btn" class="btn col-2">Races ran</button>
            <button id="time-btn" class="btn col-2">Game time</button>
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
                        $q = 'SELECT id, username, average_wpm FROM USER, STATS WHERE
                              STATS.user_id = USER.id ORDER BY average_wpm DESC';
                        $leaderboardTab = 'average_wpm';
                        $leaderboardTabName = 'WPM average';
                        break;
  
                    case 3 : 
                      $q = 'SELECT id, username, races_won FROM USER, STATS WHERE
                            STATS.user_id = USER.id ORDER BY races_won DESC';
                      $leaderboardTab = 'races_won';
                      $leaderboardTabName = 'Races won';
                      break;
  
                    case 4 : 
                      $q = 'SELECT id, username, races_ran FROM USER, STATS WHERE
                            STATS.user_id = USER.id ORDER BY races_ran DESC';
                      $leaderboardTab = 'races_ran';
                      $leaderboardTabName = 'Races ran';
                      break;
  
                    case 5 : 
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

            <table class="table table-bordered">
            <tr>
                <th>Rank</th>
                <?php $rank = 1; ?>
                <th>Username</th>
                <?php echo "<th>$leaderboardTabName</th>";?>
                <th>Profile</th>
            </tr>

            <?php
                foreach ($results as $key => $stats) {
                    echo '<tr>';
                    echo '<td>' . $rank++ . '</td>';
                    echo '<td>' . $stats['username'] . '</td>';
                    echo '<td>' . $stats["$leaderboardTab"] . '</td>';
                    echo '<td class="text-nowrap">';
                    echo '<a class="btn btn-primary btn-sm me-2 col-6" href="profile.php?id=' . $stats['id'] . '">Profile</a>';
                    echo '</td>';
                    echo '</tr>';
                }

            ?>
            </table>
        </main>
      </div>
    </div>

    <script src="src/scripts/js/main.js"></script>
    <script src="src/scripts/js/leaderboard.js"></script>
  </body>
</html>
