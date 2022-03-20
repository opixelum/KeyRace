<?php 
    session_start();

    // Set cookie to prevent email rewriting
    if(isset($_POST["email"]))
    {
        setcookie("email", $_POST["email"], time() + 600, "/KeyRace/login.php");
    }

    // If user forgot to fill the password or the email / username
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
        header("location: ../../../login.php?type=warning&message=You must fill in both fields");
        exit;
    }

    // Connect to database
    include("./db_connect.php");

    // Include $encrypted_password
    include("../../includes/salt.php");

    // Prepare query to SELECT into the USER table in the database
    $query = "SELECT * FROM USER WHERE email = :email AND password = :password";
    $prepared_query = $db->prepare($query);

    // Execute query with user credentials
    $prepared_query->execute
    ([
        "email" => $_POST["email"],
        "password" => $encrypted_password
    ]);

    $result = $prepared_query->fetchAll();

    // If credentials don't match
    if(!$result)
    {
        header("location:../../../login.php?type=danger&message=Incorrect identifiers");
        exit;
    }

    // If credentilals match

    // Delete temporary cookie
    setcookie("email", '', 0, "/KeyRace/login.php");

    $_SESSION["email"] = $_POST["email"];
    header("location: ../../../index.php");
    exit;
?>
