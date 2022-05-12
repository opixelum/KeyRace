<?php
    session_start();
    include("db_connect.php");

    // Save the path
    $read_path = "location: ../../../settings.php?";

    $q = "SELECT * FROM USER WHERE id = $_SESSION[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    // Save olds values for check if they changed
    $old_email = $results[0]["email"];
    $old_username = $results[0]["username"];

    if (!filter_var($_POST['new-email'], FILTER_VALIDATE_EMAIL))
    {
        header($read_path . "type=danger&message=Email needs to be an email.");
        exit;
    }

    // Check if the email is already in use
    $q = "SELECT email FROM USER";
    $req = $db->query($q);
    $email = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($email as $test)
    {
        if ($old_email === $_POST['new-email'])
        {
            break;
        }
        else if ($test["email"] === $_POST["new-email"])
        {
            header($read_path . "type=danger&message=Email is already in use.");
            exit;
        }
    }

    // Check if the username is already in use
    $q = "SELECT username FROM USER";
    $req = $db->query($q);
    $username = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($username as $test)
    {
        if ($old_username === $_POST['new-username'])
        {
            break;
        }
        else if ($test["username"] === $_POST["new-username"])
        {
            header($read_path . "type=danger&message=Username is already in use.");
            exit;
        }
    }

    // Include $encrypted_password
    include("../../includes/salt.php");

    // Check if the password is correct
    if ($encrypted_password != $results[0]['password'])
    {
        header($read_path . "type=danger&message=Password is incorrect.");
        exit;
    }


    // Update new values
    if (empty($_POST['new-password']))
    {
        // Update the user informations
        $query = "UPDATE USER SET username=:username, email=:email WHERE id=$_SESSION[id]";
        $prepared_query = $db->prepare($query);
        $prepared_query->execute
        ([
            "username" => $_POST['new-username'],
            "email" => $_POST['new-email']
        ]);
        $result = $prepared_query->fetchAll();

        header($read_path . "type=success&message=Values have been changed.");
        exit;
    }
    else if (!empty($_POST['new-password']))
    {
        $password = $_POST['new-password'];

        // Store booleans for each requirement
        $uppercase = preg_match("@[A-Z]@", $password);
        $lowercase = preg_match("@[a-z]@", $password);
        $number    = preg_match("@[0-9]@", $password);
        $symbols   = preg_match("@[\w]@" , $password);
        $length    = strlen($password) > 8;

        // If password doesn't meet requirements
        if (!($uppercase && $lowercase && $number && $symbols && $length))
        {
            header($read_path . "type=danger&message=Password doesn't meet requirements.");
            exit();
        }

        // Hash new password
        $encrypted_password = hash("sha512", $salt . $_POST["new-password"]);

        $query = "UPDATE USER SET username=:username, email=:email, password=:password WHERE id=$_SESSION[id]";
        $prepared_query = $db->prepare($query);
        $prepared_query->execute(["username" => $_POST['new-username'],
                                "email" => $_POST['new-email'],
                                "password" => $encrypted_password]);
        $result = $prepared_query->fetchAll();
    
        header($read_path . "type=success&message=Values have been changed.");
        exit;
    }
?>
