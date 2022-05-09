<?php
  session_start();

  if (isset($_SESSION["email"]))
  {
    header("location: index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "login";
      $title = "Log in | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>
        
      <main class="col ms-2 rounded rgb-shadow d-flex justify-content-center align-items-center flex-wrap h-100">
        <form class="d-flex justify-content-center flex-wrap h-75" action="./src/scripts/php/login_check.php" method="POST">
          <h1>Log in</h1>
          <div class="container d-flex justify-content-center flex-wrap w-100 h-25">
            <label class="w-100 text-center" for="email">Email</label>
            <input
              class="w-50 h-25 input-field border-0 px-3 py-2 rounded"
              id="email-inpt"
              name="email"
              placeholder="john.doe@email.com"
              required
              type="email"
              value="<?php
                  // Set cookie value to input field
                  echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : '';
              ?>" 
            >
          </div>


          <div class="container d-flex justify-content-center flex-wrap w-100 h-25">
            <label class="w-100 text-center" for="password">Password</label>
            <input
              class="w-50 h-25 input-field border-0 px-3 py-2 rounded"
              id="password-inpt"
              name="password"
              placeholder="••••••••••••••••"
              required
              type="password"
            >
          </div>  

          <input
            class="input-field"
            id="stay-connected-chckbx"
            name="stay-connected"
            type="checkbox"
            value="stay-connected"
          >
          <label for="stay-connected">Stay connected</label><br><br>

          <div class="d-flex flex-column justify-content-center w-100 h-25"> 
            <label class="w-100 text-center" for="captcha">Captcha</label>
            <?php include("src/includes/captcha.php");?>
          </div>

          <input class="btn" placeholder="submit" type="submit">
        </form>

        <?php include("src/includes/message.php");?>                       

        </main>
      </div>
    </div>

    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
