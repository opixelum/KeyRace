<?php 
  session_start();

  // If user is not logged in, redirect to index
  if (!isset($_SESSION["id"]))
  {
    include('src/includes/not_logged_in_settings.php');
  }
  else
  {
    include('src/includes/connected_settings.php');
  }
?>
