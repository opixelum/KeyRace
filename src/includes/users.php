<?php
    include('../scripts/php/db_connect.php');
    $q = 'SELECT id, username, email, role FROM USER';
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    echo '
          <div class="col w-100 d-flex flex-row justify-content-evenly align-items-center p-3">
            <button id="account-btn" class="btn w-25">Account</button>
            <button id="database-btn" class="btn w-25">Database</button>
          </div>
          <input type="text" id="search-input" placeholder="search" class="input-field border-0 px-3 py-2 w-25 rounded-pill">
          <div id="leaderboard" class="w-100 h-75 p-0 d-flex justify-content-center">
            <table class="table table-bordered w-100 h-100 m-2">
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
        ';
              foreach ($results as $key => $user) {
                  echo '<tr>';
                  echo '<td>' . $user['username'] . '</td>';
                  echo '<td>' . $user['email'] . '</td>';
                  echo '<td>' . $user['role'] . '</td>';
                  echo '<td class="text-nowrap">';
                  echo '<a class="btn btn-primary btn-sm m-2 col-5" href="edit.php?id=' . $user['id'] . '">Edit</a>';
                  echo '<a id="delete-Btn" class="btn btn-danger btn-sm m-2 col-5" href="./src/scripts/php/delete.php?id=' . $user['id'] . '">Delete</a>';
                  echo '</td>';
                  echo '</tr>';
            }
            echo '</table>';
          echo '</div>';
?>
