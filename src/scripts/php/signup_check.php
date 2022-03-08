<?php 
    // Store user credentials in variables
    $username         = $_POST["username"];
    $email            = $_POST["email"];
    $password         = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $keyboard_layout  = $_POST["keyboard-layout"];
;

    // *************** F I E L D S   V E R I F I C A T I O N S ****************

    // If an error is caught, redirect to signup page with the error message 

    // If at least one field is empty
    if (empty($username) || empty($email) || empty($password) ||
    empty($confirm_password) || empty($keyboard_layout))
    {
        header("location: ../../../signup.php?type=warning&message=Please fill all fields.");
        exit();
    }

    // If username is too long
    if (strlen($username) > 45)
    {
        header("location: ../../../signup.php?type=warning&message=Username must be less than 45 characters long.");
        exit();
    }

    // If email is too long
    if (strlen($email) > 255)
    {
        header("location: ../../../signup.php?type=warning&message=Email must be less than 255 characters long.");
        exit();
    }

    // If email has wrong format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("location: ../../../signup.php?type=warning&message=Email has wrong format.");
        exit();
    }

    // Store booleans for each requirement
    $uppercase = preg_match("@[A-Z]@", $password);
    $lowercase = preg_match("@[a-z]@", $password);
    $number    = preg_match("@[0-9]@", $password);
    $symbols   = preg_match("@[\w]@" , $password);
    $length    = strlen($password) > 8;

    // If password doesn't meet requirements
    if (!($uppercase && $lowercase && $number && $symbols && $length))
    {
        header("location: ../../../signup.php?type=warning&message=Password doesn't meet requirements.");
        exit();
    }

    // If confirm_password is different than password
    if ($password != $confirm_password)
    {
        header("location: ../../../signup.php?type=warning&message=Confirm password is different.");
        exit();
    }

    // Connect to database
    include("./db_connect.php");


    header("location: ../../../login.php");
    exit();
?>