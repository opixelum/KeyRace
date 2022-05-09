<?php
    session_start();

    // Connect to database
    require "db_connect.php";

    // Check if POST is set
    if 
    (
        !isset($_POST["helmet"]) || 
        !isset($_POST["visor"])  ||
        !isset($_POST["vest"])   ||
        !isset($_POST["background"])
    )
    {
        echo 0;
        die("Error: missing POST parameters.");
    }

    // Get the user's id
    $id = $_SESSION["id"];

    // Get the user's helmet
    $helmet = $_POST["helmet"];

    // Get the user's visor
    $visor = $_POST["visor"];

    // Get the user's vest
    $vest = $_POST["vest"];

    // Get the user's background
    $background = $_POST["background"];

    // Update user's assets
    $statement = "UPDATE ASSETS SET helmet = :helmet, visor = :visor, vest = :vest, background = :background WHERE user_id = $id";
    $prepared_statement = $db->prepare($statement);
    $prepared_statement->execute
    ([
        "helmet" => $helmet,
        "visor" => $visor,
        "vest" => $vest,
        "background" => $background
    ]);

    if (!$prepared_statement) {
        echo 0;
        die("Error: failed to update user's assets.");
    }

    echo 1;
