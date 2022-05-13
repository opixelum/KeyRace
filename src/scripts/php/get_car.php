<?php
    session_start();

    // Connect to database
    require "db_connect.php";

    // If user is on profile page, get user id from url.
    // If not, get user id from session.
    $id = isset($_GET["id"]) ? $_GET["id"] : $_SESSION["id"];

    // Get assets from database
    $statement = "SELECT car FROM ASSETS WHERE user_id = :id;";
    $prepared_statement = $db->prepare($statement);
    $prepared_statement->execute(["id" => $id]);
    $results = $prepared_statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$results)
        die("Error: failed to load user's assets.");

    echo $results[0]["car"];
