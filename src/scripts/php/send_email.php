<?php
    // Import PHPMailer classes into the global namespace
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
        $phpmailer->SMTPDebug = SMTP::DEBUG_SERVER;
        $phpmailer->isSMTP();
        
        // Enable SMTP authentication
        $phpmailer->SMTPAuth = true;

        // TLS encryption
        $phpmailer->SMTPSecure = "tls";

        // TCP port to connect to
        $phpmailer->Port = 587;

        // SMTP host
        $phpmailer->Host = "smtp.gmail.com";

        // SMTP credentials
        $phpmailer->Username = 'keyrace.contact@gmail.com';
        $phpmailer->Password = ',N9!hQWx3X%79dc';


        // Recipients
        $phpmailer->setFrom('keyrace.contact@gmail.com');
        $phpmailer->addAddress($email);


        // Content
        $phpmailer->isHTML(true);
        $phpmailer->Subject = "Confirmation email for KeyRace";

        $url = "http://localhost/KeyRace";
        $url .= "/src/scripts/php/confirm_email.php?ckey=$ckey";

        // HTML message body
        $phpmailer->Body =
        "
            <a href='$url'>Click here</a> to confirm your email.
        ";

        // Plain text body for non-HTML client
        $phpmailer->AltBody =
        "
            Go to following link to confirm your email: $url.
        ";


        // Send confirmation email
        $phpmailer->send();
    }
    catch (Exception $error)
    {
        echo $error;
        $message = "An error occured. Please try again.";
        header("location: ../../../signup.php?type=alert&message=$message");
    }
?>
