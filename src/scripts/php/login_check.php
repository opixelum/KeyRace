<?php 
    session_start();

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
        header($login_path . "danger&message=Wrong email or password.");
        exit;
    }

    // If credentilals match

    // Prepare query to check if user has confirmed his email 
    $query = "SELECT id FROM USER WHERE email=:email AND role!=0;";
    $prepared_query = $db->prepare($query);

    // Execute query with user credentials
    $prepared_query->execute(["email" => $_POST["email"]]);

    // Get results
    $result = $prepared_query->fetchAll();

    // If user hasn't confirmed his email
    if (!$result)
    {
        header($login_path . "danger&message=Please confirm your email.");
        exit;
    }

    // If user has confirmed his email

    // Delete temporary cookie
    setcookie("email", '', 0, "/KeyRace/login.php");

    $_SESSION["id"] = $result[0]["id"];
    $_SESSION["email"] = $_POST["email"];
    header("location: ../../../index.php");
    exit;
?>
