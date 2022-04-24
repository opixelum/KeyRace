<?php
    
    include('db_connect.php');
    $q = "DELETE FROM USER WHERE id = $_GET[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    header("location:../../../settings.php");
    
?>
