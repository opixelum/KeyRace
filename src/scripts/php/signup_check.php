<?php 
    // Store user credentials in variables
    $username         = $_POST["username"];
    $email            = $_POST["email"];
    $password         = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $keyboard_layout  = $_POST["keyboard-layout"];

    // **************************** C O O K I E S ****************************

    if(isset($_POST['username']))
    {
        setcookie('username_cookie', $_POST["username"], time() + 1800);
    }

    if(isset($_POST['email']))
    {
        setcookie('email_cookie', $_POST["email"], time() + 1800);
    }


    // *************** F I E L D S   V E R I F I C A T I O N S ****************

    // If an error is caught, redirect to signup page with the error message 

    // If at least one field is empty
    if (empty($username) || empty($email) || empty($password) ||
    empty($confirm_password) || empty($keyboard_layout))
    {
        header("location: ../../../signup.php?type=warning&message=Please fill all fields.");
        exit();
    }

    // If username not enough long
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


    // Connect to database
    include("./db_connect.php");


    // Prepare query to insert into the USER table in the database
    $query = "INSERT INTO USER (username, email, password, keyboard) VALUES (:username, :email, :password, :keyboard);";
    $prepared_query = $db->prepare($query);

    // Execute query with user credentials
    $result = $prepared_query->execute
    ([
        "username" => $username, 
        "email"    => $email,
        "password" => $encrypted_password,
        "keyboard" => $keyboard_layout
    ]);


    // If query was successful
    if ($result)
    {
        header("location: ../../../login.php?type=success&message=Accout created. Verify your email address before login in.");
        exit();
    }

    // If query failed
    header("location: ../../../signup.php?type=alert&message=An error occured. Please try again.");
    exit();

?>
