
<!DOCTYPE html>
<html lang="en">
<?php



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

    use PHPMailer\PHPMailer\PHPMailer;  

      require_once "src/includes/phpmailer/Exception.php"; 
      require_once "src/includes/phpmailer/SMTP.php";
      require_once "src/includes/phpmailer/PHPMailer.php";  

     $mail = new PHPMailer(true);

     $mail->isSMTP();
     $mail->SMTPDebug = 1;
     $mail->SMTPAuth = true;
     $mail->SMTPSecure = 'ssl';
     $mail->Host = "smtp.gmail.com";
     $mail->Port = 465;
     $mail->CharSet = "utf-8";

     $mail->Username = "noreply.keyrace@gmail.com";
     $mail->Password = "1|_aXutestrctrtgnfgbcmxuE";

     $token = uniqid();
     $url = "http://localhost/KeyRace/src/token?token=$token.php";
 
     $message = "Bonjour, voici votre lien pour la réinitialisation du mot de passe : $url";
     $message = wordwrap($message,70, "\r\n");
     $headers = [
       "From" => "keyrace@game.fr",
       "Reply-To" => "adresse@site.fr",
       "Cc" => "copie@site.fr",
       "Bcc" => "copieCachée@site.fr",
       "Content-Type" => "text/html; charset=utf-8"
     ];
     $to = $_POST['email'];
     $subject =  'Mot de passe oublié';

     $mail->setFrom("noreply.keyrace@gmail.com");
     $mail->addAddress($to);
     $mail->isHTML(true);
     $mail->Subject = "Forgotten Password";

     $mail->Body =
     "
         <a href='$url'>Click here</a> to change you password.
     ";

     $mail->AltBody =
     "
         Go to following link to change your password: $url.
     ";
 
     













if(isset($_POST['email'])){





    if(mail($to,$subject, $message, $headers)){

        $sql = "UPDATE users SET token = ? WHERE email = ?";
        $statement = $db->prepare($sql);
        $statement->execute([$token, $_POST['email']]);
        echo "Mail envoyé ";
    }
    else{

        echo "Une erreur est survenue...";
    }
 
}

?>
