<?php
    session_start();

    // Connect to database
    require "db_connect.php";

    // Check if POST is set
    if (!isset($_POST["car"])) echo "Error: missing car POST parameter.";

    // Get the user's id
    $id = $_SESSION["id"];

    // Update user's assets
    $statement = "UPDATE ASSETS SET car = :car WHERE user_id = $id";
    $prepared_statement = $db->prepare($statement);
    $prepared_statement->execute(["car" => $_POST["car"]]);

    if (!$prepared_statement)
        echo "Error: failed to update user's car.";

    echo 1;
