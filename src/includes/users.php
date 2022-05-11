<?php
    echo '
          <div class="col w-100 d-flex flex-row justify-content-evenly align-items-center p-3">
            <button id="account-btn" class="btn w-25">Account</button>
            <button id="database-btn" class="btn w-25">Database</button>
          </div>
          <input type="text" oninput="searchUser()" id="search-input" placeholder="search" class="input-field border-0 px-3 py-2 w-25 rounded-pill">
          ';
          include('users_table.php');
?>
