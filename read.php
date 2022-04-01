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

            <table class="table table-bordered">
              <?php
                  foreach ($results as $key => $user) {
                      echo '<tr><td>user_id</td><td>' . $user['user_id'] . '</td></tr>';
                      echo '<tr><td>username</td><td>' . $user['username'] . '</td></tr>';
                      echo '<tr><td>email</td><td>' . $user['email'] . '</td></tr>';
                      echo '<tr><td>password</td><td> °°°°°° </td></tr>';
                      echo '<tr><td>keyboard</td><td>' . $user['keyboard'] . '</td></tr>';
                      echo '<tr><td>role</td><td>' . $user['role'] . '</td></tr>';
                      echo '<tr><td>kc</td><td>' . $user['kc'] . '</td></tr>';
                      echo '<tr><td>gc</td><td>' . $user['gc'] . '</td></tr>';
                      echo '<tr><td>avatar</td><td>' . $user['avatar'] . '</td></tr>';
                      echo '<tr><td>banner</td><td>' . $user['banner'] . '</td></tr>';
                      echo '<tr><td>car</td><td>' . $user['car'] . '</td></tr>';
                  }
              ?>
            </table>

            <button id="back-btn" type="button" class="btn">Back</button>
            <button id="save-btn" type="button" class="btn">Save</button>
          </div>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/read.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
