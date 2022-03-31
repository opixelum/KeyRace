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
        
        <main class="col ms-2 d-flex justify-content-center align-items-center rounded rgb-shadow"> 
          <form class="container d-flex justify-content-center flex-wrap w-75 h-75" method="POST" action="./src/scripts/php/signup_check.php">
          <h1>Sign up</h1>
            <div style="border:1px solid blue" class="row row-cols-2 w-100">
              <div style="border:1px solid red" class="col">
                <label class="w-100 text-center" for="username">Username</label><br>
                <input
                class="w-100 h-25"
                type="text"
                value="<?php 
                  // Set cookie value to input field
                  echo isset($_COOKIE["username"]) ? $_COOKIE["username"] : '';
                ?>" 
                id="username-inpt"
                name="username"
                placeholder="JDoe"
                required
                ><br><br>
              </div>

              <div style="border:1px solid red" class="col">
                <label class="w-100 text-center" for="email">Email</label><br>
                <input
                  class="w-100 h-25"
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
            </div>
            
            <div style="border:1px solid blue" class="row row-cols-2 w-100">
              <div style="border:1px solid red" class="col">
                <label class="w-100 text-center" for="password">Password</label><br>
                <input
                class="w-100 h-25"
                type="password"
                id="password-inpt"
                name="password"
                placeholder="••••••••••••••••"
                required
                ><br><br>
              </div>

              <div style="border:1px solid red" class="col">
                <label class="w-100 text-center" for="confirm-password">Confirm password</label><br>
                <input
                class="w-100 h-25"
                type="password"
                id="confirm-password-inpt"
                name="confirm-password"
                placeholder="••••••••••••••••"
                required
                ><br><br>             
              </div>
            </div>

            <div style="border:1px solid blue" class="row row-cols-2 w-100 h-25 ">
              <div class="col" style="border:1px solid red">
                <label class="w-100 text-center" for="keyboard-layout">Keyboard layout</label><br>
                <select
                  class="w-100"
                  name="keyboard-layout"
                  id="keyboard-layout-drpdwn"
                  required
                >
                  <option value=''>--- Choose a layout ---</option>
                  <option value='1'
                    <?php // Select saved keyboard layout from cookie
                        echo
                            isset($_COOKIE["keyboard_layout"]) &&
                            $_COOKIE["keyboard_layout"] == 1 ? "selected" : '';
                    ?>
                  >QWERTY</option>

                  <option value='2'
                    <?php // Select saved keyboard layout from cookie
                        echo
                            isset($_COOKIE["keyboard_layout"]) &&
                            $_COOKIE["keyboard_layout"] == 2 ? "selected" : '';
                    ?>
                  >AZERTY</option>

                  <option value='3'
                    <?php // Select saved keyboard layout from cookie
                        echo
                            isset($_COOKIE["keyboard_layout"]) &&
                            $_COOKIE["keyboard_layout"] == 3 ? "selected" : '';
                    ?>
                  >DVORAK</option>                  
                </select>
              </div>
              <div class="col w-50"> 
                <label class="w-100 text-center" for="captcha">Captcha</label><br>
                <?php include("src/includes/captcha.php");?>
                <br><br>
              </div>
            </div>

            <input class="w-100" type="submit" placeholder="submit">
          
          </form>


          <?php include("src/includes/message.php");?>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/main.js"></script>
    <script src="./src/scripts/js/captcha.js"></script>
  </body>
</html>
