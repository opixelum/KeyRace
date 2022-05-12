<?php
    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;

    // Load Composer's autoloader
    require "../../../vendor/autoload.php";

    $mail = new PHPMailer(); // create a new object

    // SMTP server configuration
    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;

    // KeyRace's Google account credentials
    $mail->Username = "noreply.keyrace@gmail.com";
    $mail->Password = "1|_aXutestrctrtgnfgbcmxuE";

    // Recipients
    $mail->setFrom("noreply.keyrace@gmail.com");
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = "Confirmation email for KeyRace";
    $url = "https://keyrace.online";
    $url .= "/src/scripts/php/confirm_email.php?ckey=$ckey";
    $mail->Body =
    "
        <head><meta charset='UTF-8'></head>
        <body>
            <h1>Hi ! Welcome to KeyRace ! </h1>
            <h2>Thank you for joining the KeyRace adventure.</h2>
            <h2>You just have to confirm your email and you will be able to connect!</h2>
            <a href='$url'>Click here</a> to confirm your email.
            <br>
            <h2>This email is an automated message, please do not reply.</h2>
            <h3>You can reach us at keyrace.contact@gmail.com</h3>
            <p>KeyRace 2022></p>
        </body>
    ";
    // Plain text body for non-HTML client
    $mail->AltBody =
    "
        Go to following link to confirm your email: $url.
    ";

    // Send confirmation email
    // If email couldn't be sent
    if(!$mail->send())
    {
        $message = "Confirmation email couldn't be sent. Please try again later.";
        header("location: ../../../signup.php?type=alert&message=$message");
        exit();
    }

    // If email has been sent
    $message = "Almost done! Confirm your email before logging in ";
    $message .= "(if you don't see it in your inbox, check your spams).";
    header("location: ../../../login.php?type=success&message=$message");
    exit();
?>
