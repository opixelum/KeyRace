<?php 
    // Connect to database
    try
    {
        $db = new PDO
        (
            "mysql:host=164.132.229.134;dbname=keyrace",
            "KRadministrator",
            "0qujwY9jjeumG",
        );

        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // If database connection failed, exit and log the error
    catch(Exception $error)
    {
        die("Error: " . $error->getMessage());
    }
?>
