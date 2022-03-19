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
            <input type="text" id="email-inpt"
            name="email"><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password-inpt" name="password"><br><br>

            <input type="checkbox" id="stay-connected-chckbx"
            name="stay-connected" value="stay-connected">
            <label for="stay-connected">Stay connected</label><br><br>

            <input type="submit" placeholder="submit">
          </form>

          <div id="puzzle_container">
            <div class="puzzle_block">1</div>
            <div class="puzzle_block">2</div>
            <div class="puzzle_block">3</div>
            <div class="puzzle_block">4</div>
            <div class="puzzle_block">5</div>
            <div class="puzzle_block">6</div>
            <div class="puzzle_block">7</div>
            <div class="puzzle_block">8</div>
          </div>
          <div id="reset_container">
            <div class="reset_button">Reset</div>
          </div>

          <?php include("src/includes/message.php");?>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/main.js"></script>
    <script src="./src/scripts/js/captcha.js"></script>
  </body>
</html>
