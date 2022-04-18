<?php
    session_start();

    // Connect to database
    include("./db_connect.php");

    // Get user's last completed quest
    $query = "SELECT quest FROM STATS WHERE user_id=:id;";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["id" => $_SESSION["id"]]);
    $result = $prepared_query->fetchAll();
    // If an error occured, respond to request with error
    if (!$result) echo 0;

    $last_quest = $result[0]["quest"];

    // Read POST data
    $data = json_decode(file_get_contents("php://input"));
    $post_quest = $data->quest;

    // Add quest to database if it is not already completed
    if ($last_quest < $post_quest)
    {
        $query = "UPDATE STATS SET quest=:quest WHERE user_id=:id;";
        $prepared_query = $db->prepare($query);
        $result = $prepared_query->execute(["quest" => $post_quest, "id" => $_SESSION["id"]]);
        // If an error occured, respond to request with error
        if (!$result) echo 0;
    }

    // Respond to request with success
    echo 1;
?>
