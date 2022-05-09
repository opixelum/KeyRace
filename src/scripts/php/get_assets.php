<?php
    session_start();

    // Connect to database
    require "db_connect.php";

    // Get assets from database
    $statement = "SELECT helmet, visor, vest, background FROM ASSETS WHERE user_id = :id;";
    $prepared_statement = $db->prepare($statement);
    $prepared_statement->execute(["id" => $_SESSION["id"]]);
    $results = $prepared_statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$results)
    {
        die("Error: failed to load user's assets.");
    }

    echo json_encode($results[0]);
