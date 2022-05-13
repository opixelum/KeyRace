<?php 
    // Connect to database
    include("./db_connect.php");

    // Save long string for shortening lines
    $signup_path = "location: ../../../signup.php?type=";
    $login_path  = "location: ../../../login.php?type=";

    // Store user credentials in variables
    $username         = $_POST["username"];
    $email            = $_POST["email"];
    $password         = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $keyboard_layout  = $_POST["keyboard-layout"];



    // **************************** C O O K I E S *****************************

    // Set temporary cookies to prevent credentials rewriting

    if (isset($_POST["username"]))
    {
        setcookie
        (
            "username",           // Name
            $username,            // Value
            time() + 600,         // Expiration date
            "/KeyRace/signup.php" // Path
        );
    }

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

    if (isset($_POST["keyboard-layout"]))
    {
        setcookie
        (
            "keyboard_layout",    // Name
            $keyboard_layout,     // Value
            time() + 600,         // Expiration date
            "/KeyRace/signup.php" // Path
        );
    }


    // *************** F I E L D S   V E R I F I C A T I O N S ****************

    // If an error is caught, redirect to signup page with the error message 

    // If at least one field is empty
    if (empty($username) || empty($email) || empty($password) ||
    empty($confirm_password) || empty($keyboard_layout))
    {
        header($signup_path . "warning&message=Please fill all fields.");
        exit();
    }

    // If username not long enough 
    if (strlen($username) < 3)
    {
        $message = "Username must be more than 3 characters long.";
        header($signup_path . "warning&message=$message");
        exit();
    }

    // If username is too long
    if (strlen($username) > 45)
    {
        $message = "Username must be less than 45 characters long.";
        header($signup_path . "warning&message=$message");
        exit();
    }

    // If email is too long
    if (strlen($email) > 255)
    {
        $message = "Email must be less than 255 characters long.";
        header($signup_path . "warning&message=$message");
        exit();
    }

    // If email has wrong format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header($signup_path . "warning&message=Email has wrong format.");
        exit();
    }

    // If email is already registered
    $query = "SELECT * FROM USER WHERE email=:email;";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["email" => $email]);
    $result = $prepared_query->fetchAll();

    if ($result)
    {
        header($signup_path . "warning&message=Email is already used.");
        exit();
    }

    // If username is already registered
    $query = "SELECT * FROM USER WHERE username=:username;";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["username" => $username]);
    $result = $prepared_query->fetchAll();

    if ($result)
    {
        header($signup_path . "warning&message=Username is already used.");
        exit();
    }

    // Store booleans for each requirement
    $uppercase = preg_match("@[A-Z]@", $password);
    $lowercase = preg_match("@[a-z]@", $password);
    $number    = preg_match("@[0-9]@", $password);
    $symbols   = preg_match("@[\W]+@" , $password);
    $length    = strlen($password) >= 8;

    // If password doesn't meet requirements
    if (!($length))
    {
        $message = "Password must be more than 8 characters long.";
        header($signup_path . "warning&message=$message");
        exit();
    }
    else if (!($uppercase))
    {
        $message = "Password must contain at least one uppercase letter.";
        header($signup_path . "warning&message=$message");
        exit();
    }
    else if (!($lowercase))
    {
        $message = "Password must contain at least one lowercase letter.";
        header($signup_path . "warning&message=$message");
        exit();
    }
    else if (!($number))
    {
        $message = "Password must contain at least one number.";
        header($signup_path . "warning&message=$message");
        exit();
    }
    else if (!($symbols))
    {
        $message = "Password must contain at least one symbol.";
        header($signup_path . "warning&message=$message");
        exit();
    }

    // If confirm_password is different than password
    if ($confirm_password != $password)
    {
        $message = "Confirm password is different.";
        header($signup_path . "warning&message=$message");
        exit();
    }

    // Get solved captcha
    if (!$_COOKIE['captchaSolved'])
    {
        $message = "Please confirm the captcha";
        header($signup_path . "danger&message=$message");
        exit();
    }


    // ********************* A D D   U S E R   T O   D B **********************
    
    // Encrypt password
    include("../../includes/salt.php");

    // Generate confirmation key for email confirmation
    $ckey = md5($email);

    // Prepare query to insert into the USER table in the database
    $query = 
    "
        INSERT INTO USER (username, email, password, keyboard, ckey) 
        VALUES (:username, :email, :password, :keyboard, :ckey);
    ";
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

    // If query failed, redirect to signup page with error message
    if (!$result)
    {
        header($signup_path . "alert&message=An error occured. Please try again.");
        exit();
    }

    // Get user id from USER table
    $query = 'SELECT id FROM USER WHERE email = :email';
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["email" => $email]);
    $result = $prepared_query->fetchAll();

    // If query failed, redirect to signup page with error message
    if (!$result) {
        header($signup_path . "alert&message=An error occured. Please try again.");
        exit();
    }

    $id = $result[0]["id"];

    // Insert user id into STATS table
    $query = "INSERT INTO STATS(user_id) VALUES(:id)";
    $prepared_query = $db->prepare($query);
    $result = $prepared_query->execute(["id" => $id]);

    // If query failed, redirect to signup page with error message
    if (!$result)
    {
        header($signup_path . "alert&message=An error occured. Please try again.");
        exit();
    }

    // Insert user id into ASSETS table
    $query = "INSERT INTO ASSETS(user_id) VALUES(:id)";
    $prepared_query = $db->prepare($query);
    $result = $prepared_query->execute(["id" => $id]);

    // If query failed, redirect to signup page with error message
    if (!$result)
    {
        header($signup_path . "alert&message=An error occured. Please try again.");
        exit();
    }

    // Send confirmation email
    include("./send_email.php");

    // Delete temporary cookies
    setcookie("username", '', 0, "/KeyRace/signup.php");
    setcookie("email", '', 0, "/KeyRace/signup.php");
    setcookie("keyboard_layout", '', 0, "/KeyRace/signup.php");
    setcookie("captchaSolved", '', 0, "/KeyRace");

    $message = "Accout created successfully.";
    $message .= "Confirm your email address before logging in.";
    header($login_path . "success&message=$message");
    exit();

?>
