<?php
    include('../scripts/php/db_connect.php');
    $q = 'SELECT id, username, email, role FROM USER';
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    echo '
          <div class="col d-flex flex-row justify-content-evenly align-items-center p-3">
            <button id="account-btn" class="btn w-25">Account</button>
            <button id="database-btn" class="btn w-25">Database</button>
          </div>
<<<<<<< Updated upstream
          <input type="text" id="search-input" placeholder="search">
          <table class="table table-bordered overflow-auto h-75">
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
            echo '<a class="btn btn-primary btn-sm me-2 col-6" href="edit.php?id=' . $user['id'] . '">Edit</a>';
            echo '<a id="delete-Btn" class="btn btn-danger btn-sm me-2 col-6" href="./src/scripts/php/delete.php?id=' . $user['id'] . '">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
    echo '</table>';
=======
          <input type="text" oninput="searchUser()" id="search-input" placeholder="Search by username or email" class="input-field border-0 px-3 py-2 w-25 rounded-pill">
          ';
          echo '<div id="leaderboard" class="w-100 h-75 p-0 d-flex justify-content-center">';
            include('users_table.php');
          echo '</div>';
>>>>>>> Stashed changes
?>
