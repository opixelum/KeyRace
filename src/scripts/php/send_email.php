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
    $mail->Username = "contact.keyrace@gmail.com";
    $mail->Password = "zA[pjx1ycvlfnoeznd(pr8edH";

    // Recipients
    $mail->setFrom("contact.keyrace@gmail.com");
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = "Confirmation email for KeyRace";
    $url = "http://localhost/KeyRace";
    $url .= "/src/scripts/php/confirm_email.php?ckey=$ckey";
    $mail->Body =
    "
        <a href='$url'>Click here</a> to confirm your email.
    ";
    // Plain text body for non-HTML client
    $mail->AltBody =
    "
        Go to following link to confirm your email: $url.
    ";


    // Send confirmation email
    if(!$mail->send())
    {
        $message = "Confirmation email couldn't be sent. Please try again later.";
        header("location: ../../../signup.php?type=alert&message=$message");
        exit();
    }

    $message = "Accout created successfully.Confirm your email address before logging in.";
    header("location: ../../../login.php?type=success&message=$message");
    exit();
?>
