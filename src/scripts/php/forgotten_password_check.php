<?php 
    // Connect to database
    include("db_connect.php");

    // Save long string for shortening lines
    $signup_path = "location: ../../../signup.php?type=";
    $login_path  = "location: ../../../login.php?type=";
    $forgottenPassword_path = "location: ../../../forgotten_password.php?type=";
    $newPassword_path = "location: ../../../new_password.php";

    $email = $_POST["email"];

    if (isset($_POST["email"]))
    {
        setcookie
        (
            "email",              // Name
            $email,               // Value
            time() + 600,         // Expiration date
            "/KeyRace/signup.php" // Path
        );
    }
    
    if (empty($email))
    {
        header($forgottenPassword_path . "warning&message=Please fill all fields.");
        exit();
    }

    if (strlen($email) > 255)
    {
        $message = "Email must be less than 255 characters long.";
        header($forgottenPassword_path . "warning&message=$message");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header($forgottenPassword_path . "warning&message=Email has wrong format.");
        exit();
    }

    // Check if Email exists 
    $query = "SELECT * FROM USER WHERE email=:email;";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["email" => $email]);
    $result = $prepared_query->fetchAll();

    if (!isset($result) || empty($result))
    {
        header($signup_path . "warning&message=Email doesn't exist.");
        exit();
    }
    else
    {
        var_dump($email);
        include "forgotten_password_email.php";
    }

    ?>