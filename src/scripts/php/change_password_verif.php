<?php
    include("db_connect.php");  

    $newPassword_path = "location: ../../../new_password.php?type=";

    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmedPassword = $_POST["confirmedPassword"];

    if (empty($password) && empty($confirmedPassword))
    {
        header($newPassword_path . "warning&message=Please fill all fields.");
        exit();
    }

    if (strlen($password) > 255)
    {
        $message = "Password must be less than 255 characters long.";
        header($newPassword_path . "warning&message=$message");
        exit();
    }

    if($password != $confirmedPassword){
        $message = "Both fields must be the same.";
        header($newPassword_path . "warning&message=$message");
        exit();
    }

    $salt = "5gd87sf^h6?jytr98b!'d4qsvzy;e1sfdf3gh'4zet9qsdt16f'4ar9jbhl67ivl";
    $encrypted_password = hash("sha512", $salt . $_POST["password"]);

    $sql = "UPDATE users SET password = $encrypted_password WHERE email = $email";
    $statement = $db->prepare($sql);
    $statement->execute([$token, $_POST['email']]);
    echo "Votre mot de passe a été modifié";
?>
