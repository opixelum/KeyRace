<!DOCTYPE html>
<html lang="en">
<?php
      $page = "forgotten password";
      $title = "Forgotten password | KeyRace";
      include('src/includes/head.php')
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

if(isset($_POST['email'])){


    $token = uniqid();
    $url = "http://localhost/KeyRace/src/token?token=$token.php";

    $message = "Bonjour, voici votre lien pour la réinitialisation du mot de passe : $url";
    $headers ='Content-Type: text/plain; charset="utf-8"'." ";


    if(mail($_POST['email'], 'Mot de passe oublié', $message, $headers)){

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
