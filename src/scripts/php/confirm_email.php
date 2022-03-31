<?php
    // Connect to database
    include("./db_connect.php");

    // Change role of user from 0 (unverified) to 1 (verified user)
    $query = "UPDATE USER SET role=1 WHERE ckey=:ckey;";
    $prepared_query = $db->prepare($query);

    // Execute query with confirmation key, provided in the URL
    $prepared_query->execute(["ckey" => $_GET["ckey"]]);

    header("location: ../../../login.php?type=success&message=Email confirmed. You can now log in!");
    exit();
?>
