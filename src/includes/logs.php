<?php
    switch ($type)
    {
        case "login":
            $file = fopen("../../../logs/login_attempts.csv", "a");
            $line = $_POST["email"] . ',' . date("Y-m-d H:i:s") . ',' . $status . "\n";
            fwrite($file, $line);
            fclose($file);
            break;

        case "page":
            $file = fopen("logs/page_visits.csv", "a");
            $line = (isset($_SESSION["email"]) ? $_SESSION["email"] : "guest") . ',' . date("Y-m-d H:i:s") . ',' . $page ."\n";
            fwrite($file, $line);
            fclose($file);
            break;
    }
?>
