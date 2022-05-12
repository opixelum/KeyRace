<?php
    session_start();
    echo $_SESSION["id"];

    include("db_connect.php");

    // Save the path
    $read_path = "location: ../../../settings.php?type=danger&message=";

    $q = "SELECT * FROM USER WHERE id = $_SESSION[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    if (!filter_var($_POST['new-email'], FILTER_VALIDATE_EMAIL))
    {
        header($read_path . "email needs to be an email.");
        exit;
    }

    // Include $encrypted_password
    include("../../includes/salt.php");

    if ($encrypted_password != $results[0]['password'])
    {
        header($read_path . "password is incorrect.");
        exit;
    }

    if (empty($_POST['new-password']))
    {
        // Update the user informations
        $query = "UPDATE USER SET username=:username, email=:email WHERE id=$_SESSION[id]";
        $prepared_query = $db->prepare($query);
        $prepared_query->execute(["username" => $_POST['new-username'],
                                "email" => $_POST['new-email']]);
        $result = $prepared_query->fetchAll();

        header("location:../../../settings.php");

        exit;
    }


    // Update the user informations
    $query = "UPDATE USER SET username=:username, email=:email, password=:password WHERE id=$_SESSION[id]";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["username" => $_POST['new-username'],
                            "email" => $_POST['new-email'],
                            "password" => $_POST['new-password']]);
    $result = $prepared_query->fetchAll();

    header("location:../../../settings.php");

    exit;
?>
