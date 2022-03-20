<?php
    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
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
        $phpmailer->Host = 'smtp.gmail.com';
        
        // Enable SMTP authentication
        $phpmailer->SMTPAuth = true;

        // TCP port to connect to;
        $phpmailer->Port = 465;

        // SMTP credentials
        $phpmailer->Username = 'Key Race';
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
