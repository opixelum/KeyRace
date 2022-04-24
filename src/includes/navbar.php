<?php 
    $type = "page";
    include("./src/includes/logs.php");
?>
<div class="d-flex flex-column h-100 justify-content-between">
  <div class="d-flex flex-wrap justify-content-center">
    <a class="my-4" href="http://localhost/KeyRace/index.php">
      <img alt="KeyRace logo" width="100px" src="http://localhost/KeyRace/src/images/logo.png">
    </a>
    <div class="position-relative w-100">
      <input
        class="input-field border-0 mx-2 px-3 py-2 w-100 rounded-pill"
        type="search"
        id="search-field"
        name="search-field"
        placeholder="Search player"
      >
      <div id="results" class="position-absolute top-100 w-100 mx-2 px-1 rounded-3"></div>
    </div>
  </div>

  <?php
      // Class for buttons
      $class = "class='btn d-flex justify-content-center align-items-center m-2'";

      if (isset($_SESSION["email"]))
      {
          setcookie("isLoggedIn", true, time() + 365 * 24 * 3600, '/');
          echo
          "
              <div class='d-flex flex-column justify-content-between'>
                <a href='profile.php?id=$_SESSION[id]' $class>Profile</a>
                <a href='campaign.php' $class>Campaign</a>
                <a href='#' $class>Multiplayer</a>
                <a href='#' $class>Training</a>
                <a href='leaderboard.php' $class>Leaderboard</a>
                <a href='#' $class>Customization</a>
                <a href='settings.php' $class>Settings</a>
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
                <a href='signup.php' id='sign-up-btn' $class>Sign up</a>
                <a href='login.php' id='log-in-btn' $class>Log in</a>
                <a href='leaderboard.php' id='leaderboard-btn' $class>Leaderboard</a>
                <a href='settings.php' id='settings-btn' $class>Settings</a>
              </div>
          ";
      }
  ?>

  <div class="footer d-flex w-100 flex-wrap justify-content-center">
    <a href="./support.php">Support</a>
    <br><br>
    <small class="w-100 mb-3 text-center">© KeyRace <?php echo date("Y"); ?></small>
  </div>
</div>

<script src="src/scripts/js/navbar.js"></script>
