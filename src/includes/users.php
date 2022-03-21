<div class="container">
    <?php 
        include('../scripts/php/db_connect.php'); 
        $q = 'SELECT user_id, username, email FROM USERS';
        $req = $bdd->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
            foreach ($results as $key => $user) {
                echo '<tr>';
                echo '<td>' . $user['image'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>';
                echo '<a class="btn btn-primary btn-sm me-2" href="read.php?id=' . $user['id'] . '">Consulter</a>';
                echo '<a class="btn btn-success btn-sm me-2" href="update.php?id=' . $user['id'] . '">Modifier</a>';
                echo '<a class="btn btn-danger btn-sm me-2" href="delete.php?id=' . $user['id'] . '">Supprimer</a>';
                echo '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>
