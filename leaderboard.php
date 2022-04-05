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

        <main class="col h-100 ms-2 rounded rgb-shadow">
            <?php 
                include('src/scripts/php/db_connect.php');
                $q = 'SELECT username, highest_wpm FROM USER, STATS WHERE user_id = STATS_user_id ORDER BY highest_wpm ASC';
                $req = $db->query($q);
                $results = $req->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <table class="table table-bordered">
            <tr>
                <th>Rank</th>
                <?php $rank = 1; ?>
                <th>Username</th>
                <th>Stats</th>
                <th>Profile</th>
            </tr>

            <?php
                foreach ($results as $key => $stats) {
                    echo '<tr>';
                    echo '<td>' . $rank++ . '</td>';
                    echo '<td>' . $stats['username'] . '</td>';
                    
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
  </body>
</html>
