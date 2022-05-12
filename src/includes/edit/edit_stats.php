<?php
    include('src/scripts/php/db_connect.php');

    $q = "SELECT highest_wpm, races_ran, races_won, quest, achievements, time_played FROM STATS WHERE user_id = $_GET[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);
?> 
<div class="d-flex flex-column justify-content-center align-items-center">
    <h1>Stats</h1>
</div>
<form method="post" action="src/scripts/php/update.php?id='<?php echo $_GET['id'] ?>'">
<table class="table table-bordered">
    <?php
    echo '<tr>
            <td class="text-center">Highest_wpm</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="highest_wpm" type="number" step="0.1" value="' . $results[0]['highest_wpm'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Races_ran</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="races_ran" type="number" value="' . $results[0]['races_ran'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Races_won</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="races_won" type="number" value="' . $results[0]['races_won'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Quest</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="quest" type="number" value="' . $results[0]['quest'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Achievements</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="achievements" type="number" value="' . $results[0]['achievements'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Time_played</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="time_played" type="number" step="0.1" value="' . $results[0]['time_played'] . '">
            </td>
            </tr>';
    ?>
</table>
