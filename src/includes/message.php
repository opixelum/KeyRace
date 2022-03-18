<?php
    if(isset($_GET["message"]) && !empty($_GET["message"]))
    {
        echo 
        "<div class='alert alert-" . htmlspecialchars($_GET["type"]) . 
        "' role='alert'>" . htmlspecialchars($_GET["message"]) .
        "</div>";
    }
?>
