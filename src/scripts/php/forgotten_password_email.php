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
    $mail->Subject = "Change password for KeyRace";
    $url = "localhost/keyrace/new_password.php";
    $mail->Body =
    "
        <a href='$url'>Click here</a> to change your password.
    ";
    // Plain text body for non-HTML client
    $mail->AltBody =
    "
        Go to following link to change your password: $url.
    ";

    // Send confirmation email
    // If email couldn't be sent
    if(!$mail->send())
    {
        $message = "Email couldn't  be sent, please try again later.";
        header("location: ../../../signup.php?type=alert&message=$message");
        exit();
    }

    // If email has been sent
    $message = "Email sent";
    $message .= "(if you don't see it in your inbox, check your spams).";
    header("location: ../../../login.php?type=success&message=$message");
    exit();
?>
