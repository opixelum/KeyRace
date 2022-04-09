<!DOCTYPE html>
<html lang="en">
  <?php
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
            <button id="won-btn" class="btn col-2">Races won</button>
            <button id="game-btn" class="btn col-2">Game played</button>
            <button id="time-btn" class="btn col-2">Game time</button>
          </div>
            <?php
                $orderedBy = 1;

                include('src/scripts/php/db_connect.php');
                switch ($orderedBy) {
                  case 1 : 
                      $q = 'SELECT user_id, username, highest_wpm FROM USER, STATS WHERE
                            STATS.STATS_user_id = USER.user_id ORDER BY highest_wpm DESC';
                      break;

                  case 2 : 
                      $q = 'SELECT user_id, username, average_wpm FROM USER, STATS WHERE
                      STATS.STATS_user_id = USER.user_id ORDER BY average_wpm DESC';
                      break;

                  case 3 : 
                    $q = 'SELECT user_id, username, races_won FROM USER, STATS WHERE
                    STATS.STATS_user_id = USER.user_id ORDER BY races_won DESC';
                    break;

                  case 4 : 
                    $q = 'SELECT user_id, username, game_played FROM USER, STATS WHERE
                    STATS.STATS_user_id = USER.user_id ORDER BY game_played DESC';
                    break;

                  case 5 : 
                    $q = 'SELECT user_id, username, time_played FROM USER, STATS WHERE
                    STATS.STATS_user_id = USER.user_id ORDER BY time_played DESC';
                    break;

                    case 6 : 
                      header('location:login.php');
                }
                
                $req = $db->query($q);
                $results = $req->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <table class="table table-bordered">
            <tr>
                <th>Rank</th>
                <?php $rank = 1; ?>
                <th>Username</th>
                <th>WPM Record</th>
                <th>Profile</th>
            </tr>

            <?php
                foreach ($results as $key => $stats) {
                    echo '<tr>';
                    echo '<td>' . $rank++ . '</td>';
                    echo '<td>' . $stats['username'] . '</td>';
                    echo '<td>' . $stats['highest_wpm'] . '</td>';
                    echo '<td class="text-nowrap">';
                    echo '<a class="btn btn-primary btn-sm me-2 col-6" href="profile.php?id=' . $stats['user_id'] . '">Profile</a>';
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
