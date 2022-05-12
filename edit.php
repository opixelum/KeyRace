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
            <div class="row w-100 justify-content-center m-3">
              <button id="user-edit" class="btn w-25 m-3">User</button>
              <button id="assets-edit" class="btn w-25 m-3">Assets</button>
              <button id="stats-edit" class="btn w-25 m-3">Stats</button>
            </div>
              <div id="edit-menu" class="row w-100 justify-content-center m-3">
              </div>
            <?php include("./src/includes/message.php"); ?>
          </div>
        </main>
      </div>
    </div>

    <script src="./src/scripts/js/edit.js"></script>
    <script src="./src/scripts/js/main.js"></script>
  </body>
</html>
