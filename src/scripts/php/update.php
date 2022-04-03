<?php
    // Save long string for shortening lines
    $login_path = "location: ../../../read.php?type=";

    if($_POST['user_id'] !== $_POST['user_id'])
    {
        header($login_path . "danger&message=user_id needs to be a number.");
        exit;
    }
    if($_POST['username'] !== $_POST['username'])
    {
        header($login_path . "danger&message=username needs to be a string.");
        exit;
    }
    if($_POST['email'] !== $_POST['email'])
    {
        header($login_path . "danger&message=email needs to be a string.");
        exit;
    }
    if($_POST['keyboard'] !== $_POST['keyboard'])
    {
        header($login_path . "danger&message=keyboard layout needs to be a number.");
        exit;
    }
    if($_POST['role'] !== $_POST['role'])
    {
        header($login_path . "danger&message=role needs to be a number.");
        exit;
    }
    if($_POST['kc'] !== $_POST['kc'])
    {
        header($login_path . "danger&message=kc needs to be a number.");
        exit;
    }
    if($_POST['gc'] !== $_POST['gc'])
    {
        header($login_path . "danger&message=gc needs to be a number.");
        exit;
    }
    if($_POST['avatar'] !== $_POST['avatar'])
    {
        header($login_path . "danger&message=avatar needs to be a string.");
        exit;
    }
    if($_POST['banner'] !== $_POST['banner'])
    {
        header($login_path . "danger&message=banner needs to be a string.");
        exit;
    }
    if($_POST['car'] !== $_POST['car'])
    {
        header($login_path . "danger&message=car needs to be a string.");
        exit;
    }

    include("db_connect.php");
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
