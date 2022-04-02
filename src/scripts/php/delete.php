<?php
    
    include('C:\MAMP\htdocs\KeyRace\src\scripts\php\db_connect.php');
    $q = "DELETE FROM USER WHERE user_id = $_GET[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    header("location:../../../settings.php");
    
?>
