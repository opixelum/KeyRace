<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "settings";
      $title = "Settings | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main id="test" class="col d-flex flex-column justify-content-between align-items-center flex-wrap h-100 ms-2 rounded rgb-shadow p-5">

          <div class="row row-cols-1 w-100 d-flex">

          <div class="col d-flex flex-row justify-content-evenly align-items-center p-5">
            <button id="account-btn" class="btn w-25">Account</button>
            <button id="database-btn" class="btn w-25">Database</button>
          </div>

          <div class="col d-flex flex-column justify-content-evenly align-items-center p-3">
            <form class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch"
              id="theme-switch">
              <label class="form-check-label" for="theme-switch">
                Dark / Light mode
              </label>
            </form>
          </div>

          <div class="col d-flex flex-column justify-content-evenly align-items-center">
            <label class="w-100 text-center" for="username">Username</label>
            <input
            class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
            type="text"
            value="<?php 
              // Set cookie value to input field
              echo isset($_COOKIE["username"]) ? $_COOKIE["username"] : 'No cookie found';
            ?>" 
            id="username-inpt"
            name="username"
            placeholder="JDoe"
            required
            >
          </div>

          <div class="col d-flex flex-column justify-content-evenly align-items-center">
            <label class="w-100 text-center" for="email">Email</label>
            <input
              class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
              type="email"
              value="<?php
                // Set cookie value to input field
                echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : 'No cookie found';
              ?>" 
              id="email-inpt"
              name="email"
              placeholder="john.doe@email.com"
              required
            >
          </div>

          <div class="col d-flex flex-column justify-content-evenly align-items-center">
            <label class="w-100 text-center" for="password">Password</label>
            <input
            class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
            type="password"
            id="password-inpt"
            name="password"
            placeholder="••••••••••••••••"
            required
            >
          </div>  

          <div class="col d-flex flex-column justify-content-evenly align-items-center">
            <label class="w-100 text-center" for="password">New Password</label>
            <input
            class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
            type="password"
            id="NewPassword-inpt"
            name="password"
            placeholder="••••••••••••••••"
            required
            >
          </div>

          <div class="col d-flex flex-column align-items-center">
            <input class="btn w-25 m-4" placeholder="submit" type="submit">
          </div>

          <hr>

          <div class="col d-flex flex-row justify-content-center align-items-center">
            <input
            id="stay-connected-chckbx"
            name="stay-connected"
            type="checkbox"
            value="stay-connected"
            >
            <label for="stay-connected">Stay connected</label><br><br>
          </div>  

          <div class="col d-flex flex-column align-items-center">
            <button id='export-btn' class="btn w-25 m-4">Export Data</button>
          </div>

          <div class="col d-flex flex-column align-items-center">
            <button class="btn w-25 bg-danger m-4">Delete Account</button>
          </div>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/settings.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
