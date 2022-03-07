<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Sign in | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main class="col ms-2 rounded rgb-shadow">
          <form>
            <label for="username">Username</label><br>
            <input type="text" id="username-inpt" name="username"
            placeholder="JDoe"><br><br>

            <label for="email">Email</label><br>
            <input type="email" id="email-inpt" name="email"
            placeholder="john.doe@email.com"><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password-inpt" name="password"
            placeholder="••••••••••••••••"><br><br>

            <label for="confirm-password">Confirm password</label><br>
            <input type="password" id="confirm-password-inpt"
            name="confirm-password" placeholder="••••••••••••••••"><br><br>

            <label for="keyboard-layout">Keyboard layout</label><br>
            <select name="keyboard-layout" id="keyboard-layout-drpdwn">
              <option value="qwerty">QWERTY</option>
              <option value="azerty">AZERTY</option>
              <option value="dvorak">DVORAK</option>
            </select><br><br>

            <input type="submit" placeholder="submit">
          </form>
        </main>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./src/scripts/main.js"></script>
  </body>
</html>
