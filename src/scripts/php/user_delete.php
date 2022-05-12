<?php
    session_start();  
    include('db_connect.php');
    $q = "DELETE FROM USER WHERE id = $_SESSION[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    header("location:../../../index.php");

    session_destroy();
    
?>
