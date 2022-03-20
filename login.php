<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Log in | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main class="col ms-2 rounded rgb-shadow">
          <form action="./src/scripts/php/login_check.php" method="POST">
            <label for="email">Email</label><br>
            <input
              id="email-inpt"
              name="email"
              placeholder="john.doe@email.com"
              required
              type="email"
              value="<?php
                  // Set cookie value to input field
                  echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : '';
              ?>" 
            ><br><br>

            <label for="password">Password</label><br>
            <input
              id="password-inpt"
              name="password"
              placeholder="••••••••••••••••"
              required
              type="password"
            ><br><br>

            <input
              id="stay-connected-chckbx"
              name="stay-connected"
              type="checkbox"
              value="stay-connected"
            >
            <label for="stay-connected">Stay connected</label><br><br>

            <input placeholder="submit" type="submit">
          </form>

          <?php include("src/includes/captcha.php");?>

          <?php include("src/includes/message.php");?>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/main.js"></script>
    <script src="./src/scripts/js/captcha.js"></script>
  </body>
</html>
