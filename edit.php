<!DOCTYPE html>
<html lang="en">
  <?php
    session_start();
    $page = "read";
    $title = "Settings | KeyRace";
    include("./src/includes/head.php");
  ?>

  <body class="dark-theme">
    <div class="container-fluid vh-100 g-0">
      <div class="row h-100 p-3 g-0">
        <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
          <?php include("./src/includes/navbar.php"); ?>
        </header>

        <?php
            if (isset($_SESSION["email"]))
            {
              include('src/scripts/php/db_connect.php');

              $query = "SELECT role FROM USER WHERE email = :email";
              $prepared_query = $db->prepare($query);
          
              $prepared_query->execute(["email" => $_SESSION["email"]]);
          
              $result = $prepared_query->fetchAll();


              if ($result[0]['role'] != 3)
              {
                header("location:settings.php");
                exit;
              }
            }
            else
            {
              header("location:settings.php");
              exit;
            }
        ?>

        <main class="col ms-2 rounded d-flex align-items-center rgb-shadow">
          <div class="container w-75">
            <?php
              include('src/scripts/php/db_connect.php');
              $q = "SELECT id, username, email, password, keyboard, role FROM USER WHERE id = $_GET[id]";
              $req = $db->query($q);
              $results = $req->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>User</h1>
            </div>
            <form method="post" action="src/scripts/php/update.php?id='<?php echo $results[0]['id'] ?>'">
              <table class="table table-bordered">
                <?php
                  echo '<tr>
                          <td class="text-center">id</td>
                          <td class="text-center"><input name="id" type="number" value="' . $results[0]['id'] . '"></td>
                        </tr>';
                  echo '<tr>
                          <td class="text-center">username</td>
                          <td class="text-center"><input name="username" type="text" value="' . $results[0]['username'] . '"></td>
                        </tr>';
                  echo '<tr>
                          <td class="text-center">email</td>
                          <td class="text-center"><input name="email" type="text" value="' . $results[0]['email'] . '"></td>
                        </tr>';
                  echo '<tr>
                          <td class="text-center">password</td>
                          <td class="text-center"> °°°°°° </td>
                        </tr>';
                  echo '<tr>
                          <td class="text-center">keyboard</td>
                          <td class="text-center"><input name="keyboard" type="number" value="' . $results[0]['keyboard'] . '"></td>
                        </tr>';
                  echo '<tr>
                          <td class="text-center">role</td>
                          <td class="text-center"><input name="role" type="number" value="' . $results[0]['role'] . '"></td>
                        </tr>';
                ?>
              </table>

              <div class="d-flex justify-content-center">
                <button id="back-btn" type="button" class="btn w-25 m-2">Back</button>
                <input type="submit" class="btn w-25 m-2" value="Save">
              </div>
            </form>
            <?php include("./src/includes/message.php"); ?>
          </div>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/edit.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
