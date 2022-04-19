<?php 
    session_start();
    $type = "page";
    include("./src/includes/logs.php");
?>
<div class="d-flex flex-column h-100 justify-content-between">
  <div class="d-flex flex-wrap justify-content-center">
    <a class="my-4" href="http://localhost/KeyRace/index.php">
      <img alt="KeyRace logo" width="100px" src="http://localhost/KeyRace/src/images/logo.png">
    </a>
    <input
      class="input-field border-0 m-2 px-3 py-2 w-100 rounded-pill"
      type="search"
      id="search-field"
      name="search-field"
      placeholder="Search for a player"
    >
  </div>

  <?php
      // Class for buttons
      $class = "class='btn m-2'";

      if (isset($_SESSION["email"]))
      {
          setcookie("isLoggedIn", true, time() + 365 * 24 * 3600, '/');
          echo
          "
              <div class='d-flex flex-column justify-content-between'>
                <button id='profile-btn' $class>Profile</button>
                <button id='campaign-btn' $class>Campaign</button>
                <button id='multiplayer-btn' $class>Multiplayer</button>
                <button id='training-btn' $class>Training</button>
                <button id='leaderboard-btn' $class>Leaderboard</button>
                <button id='customization-btn' $class>Customization</button>
                <button id='settings-btn' $class>Settings</button>
              </div>
              <a
                href='./src/scripts/php/logout.php'
                class='w-100 mb-3 text-center'
              >Log out</a>
          ";
      }
      else
      {
          isset
          (
              $_COOKIE["isLoggedIn"]) && 
              setcookie("isLoggedIn", '', 0, '/'
          );

          echo
          "
              <div class='d-flex flex-column justify-content-between'>
                <button id='sign-up-btn' $class>Sign up</button>
                <button id='log-in-btn' $class>Log in</button>
                <button id='leaderboard-btn' $class>Leaderboard</button>
                <button id='settings-btn' $class>Settings</button>
              </div>
          ";
      }
  ?>

  <div class="footer d-flex w-100 flex-wrap justify-content-center">
    <a href="./support.php">Support</a>
    <br><br>
    <small class="w-100 mb-3 text-center">© KeyRace <?php echo date("Y"); ?></small>
  </div>
  <script src="http://localhost/KeyRace/src/scripts/js/navbar.js"></script>
</div>
