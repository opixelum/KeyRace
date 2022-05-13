<?php
    session_start();

    // Connect to database
    include("./db_connect.php");

    // Get user's last completed quest
    $query = "SELECT quest, achievements FROM STATS WHERE user_id=:id;";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["id" => $_SESSION["id"]]);
    $result = $prepared_query->fetchAll();
    // If an error occured, respond to request with error
    if (!$result) echo 0;

    $last_quest = $result[0]["quest"];
    $achievements = $result[0]["achievements"];

    // Read POST data
    $data = json_decode(file_get_contents("php://input"));
    $post_quest = $data->quest;

    // Add quest to database if it is not already completed
    if ($last_quest < $post_quest)
    {
        $new_achievements = $achievements . $post_quest;
        $query = "UPDATE STATS SET quest = :quest, achievements = :achievements WHERE user_id=:id;";
        $prepared_query = $db->prepare($query);
        $result = $prepared_query->execute
        ([
            "quest" => $post_quest, 
            "achievements" => $new_achievements,
            "id" => $_SESSION["id"]
        ]);
        // If an error occured, respond to request with error
        if (!$result) echo 0;
    }

    // Increment races_won 
    $statement = "UPDATE STATS SET races_won = races_won + 1 WHERE user_id=$_SESSION[id];";
    $result = $db->query($statement);
    if (!$result) echo 0;

    // Respond to request with success
    echo 1;
