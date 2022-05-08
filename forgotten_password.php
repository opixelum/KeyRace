
<!DOCTYPE html>
<html lang="en">
<?php


      $page = "forgotten password";
      $title = "Forgotten password | KeyRace";
      include('src/includes/head.php');
  ?>

<?php

include("src/scripts/php/db_connect.php");


?>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site web</title>
  </head>
  <body>
    <h2>Forgot password</h2>
    <form action="src/scripts/php/forgotten_password_check.php" method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
        <button type="submit">Send me a token</button>
      </div>
    </form>
  </body>
</html>




