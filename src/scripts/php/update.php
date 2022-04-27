<?php

    include("db_connect.php");

    // Save the path
    $read_path = "location: ../../../edit.php?id=$_GET[id]&type=danger&message=";

    $q = "SELECT * FROM USER WHERE id = $_GET[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);


    if (!preg_match("@[0-9]@", $_POST['id']))
    {
        header($read_path . "id needs to be a number.");
        exit;
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        header($read_path . "email needs to be an email.");
        exit;
    }
    if (!preg_match("@[0-9]@", $_POST['keyboard']))
    {
        header($read_path . "keyboard layout needs to be a number.");
        exit;
    }
    if (!preg_match("@[0-9]@", $_POST['role']))
    {
        header($read_path . "role needs to be a number.");
        exit;
    }
    if (!preg_match("@[0-9]@", $_POST['kc']))
    {
        header($read_path . "kc needs to be a number.");
        exit;
    }
    if (!preg_match("@[0-9]@", $_POST['gc']))
    {
        header($read_path . "gc needs to be a number.");
        exit;
    }

    // Update the user informations
    $query = "UPDATE USER SET id=:id, username=:username, email=:email, keyboard=:keyboard, role=:role, kc=:kc, gc=:gc WHERE id=$_GET[id]";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["id" => $_POST['id'],
                            "username" => $_POST['username'],
                            "email" => $_POST['email'],
                            "keyboard" => $_POST['keyboard'],
                            "role" => $_POST['role'],
                            "kc" => $_POST['kc'],
                            "gc" => $_POST['gc']
    $result = $prepared_query->fetchAll();

    header("location:../../../settings.php");

    exit;
?>
