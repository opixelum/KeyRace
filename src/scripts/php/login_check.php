<?php
    // Cookie for save last username / email used
    if(isset($_POST['email']))
    {
        setcookie('cookie-email', $_POST["email"], time() + 365*24*3600);
    }

    // If user forgot to fill the password or the email / username
    if(empty($_POST['email']) || empty($_POST['password']))
    {
        header('location:../../../login.php?type=warning&message=You must fill in both fields');
        exit;
    }

    // Connect to database
    include('./db_connect.php');

    // Include $encrypted_password
    include('../../includes/salt.php');

    // Prepare query to SELECT into the USER table in the database [-! ERROR !-]
    $query = 'SELECT * FROM USER WHERE email = :email AND password = :password ';
    $prepared_query = $db->prepare($query);

    // Execute query with user credentials
    $prepared_query->execute
    ([
        'email' => $_POST['email'],
        'password' => $encrypted_password
    ]);

    $result = $prepared_query->fetchAll();

    // Not finished
    if(!$result)
    {
        header('location:../../../login.php?type=danger&message=Incorrect identifiers');
        exit;
    }

    header('location: ../../../index.php');
    exit;
?>
