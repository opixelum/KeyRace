<?php
    switch ($type)
    {
        case "login":
            $file = fopen("/home/opixelum/Code/KeyRace/logs/login_attempts.csv", "a");
            $line = $_POST["email"] . ',' . date("Y-m-d H:i:s") . ',' . $status . "\n";
            fwrite($file, $line);

        case "page":
            $file = fopen("/home/opixelum/Code/KeyRace/logs/page_visits.csv", "a");
            $line = $_POST["email"] . ',' . date("Y-m-d H:i:s") . ',' . $page . "\n";
            fwrite($file, $line);
    }
?>
