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
          <form method="POST" action="./src/scripts/php/login_check.php">
            <label for="email">Email</label><br>
<<<<<<< HEAD
            <input type="email" value="<?php echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : '';?>" 
            id="email-inpt" name="email" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password-inpt" name="password" required><br><br>
=======
            <input type="text" id="email-inpt" name="email"
            placeholder="john.doe@email.com"><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password-inpt" name="password"
            placeholder="••••••••••••••••"><br><br>
>>>>>>> main

            <input type="checkbox" id="stay-connected-chckbx"
            name="stay-connected" value="stay-connected">
            <label for="stay-connected">Stay connected</label><br><br>

            <input type="submit" placeholder="submit">
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
