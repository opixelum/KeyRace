<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Sign up | KeyRace";
      include("src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main class="col ms-2 rounded rgb-shadow">
          <form method="POST" action="./src/scripts/php/signup_check.php">
            <label for="username">Username</label><br>
            <input type="text" value="<?php echo isset($_COOKIE["username"]) ? $_COOKIE["username"] : '';?>" 
            id="username-inpt" name="username" placeholder="JDoe" required><br><br>

            <label for="email">Email</label><br>
            <input type="email" value="<?php echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : '';?>" 
            id="email-inpt" name="email" placeholder="john.doe@email.com" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password-inpt" name="password"
            placeholder="••••••••••••••••" required><br><br>

            <label for="confirm-password">Confirm password</label><br>
            <input type="password" id="confirm-password-inpt"
            name="confirm-password" placeholder="••••••••••••••••" required><br><br>

            <label for="keyboard-layout">Keyboard layout</label><br>
            <select name="keyboard-layout" id="keyboard-layout-drpdwn" required>
              <option value=''>--- Choose a layout ---</option>
              <option value='1'>QWERTY</option>
              <option value='2'>AZERTY</option>
              <option value='3'>DVORAK</option>
            </select><br><br>

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
