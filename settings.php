<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <?php
      $page = "settings";
      $title = "Settings | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </header>

        <main class="col ms-2 rounded rgb-shadow d-flex justify-content-center align-items-center ">
          <form class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch"
            id="theme-switch">
            <label class="form-check-label" for="theme-switch">
              Dark / Light mode
            </label>



          <!-- Your code here -->


          <div class="row row-cols-1 w-100">
              <div class="col d-flex flex-column justify-content-evenly align-items-center">
                <label class="w-100 text-center" for="username">Username</label>
                <input
                class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
                type="text"
                value="<?php 
                  // Set cookie value to input field
                  echo isset($_COOKIE["username"]) ? $_COOKIE["username"] : '';
                ?>" 
                id="username-inpt"
                name="username"
                placeholder="JDoe"
                required
                >
              </div>

              <div class="col d-flex flex-column justify-content-evenly align-items-center">
                <label class="w-100 text-center" for="email">Email</label>
                <input
                  class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
                  type="email"
                  value="<?php
                    // Set cookie value to input field
                    echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : '';
                  ?>" 
                  id="email-inpt"
                  name="email"
                  placeholder="john.doe@email.com"
                  required
                >
              </div>


              <div class="col d-flex flex-column justify-content-evenly align-items-center">
                <label class="w-100 text-center" for="password">Password</label>
                <input
                class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
                type="password"
                id="password-inpt"
                name="password"
                placeholder="••••••••••••••••"
                required
                >
              </div>  


              <div class="col d-flex flex-column justify-content-evenly align-items-center">
                <label class="w-100 text-center" for="password">New Password</label>
                <input
                class="w-50 h-75 input-field border-0 px-3 py-2 rounded"
                type="password"
                id="NewPassword-inpt"
                name="password"
                placeholder="••••••••••••••••"
                required
                >
              </div>

              <div class="col d-flex flex-column align-items-center">
                <input class="" placeholder="submit" type="submit">
              </div>
              
            </form>


            
            
          


            <?php
              /* TO DO: add dynamic switch between accounts and database settings

              if (isset($_SESSION["email"]))
              {
                  include('src/scripts/php/db_connect.php');

                  $query = "SELECT role FROM USER WHERE email = :email";
                  $prepared_query = $db->prepare($query);
              
                  $prepared_query->execute(["email" => $_SESSION["email"]]);
              
                  $result = $prepared_query->fetchAll();

                  if ($result[0]['role'] == 3)
                  {
                      include('src/includes/users.php');
                  }
              }
              */
            ?>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/settings.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
