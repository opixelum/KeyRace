<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <title>KeyRace | Connect</title>
  </head>

  <body>
    <div class="container-fluid vh-100 p-3">
      <div class="row h-100 g-0">
        <!-- Navbar -->
        <div class="navbar col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("src/includes/navbar.php");?>
        </div>

        <!-- Main -->
        <div class="main col ms-2 rounded rgb-shadow">
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
