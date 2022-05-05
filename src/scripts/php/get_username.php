<?php
    session_start();

    // Connect to database
    include "db_connect.php";

    // Get username from database
    $query = $db->prepare("SELECT username FROM USER WHERE id = ?");
    $query->execute([$_SESSION['id']]);
    $result = $query->fetchAll();

    echo $result[0]['username'];
