<?php
    include("db_connect.php");

    $query = "UPDATE USER SET user_id=:user_id, username=:username, email=:email, keyboard=:keyboard, role=:role, kc=:kc, gc=:gc, avatar=:avatar, banner=:banner, car=:car WHERE user_id = $_POST[user_id]";
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
