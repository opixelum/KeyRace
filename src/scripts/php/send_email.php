<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try
    {
        // Enable verbose debug output
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;   

        // Send using SMTP
        $mail->isSMTP();

        // Set the SMTP server to send through
        $mail->Host = 'smtp.mailtrap.io';
        
        // Enable SMTP authentication
        $mail->SMTPAuth = true;

        // SMTP credentials
        $mail->Username = 'f118b92fb4780b';
        $mail->Password = '4543328055deb5';

        // Enable implicit TLS encryption
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        // TCP port to connect to;
        $mail->Port = 2525;

        // Recipients
        $mail->setFrom('109dc5acb1-72b062@inbox.mailtrap.io');
        $mail->addAddress($email);

        // Content
        $mail->Subject = 'Confirmation email for KeyRace';
        $mail->Body = "Please click on the following link in order to confirm your email:";
        $mail->Body .= "http://localhost/KeyRace/src/scripts/php/confirm_email.php?ckey=$ckey";

        $mail->send();
        echo 'Message has been sent';
    }
    catch (Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>