<?php
    echo '
          <div class="col w-100 d-flex flex-row justify-content-evenly align-items-center">
            <button 
              id="account-btn"
              class="btn w-25"
              onclick="showAccountSettings()"
            >Account</button>

            <button
              id="database-btn"
              class="btn w-25"
              onclick="showDatabaseSettings()"
            >Database</button>
          </div>
          <input type="text" oninput="searchUser()" id="search-input" placeholder="search" class="input-field border-0 px-3 py-2 w-25 rounded-pill">
          ';
          echo '<div id="leaderboard" class="w-100 h-75 p-0 d-flex justify-content-center">';
            include('users_table.php');
          echo '</div>';
?>
