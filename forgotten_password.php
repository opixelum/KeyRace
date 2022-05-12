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
      $page = "forgotten password";
      $title = "forgotten password | KeyRace";
      include("src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>
        
        <main class="col ms-2 d-flex justify-content-center align-items-center rounded rgb-shadow"> 
          <form action="src/scripts/php/forgotten_password_check.php" class="container d-flex justify-content-center flex-wrap w-75 h-75" method="POST">
          <h1>Forgotten Password</h1>
            <div class="row row-cols-2 w-100 justify-content-center">

              <div class="container col d-flex flex-column justify-content-evenly align-items-center">
                <label class="w-100 text-center" for="email">Email</label>
                <input
                  class="w-75 h-25 input-field border-0 px-3 py-2 rounded"
                  type="email"
                  placeholder="Enter Email"
                  name="email"
                  required
                >
                <button class="btn" type="submit">Send me an email</button>
              </div>


            </div>
            
            <div class="row row-cols-1 w-100">
               
            </div>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>
