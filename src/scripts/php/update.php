<?php

    include("db_connect.php");


    // Save the path
    $read_path = "location: ../../../edit.php?id=$_GET[id]&type=danger&message=";

    // Update the user
    if (isset($_POST['id']))
    {
        // For check if email or username already used
        $q = "SELECT * FROM USER WHERE id = $_GET[id]";
        $req = $db->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);

        $old_id = $results[0]["id"];
        $old_email = $results[0]["email"];
        $old_username = $results[0]["username"];

        // Check if the id is already in use
        $q = "SELECT id FROM USER";
        $req = $db->query($q);
        $id = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($id as $test)
        {
            if ($old_id === $_POST["id"])
            {
                break;
            }
            else if ($test["id"] === $_POST["id"])
            {
                header($read_path . "id is already in use.");
                exit;
            }
        }

        // Check if the email is already in use
        $q = "SELECT email FROM USER";
        $req = $db->query($q);
        $email = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($email as $test)
        {
            if ($old_email === $_POST['email'])
            {
                break;
            }
            else if ($test["email"] === $_POST["email"])
            {
                header($read_path . "Email is already in use.");
                exit;
            }
        }

        // Check if the username is already in use
        $q = "SELECT username FROM USER";
        $req = $db->query($q);
        $username = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($username as $test)
        {
            if ($old_username === $_POST['username'])
            {
                break;
            }
            else if ($test["username"] === $_POST["username"])
            {
                header($read_path . "Username is already in use.");
                exit;
            }
        }

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
        $query = "UPDATE STATS SET highest_wpm=:highest_wpm, races_ran=:races_ran, races_won=:races_won, quest=:quest,
                achievements=:achievements, time_played=:time_played WHERE user_id=$_GET[id]";
        $prepared_query = $db->prepare($query);
        $prepared_query->execute(["highest_wpm" => $_POST['highest_wpm'],
                                "races_ran" => $_POST['races_ran'],
                                "races_won" => $_POST['races_won'],
                                "quest" => $_POST['quest'],
                                "achievements" => $_POST['achievements'],
                                "time_played" => $_POST['time_played']]);
        $results = $prepared_query->fetchAll();

        header("location:../../../settings.php");

        exit;
    }

    // Update the stats
    else if (isset($_POST['helmet']))
    {
        // Update the user informations
        $query = "UPDATE ASSETS SET helmet=:helmet, visor=:visor, vest=:vest, background=:background,
                car=:car, banner=:banner WHERE user_id=$_GET[id]";
        $prepared_query = $db->prepare($query);
        $prepared_query->execute(["helmet" => $_POST['helmet'],
                                "visor" => $_POST['visor'],
                                "vest" => $_POST['vest'],
                                "background" => $_POST['background'],
                                "car" => $_POST['car'],
                                "banner" => $_POST['banner']]);
        $results = $prepared_query->fetchAll();

        header("location:../../../settings.php");

        exit;
    }
?>
