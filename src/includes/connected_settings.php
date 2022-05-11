<div class="row row-cols-1 w-100 d-flex">
  <div class="col d-flex flex-row justify-content-evenly align-items-center p-3">
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
      echo isset($_SESSION["username"]) ? $_SESSION["username"] : 'Session error';
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
          echo isset($_SESSION["email"]) ? $_SESSION["email"] : 'Session error';
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
      <input class="btn w-25 m-3" value="Edit" type="submit">
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
      <a href="src/scripts/php/export.php" id='export-btn' class="btn w-25 m-3">Export Data</a>
  </div>

  <div class="col d-flex flex-column align-items-center">
      <button class="btn w-25 bg-danger m-3">Delete Account</button>
  </div>
</div>
