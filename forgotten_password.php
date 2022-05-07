
<!DOCTYPE html>
<html lang="en">
<?php

use PHPMailer\PHPMailer\PHPMailer;

      $page = "forgotten password";
      $title = "Forgotten password | KeyRace";
      include('src/includes/head.php');
  ?>

<?php

include("src\scripts\php\db_connect.php");


?>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site web</title>
  </head>
  <body>
    <h2>Forgot password</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
        <button type="submit">Send me a token</button>
      </div>
    </form>
  </body>
</html>



<?php



    require_once "src/includes/phpmailer/Exception.php"; 
    require_once "src/includes/phpmailer/SMTP.php";
    require_once "src/includes/phpmailer/PHPMailer.php";  
    
    $mail = new PHPMailer();




      $mail->SMTPDebug = 1;

      $mail->isSMTP();

      $mail->Host = "smtp.gmail.com";

      $mail->SMTPAuth = true;

      $mail->SMTPSecure = 'ssl';

      $mail->Host = "smtp.gmail.com";

      $mail->Port = 465;


      $mail->Username = "noreply.keyrace@gmail.com";
      $mail->Password = "1|_aXutestrctrtgnfgbcmxuE";

      $mail->isHTML(true);
      $mail->Subject = "Confirmation email for KeyRace";
      $url = "https://keyrace.online";


      $mail->setFrom("noreply.keyrace@gmail.com");
      $mail->addAddress("saygel93400@gmail.com");

      $mail->Body =
      "
          <a href='$url'>Click here</a> to confirm your email.
      ";
      // Plain text body for non-HTML client
      $mail->AltBody =
      "
          Go to following link to confirm your email: $url.
      ";
  

      if(!$mail->send())
      {
          $message = "Confirmation email couldn't be sent. Please try again later.";

          echo "Erreur";
          exit;

      }
  
      // If email has been sent
      $message = "Almost done! Confirm your email before logging in ";
      $message .= "(if you don't see it in your inbox, check your spams).";
      
      echo "Email envoyé";





?>
