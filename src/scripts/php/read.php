<div class="container">
    <?php 
        include('C:\MAMP\htdocs\KeyRace\src\scripts\php\db_connect.php');
        $q = 'SELECT user_id, username, email, password, keyboard, role, kc, gc, average_wpm, highest_wpm, game_played, 
        time_played, quest_level, achievements, avatar, banner, car FROM USER';
        $req = $db->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table table-striped table-bordered dark-theme">
        <tr>
            USER
        </tr>

        <?php
            foreach ($results as $key => $user) {
                echo '<tr><td>user_id</td><td>' . $user['user_id'] . '</td></tr>';
                echo '<tr><td>email</td><td>' . $user['email'] . '</td></tr>';
                echo '<tr><td>password</td><td>' . $user['password'] . '</td></tr>';
                echo '<tr><td>keyboard</td><td>' . $user['keyboard'] . '</td></tr>';
                echo '<tr><td>role</td><td>' . $user['role'] . '</td></tr>';
                echo '<tr><td>kc</td><td>' . $user['kc'] . '</td></tr>';
                echo '<tr><td>gc</td><td>' . $user['gc'] . '</td></tr>';
                echo '<tr><td>average-wpm</td><td>' . $user['average_wpm'] . '</td></tr>';
                echo '<tr><td>highest_wpm</td><td>' . $user['highest_wpm'] . '</td></tr>';
                echo '<tr><td>game_played</td><td>' . $user['game_played'] . '</td></tr>';
                echo '<tr><td>time_played</td><td>' . $user['time_played'] . '</td></tr>';
                echo '<tr><td>quest_level</td><td>' . $user['quest_level'] . '</td></tr>';
                echo '<tr><td>achievements</td><td>' . $user['achievements'] . '</td></tr>';
                echo '<tr><td>avatar</td><td>' . $user['avatar'] . '</td></tr>';
                echo '<tr><td>banner</td><td>' . $user['banner'] . '</td></tr>';
                echo '<tr><td>car</td><td>' . $user['car'] . '</td></tr>';
            }
        ?>
    </table>
</div>
