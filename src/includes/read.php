<div class="container">
    <?php 
        include('C:\MAMP\htdocs\KeyRace\src\scripts\php\db_connect.php');
        $q = "SELECT user_id, username, email, password, keyboard, role, kc, gc, avatar, banner, car FROM USER WHERE user_id = $_GET[id]";
        $req = $db->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table table-striped table-bordered dark-theme">
        <tr>
            <?php 
                foreach ($results as $key => $user) {
                    echo "<th>" . $user['username'] . "</th>"; 
                }
            ?>
        </tr>

        <?php
            foreach ($results as $key => $user) {
                echo '<tr><td>user_id</td><td>' . $user['user_id'] . '</td></tr>';
                echo '<tr><td>email</td><td>' . $user['email'] . '</td></tr>';
                echo '<tr><td>password</td><td> °°°°°° </td></tr>';
                echo '<tr><td>keyboard</td><td>' . $user['keyboard'] . '</td></tr>';
                echo '<tr><td>role</td><td>' . $user['role'] . '</td></tr>';
                echo '<tr><td>kc</td><td>' . $user['kc'] . '</td></tr>';
                echo '<tr><td>gc</td><td>' . $user['gc'] . '</td></tr>';
                echo '<tr><td>avatar</td><td>' . $user['avatar'] . '</td></tr>';
                echo '<tr><td>banner</td><td>' . $user['banner'] . '</td></tr>';
                echo '<tr><td>car</td><td>' . $user['car'] . '</td></tr>';
            }
        ?>
    </table>
</div>
