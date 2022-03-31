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

        <main class="col ms-2 rounded rgb-shadow d-flex justify-content-center align-items-center">
          <form class="d-flex justify-content-center flex-wrap">
            <label  class="w-100 text-center" for="email-or-username">Email or username</label><br>
            <input type="text" id="email-or-username-inpt"
            name="email-or-username"><br><br>

            <label  class="w-100 text-center" for="password">Password</label><br>
            <input type="password" id="password-inpt" name="password"><br><br>

            <div class="w-100 d-flex justify-content-center"> 
              <input type="checkbox" id="stay-connected-chckbx"
              name="stay-connected" value="stay-connected" >
              <label  for="stay-connected">Stay connected</label><br><br>
            </div>

            <input class="w-100" type="submit" value="Submit">
         
          </form>

          <?php
              if(isset($_GET["message"]) && !empty($_GET["message"]))
              {
                  echo 
                    "<div class='alert alert-" . htmlspecialchars($_GET["type"]) . 
                    "' role='alert'>" . htmlspecialchars($_GET["message"]) .
                    "</div>";
              }
          ?>
        </main>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
