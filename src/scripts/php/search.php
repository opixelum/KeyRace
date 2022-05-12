<?php
    require "db_connect.php";

    // Get query from url
    $query = "$_GET[q]%";

    // Request database
    $statement = "SELECT id, username FROM USER WHERE username LIKE :query";
    $prepared_statement = $db->prepare($statement);
    $prepared_statement->execute(["query" => $query]);
    $results = $prepared_statement->fetchAll();

    // Create links to users' profile
    $profile_url = "profile.php?id=";
    $users_found = "";
    foreach ($results as $key => $user)
        $users_found .= "<a href='$profile_url"."$user[id]'>$user[username]</a><br>";

    // Send results
    echo $users_found;
