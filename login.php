<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Log in | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 p-3">
      <div class="row h-100 g-0">
        <!-- Navbar -->
        <div id="navbar" class="navbar col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div id="main" class="main col ms-2 rounded rgb-shadow">
          <form>
            <label for="email-or-username">Email or username</label><br>
            <input type="text" id="email-or-username-inpt"
            name="email-or-username"><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password-inpt" name="password"><br><br>

            <input type="checkbox" id="stay-connected-chckbx"
            name="stay-connected" value="stay-connected">
            <label for="stay-connected">Stay connected</label><br><br>

            <input type="submit" placeholder="submit">
          </form>
        </div>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./src/scripts/main.js"></script>
  </body>
</html>
