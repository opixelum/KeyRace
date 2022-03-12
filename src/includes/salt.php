<?php
    $salt = "5gd87sf^h6?jytr98b!'d4qsvzy;e1sfdf3gh'4zet9qsdt16f'4ar9jbhl67ivl";
    $encrypted_password = hash("sha512", $salt . $_POST["password"]);
?>
