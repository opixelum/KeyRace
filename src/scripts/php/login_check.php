<?php 
    session_start();

    $type =  "login";

    // Save long string for shortening lines
    $login_path = "location: ../../../login.php?type=";

    // Set cookie to prevent email rewriting
    if(isset($_POST["email"]))
    {
        setcookie
        (
            "email",             // Name
            $_POST["email"],     // Value
            time() + 600,        // Expiration date
            "/KeyRace/login.php" // Path
        );
    }

    // If user forgot to fill the password or the email / username
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
        header($login_path . "warning&message=You must fill in both fields");
        exit;
    }

    // Connect to database
    include("./db_connect.php");

    // Include $encrypted_password
    include("../../includes/salt.php");

    // Prepare query to check if user credentials are correct
    $query = "SELECT * FROM USER WHERE email=:email AND password=:password;";
    $prepared_query = $db->prepare($query);

    // Execute query with user credentials
    $prepared_query->execute
    ([
        "email" => $_POST["email"],
        "password" => $encrypted_password
    ]);

    // Get results
    $result = $prepared_query->fetchAll();

    // If credentials don't match
    if (!$result)
    {
        $status = "no match";
        include("../../includes/logs.php");
        header($login_path . "danger&message=Wrong email or password.");
        exit;
    }

    // Get solved captcha
    if (!$_COOKIE['captchaSolved'])
    {
        $message = "Please confirm the captcha";
        header($login_path . "danger&message=$message");
        exit();
    }

    // If credentilals match

    // Prepare query to check if user has confirmed his email 
    $query = "SELECT * FROM USER WHERE email=:email AND role!=0;";
    $prepared_query = $db->prepare($query);

    // Execute query with user credentials
    $prepared_query->execute(["email" => $_POST["email"]]);

    // Get results
    $result = $prepared_query->fetchAll();

    // If user hasn't confirmed his email
    if (!$result)
    {
        $status = "email not confirmed";
        include("../../includes/logs.php");
        header($login_path . "danger&message=Please confirm your email.");
        exit;
    }

    // If user has confirmed his email

    // Delete temporary cookie
    setcookie("email", '', 0, "/KeyRace/login.php");
    $_SESSION["email"] = $_POST["email"];
    $status = "success";
    include("../../includes/logs.php");
    header("location: ../../../index.php");
    exit;
?>
