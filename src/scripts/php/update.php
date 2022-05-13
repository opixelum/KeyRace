<?php

    include("db_connect.php");

    // Save the path
    $read_path = "location: ../../../edit.php?id=$_GET[id]&type=danger&message=";

    // Update the user
    if (isset($_POST['id']))
    {
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

        // Update the user informations
        $query = "UPDATE USER SET id=:id, username=:username, email=:email, keyboard=:keyboard, role=:role WHERE id=$_GET[id]";
        $prepared_query = $db->prepare($query);
        $prepared_query->execute(["id" => $_POST['id'],
                                "username" => $_POST['username'],
                                "email" => $_POST['email'],
                                "keyboard" => $_POST['keyboard'],
                                "role" => $_POST['role']]);
        $result = $prepared_query->fetchAll();

        header("location:../../../settings.php");

        exit;
    }

    // Update the stats
    else if (isset($_POST['highest_wpm']))
    {
        $q = "SELECT * FROM STATS WHERE user_id = $_GET[id]";
        $req = $db->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!preg_match("@[0-9]@", $_POST['highest_wpm']))
        {
            header($read_path . "Highest_wpm needs to be a number.");
            exit;
        }

        if (!preg_match("@[0-9]@", $_POST['races_ran']))
        {
            header($read_path . "Races_ran needs to be a number.");
            exit;
        }

        if (!preg_match("@[0-9]@", $_POST['races_won']))
        {
            header($read_path . "Races_won needs to be a number.");
            exit;
        }

        if (!preg_match("@[0-9]@", $_POST['quest']))
        {
            header($read_path . "Quest needs to be a number.");
            exit;
        }

        if (!preg_match("@[0-9]@", $_POST['achievements']))
        {
            header($read_path . "Achievements needs to be a number.");
            exit;
        }

        if (!preg_match("@[0-9]@", $_POST['time_played']))
        {
            header($read_path . "Time_played needs to be a number.");
            exit;
        }

        // Update the user informations
        $query = "UPDATE USER SET highest_wpm=:highest_wpm, races_ran=:races_ran, races_won=:races_won, quest=:quest,
                achievements=:achievements, time_played=:time_played id=$_GET[id]";

        $prepared_query = $db->prepare($query);
        $prepared_query->execute(["highest_wpm" => $_POST['highest_wpm'],
                                "races_ran" => $_POST['races_ran'],
                                "races_won" => $_POST['races_won'],
                                "quest" => $_POST['quest'],
                                "achievements" => $_POST['achievements'],
                                "time_played" => $_POST['time_played']]);
        $result = $prepared_query->fetchAll();

        header("location:../../../settings.php");

        exit;
    }
?>
