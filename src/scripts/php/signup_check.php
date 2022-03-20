<?php 
    // Connect to database
    include("./db_connect.php");

    // Store user credentials in variables
    $username         = $_POST["username"];
    $email            = $_POST["email"];
    $password         = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $keyboard_layout  = $_POST["keyboard-layout"];


    // *************** F I E L D S   V E R I F I C A T I O N S ****************

    // If an error is caught, redirect to signup page with the error message 

    // If at least one field is empty
    if (empty($username) || empty($email) || empty($password) ||
    empty($confirm_password) || empty($keyboard_layout))
    {
        header("location: ../../../signup.php?type=warning&message=Please fill all fields.");
        exit();
    }

    // If username not long enough 
    if (strlen($username) < 3)
    {
        header("location: ../../../signup.php?type=warning&message=Username must be more than 3 characters long.");
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

    // If email is already registered
    $query = "SELECT * FROM USER WHERE email = :email";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["email" => $email]);
    $result = $prepared_query->fetchAll();

    if ($result)
    {
        header("location: ../../../signup.php?type=warning&message=Email is already used.");
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
    if ($confirm_password != $password)
    {
        header("location: ../../../signup.php?type=warning&message=Confirm password is different.");
        exit();
    }


    // ********************* A D D   U S E R   T O   D B **********************
    
    // Encrypt password
    include("../../includes/salt.php");

    // Generate confirmation key for email confirmation
    $ckey = md5(time() . $email);

    // Prepare query to insert into the USER table in the database
    $query = "INSERT INTO USER (username, email, password, keyboard, ckey) VALUES (:username, :email, :password, :keyboard, :ckey);";
    $prepared_query = $db->prepare($query);

    // Execute query with user credentials
    $result = $prepared_query->execute
    ([
        "username" => $username, 
        "email"    => $email,
        "password" => $encrypted_password,
        "keyboard" => $keyboard_layout,
        "ckey"     => $ckey
    ]);


    // If query was successful
    if ($result)
    {
        include("./send_email.php");
        header("location: ../../../login.php?type=success&message=Accout created successfully. Confirm your email address before logging in.");
        exit();
    }

    // If query failed
    header("location: ../../../signup.php?type=alert&message=An error occured. Please try again.");
    exit();
?>
