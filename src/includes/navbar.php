<?php session_start(); ?>

<div class="d-flex flex-column h-100 justify-content-between">
  <div class="d-flex flex-wrap justify-content-center">
    <a class="my-4" href="./index.php">
      <img alt="KeyRace logo" width="100px" src="./src/images/logo.png">
    </a>
    <input class="search border-0 m-2 px-3 py-2 w-100 rounded-pill" type="search" id="search-field"
    name="search-field" placeholder="Search for a player">
  </div>

  <?php
      if (isset($_SESSION["email"])) {
          setcookie("isLoggedIn", true, time() + 365 * 24 * 3600, '/');
          echo '
              <div class="d-flex flex-column justify-content-between">
                <button id="profile-btn" class="btn m-2">Profile</button>
                <button id="campaign-btn" class="btn m-2">Campaign</button>
                <button id="multiplayer-btn" class="btn m-2">Multiplayer</button>
                <button id="training-btn" class="btn m-2">Training</button>
                <button id="leaderboard-btn" class="btn m-2">Leaderboard</button>
                <button id="customization-btn" class="btn m-2">Customization</button>
                <button id="settings-btn" class="btn m-2">Settings</button>
              </div>
              <a href="./scr/scripts/php/logout.php" class="w-100 mb-3 text-center">Log out</a>
            ';
      } else {
          unset($_COOKIE["isLoggedIn"]);
          echo '
              <div class="d-flex flex-column justify-content-between">
                <button id="sign-up-btn" class="btn m-2">Sign up</button>
                <button id="log-in-btn" class="btn m-2">Log in</button>
                <button id="leaderboard-btn" class="btn m-2">Leaderboard</button>
                <button id="settings-btn" class="btn m-2">Settings</button>
              </div>
            ';
      }
  ?>

  <div class="footer d-flex w-100 flex-wrap justify-content-center">
    <a href="./support.php">Support</a>
    <br><br>
    <small class="w-100 mb-3 text-center">© KeyRace 2022</small>
  </div>
  <script src="./src/scripts/js/navbar.js"></script>
</div>
