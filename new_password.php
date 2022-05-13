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
      $page = "New password";
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
          <form action="src/scripts/php/change_password_verif.php" class="container d-flex justify-content-center flex-wrap w-75 h-75" method="POST">
          <h1>New Password</h1>
            <div class="row row-cols-2 w-100 justify-content-center h-25">

              <div class="container col d-flex flex-column justify-content-evenly align-items-center">
                <label class="w-100 text-center" for="password">Password</label>
                <input
                  class="w-75 h-25 input-field border-0 px-3 py-2 rounded"
                  type="password"
                  placeholder="Enter password"
                  name="password"
                  required
                >

                <label class="w-100 text-center" for="email">Confirm password</label>
                <input
                  class="w-75 h-25 input-field border-0 px-3 py-2 rounded"
                  type="password"
                  placeholder="Confirm password"
                  name="confirmedPassword"
                  required
                >
                <button class="btn mt-2" type="submit">Change Password</button>
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
