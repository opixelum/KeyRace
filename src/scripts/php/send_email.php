<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require "../../../vendor/autoload.php";

    // Create an instance; passing `true` enables exceptions
    $phpmailer = new PHPMailer();

    try
    {
        // Send using SMTP
        $phpmailer->isSMTP();

        // Set the SMTP server to send through
        $phpmailer->Host = 'smtp.mailtrap.io';
        
        // Enable SMTP authentication
        $phpmailer->SMTPAuth = true;

        // TCP port to connect to;
        $phpmailer->Port = 2525;

        // SMTP credentials
        $phpmailer->Username = 'f118b92fb4780b';
        $phpmailer->Password = '4543328055deb5';


        // Recipients
        $phpmailer->setFrom('109dc5acb1-72b062@inbox.mailtrap.io');
        $phpmailer->addAddress($email);

        // Content
        $phpmailer->Subject = 'Confirmation email for KeyRace';
        $phpmailer->Body = "Please click on the following link in order to confirm your email:";
        $phpmailer->Body .= "http://localhost/KeyRace/src/scripts/php/confirm_email.php?ckey=$ckey";

        $phpmailer->send();
    }
    catch (Exception $e)
    {
        header("location: ../../../signup.php?type=alert&message=An error occured. Please try again.");
    }
?>