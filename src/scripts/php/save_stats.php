<?php

    //Connect to database
    include("./db_connect.php");

    // Check if POST is set
    if (isset($_POST['wpm']) || !isset($_POST['accuracy']) || !isset($_POST['time'])) {
        // Get the user's id
        $id = $_SESSION['id'];

        // Get the user's wpm
        $wpm = $_POST['wpm'];

        // Get the user's accuracy
        $accuracy = $_POST['accuracy'];

        // Get the user's time
        $time = $_POST['time'];

        // Select stats from the user
        $q = "SELECT user_id, average_wpm, highest_wpm, races_ran, races_won, time_played FROM STATS WHERE user_id = $id";
        $req = $db->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
    }
?>
