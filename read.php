<!DOCTYPE html>
<html lang="en">
  <?php
      $title = "Settings | KeyRace";
      include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 rounded rgb-shadow">
          <?php include("./src/includes/navbar.php");?>
        </header>

        <main class="col ms-2 rounded rgb-shadow">
          <div class="container">
            <?php 
                include('C:\MAMP\htdocs\KeyRace\src\scripts\php\db_connect.php');
                $q = "SELECT user_id, username, email, password, keyboard, role, kc, gc, avatar, banner, car FROM USER WHERE user_id = $_GET[id]";
                $req = $db->query($q);
                $results = $req->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <form method="post" action="./src/scripts/php/update.php?id='<?php echo $results[0]['user_id'] ?>'">
              <table class="table table-bordered">
                <?php
                    
                    echo '<tr><td>user_id</td><td><input name="user_id" type="text" value="' . $results[0]['user_id'] . '"></td></tr>';
                    echo '<tr><td>username</td><td><input name="username" type="text" value="' . $results[0]['username'] . '"></td></tr>';
                    echo '<tr><td>email</td><td><input name="email" type="text" value="' . $results[0]['email'] . '"></td></tr>';
                    echo '<tr><td>password</td><td> °°°°°° </td></tr>';
                    echo '<tr><td>keyboard</td><td><input name="keyboard" type="text" value="' . $results[0]['keyboard'] . '"></td></tr>';
                    echo '<tr><td>role</td><td><input name="role" type="text" value="' . $results[0]['role'] . '"></td></tr>';
                    echo '<tr><td>kc</td><td><input name="kc" type="text" value="' . $results[0]['kc'] . '"></td></tr>';
                    echo '<tr><td>gc</td><td><input name="gc" type="text" value="' . $results[0]['gc'] . '"></td></tr>';
                    echo '<tr><td>avatar</td><td><input name="avatar" type="text" value="' . $results[0]['avatar'] . '"></td></tr>';
                    echo '<tr><td>banner</td><td><input name="banner" type="text" value="' . $results[0]['banner'] . '"></td></tr>';
                    echo '<tr><td>car</td><td><input name="car" type="text" value="' . $results[0]['car'] . '"></td></tr>';
                    
                ?>
              </table>

              <button id="back-btn" type="button" class="btn">Back</button>
              <input type="submit" class="btn" value="Save">
            </form>
          </div>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/read.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
