<?php

include '../scripts/php/db_connect.php';




if(isset($_GET['token']) &&  $_GET['token'] != '')
{
    $statement = $db->prepare('SELECT email FROM users WHERE token = ?');
    $statement->execute([$_GET['token']]);
    $email = $statement->fetchColumn();


    if($email)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Récuperation de mot de passe</title>
        </head>
        <body>
            <form method="post">
                <label for="newPassword">Nouveau mot de Passe</label>
                <input type="password" name="newPassword">
                <input type="submit" value="Confirmer">
            </form>
            
        </body>
        </html>
        <?php
    }
}

    if(isset ($_POST['newPassword']))
        {
            $hashedpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = ? WHERE email = ?";
            $statement = $db->prepare($sql);
            $statement->execute([$hashedPassword, $_POST['email']]);   
            echo "Mot de passe modifié avec succès !"; 
        }
