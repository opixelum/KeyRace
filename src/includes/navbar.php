<?php session_start(); ?>

<div class="d-flex flex-column h-100 justify-content-between">
  <div class="d-flex flex-wrap justify-content-center">
    <a class="my-4" href="./index.html">
      <img alt="KeyRace logo" width="100px" src="./src/images/logo.png">
    </a>
    <input class="search border-0 m-2 px-3 py-2 w-100 rounded-pill" type="search" id="search-field"
    name="search-field" placeholder="Search for a player">
  </div>

  <?php
      $isLoggedIn = false; // Temporary

      if ($isLoggedIn) {
          echo '
              <div class="navbar">
                <button>Profile</button>
                <button>Campaign</button>
                <button>Multiplayer</button>
                <button>Training</button>
                <button>Leaderboard</button>
                <button>Customization</button>
                <button>Settings</button>
              </div>
            ';
      } else {
          echo '
              <div class="d-flex flex-column justify-content-between">
                <button id="sign-in-btn" class="btn m-2">Sign in</button>
                <button id="log-in-btn" class="btn m-2">Log in</button>
                <button id="leaderboard-btn" class="btn m-2">Leaderboard</button>
                <button id="settings-btn" class="btn m-2">Settings</button>
              </div>
            ';
      }
  ?>

  <div class="footer d-flex w-100 flex-wrap justify-content-center">
    <a href="./support.html">Support</a>
    <br><br>
    <small class="w-100 mb-3 text-center">© KeyRace 2022</small>
  </div>
</div>
