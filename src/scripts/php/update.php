<?php

    include("db_connect.php");

    // Save long string for shortening lines
    $read_path = "location: ../../../read.php?id=$_GET[id]&type=danger&message=";

    $q = "SELECT * FROM USER WHERE user_id = $_GET[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);


    if($_POST['user_id'] !== $results[0]['user_id'])
    {
        header($read_path . "user_id needs to be a number.");
        exit;
    }
    if($_POST['username'] !== $results[0]['username'])
    {
        header($read_path . "username needs to be a string.");
        exit;
    }
    if($_POST['email'] !== $results[0]['email'])
    {
        header($read_path . "email needs to be a string.");
        exit;
    }
    if($_POST['keyboard'] !== $results[0]['keyboard'])
    {
        header($read_path . "keyboard layout needs to be a number.");
        exit;
    }
    if($_POST['role'] !== $results[0]['role'])
    {
        header($read_path . "role needs to be a number.");
        exit;
    }
    if($_POST['kc'] !== $results[0]['kc'])
    {
        header($read_path . "kc needs to be a number.");
        exit;
    }
    if($_POST['gc'] !== $results[0]['gc'])
    {
        header($read_path . "gc needs to be a number.");
        exit;
    }
    if($_POST['avatar'] !== $results[0]['avatar'])
    {
        header($read_path . "avatar needs to be a string.");
        exit;
    }
    if($_POST['banner'] !== $results[0]['banner'])
    {
        header($read_path . "banner needs to be a string.");
        exit;
    }
    if($_POST['car'] !== $results[0]['car'])
    {
        header($read_path . "car needs to be a string.");
        exit;
    }

    $query = "UPDATE USER SET user_id=:user_id, username=:username, email=:email, keyboard=:keyboard, role=:role, kc=:kc, gc=:gc, avatar=:avatar, banner=:banner, car=:car WHERE user_id = " . htmlspecialchars($_GET['id']);
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["user_id" => $_POST['user_id'],
                            "username" => $_POST['username'],
                            "email" => $_POST['email'],
                            "keyboard" => $_POST['keyboard'],
                            "role" => $_POST['role'],
                            "kc" => $_POST['kc'],
                            "gc" => $_POST['gc'],
                            "avatar" => $_POST['avatar'],
                            "banner" => $_POST['banner'],
                            "car" => $_POST['car']]);
    $result = $prepared_query->fetchAll();

    header("location:../../../settings.php");
?>
