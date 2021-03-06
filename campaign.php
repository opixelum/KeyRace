<?php
  session_start();

  if (isset($_SESSION["id"]))
  {
    include('src/scripts/php/db_connect.php');

    $query = "SELECT quest FROM STATS WHERE user_id=:id";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["id" => $_SESSION["id"]]);

    $result = $prepared_query->fetchAll();
  }
  else
  {
    header("location: index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<?php
$page = "campaign";
$title = "Campaign | KeyRace";
include("src/includes/head.php");
?>

<body class="dark-theme">
  <div class="container-fluid vh-100 g-0">
    <div class="row h-100 p-3 g-0">
      <header class="col-2 p-0 me-2 h-100 rounded rgb-shadow">
        <?php include("src/includes/navbar.php"); ?>
      </header>

      <main class="col d-flex flex-column justify-content-between align-items-center flex-wrap h-100 ms-2 rounded rgb-shadow p-5">
        <?php
        // If no quest parameter in url or user's max quest is lower, display campaign menu
        if (!isset($_GET["quest"]) || $_GET["quest"] < 1 || $_GET["quest"] > 8 || $result[0]["quest"] + 1 < $_GET["quest"])
          include("src/includes/campaign_menu.php");

        // If quest parameter in url, display corresponding quest
        else {
          $quest = $_GET["quest"];
          include("src/includes/quest.php");
        }
        ?>
      </main>
    </div>
  </div>

  <script src="../src/scripts/js/main.js"></script>
</body>

</html>
