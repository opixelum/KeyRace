<?php 
  session_start();

  // If user is not logged in
  if (!isset($_SESSION["id"]))
  {
    include('src/includes/not_logged_in_settings.php');
  }
  // If user is logged in
  else
  {
    include('src/includes/connected_settings.php');
  }
?>
