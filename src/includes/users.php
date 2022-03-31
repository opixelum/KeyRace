<div class="container">
    <?php 
        include('src\scripts\php\db_connect.php');
        $q = 'SELECT user_id, username, email FROM USER';
        $req = $db->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
            foreach ($results as $key => $user) {
                echo '<tr>';
                echo '<td>' . $user['username'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td class="text-nowrap">';
                echo '<a class="btn btn-primary btn-sm me-2 col-4" 
                href="http://localhost/KeyRace/src/includes/read.php?id=' . $user['user_id'] . '">See</a>';
                echo '<a class="btn btn-success btn-sm me-2 col-4" href="update.php?id=' . $user['user_id'] . '">Modify</a>';
                echo '<a class="btn btn-danger btn-sm me-2 col-4" href="delete.php?id=' . $user['user_id'] . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>
