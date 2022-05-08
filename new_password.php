
<!DOCTYPE html>
<html lang="en">
<?php


      $page = "New password";
      $title = "New password | KeyRace";
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
    <form action="src/scripts/php/forgotten_password_script.php" method="post">
      <div class="container">
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="*************" name="password" required>
        <label for="password"><b>Confirm Password</b></label>
        <input type="password" placeholder="*************" name="confirmPassword" required>
        <button type="submit">Change password</button>
      </div>
    </form>
  </body>
</html>




