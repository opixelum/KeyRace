<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <title>KeyRace | Connect</title>
  </head>

  <body>
    <div class="container-fluid vh-100 p-3 bg-black">
      <div class="row h-100 g-0">
        <!-- Navbar -->
        <div class="navbar col-2 p-0 me-2 rounded custom-shadow">
          <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div class="main col ms-2 rounded custom-shadow">
          <form>
            <label for="username">Username</label><br>
            <input type="text" id="username-inpt" name="username"
            placeholder="JDoe"><br><br>

            <label for="email">Email</label><br>
            <input type="email" id="email-inpt" name="email"
            placeholder="john.doe@email.com"><br><br>

            <label for="password">Password</label><br>
            <input type="pasword" id="password-inpt" name="password"
            placeholder="••••••••••••••••"><br><br>

            <label for="confirm-password">Confirm password</label><br>
            <input type="pasword" id="confirm-password-inpt"
            name="confirm-password" placeholder="••••••••••••••••"><br><br>

            <label for="keyboard-layout">Keyboard layout</label><br>
            <select name="keyboard-layout" id="keyboard-layout-drpdwn">
              <option value="qwerty">QWERTY</option>
              <option value="azerty">AZERTY</option>
              <option value="dvorak">DVORAK</option>
            </select><br><br>

            <input type="submit">
          </form>
        </div>
      </div>
    </div>

    <script src="./src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./src/scripts/main.js"></script>
  </body>
</html>
