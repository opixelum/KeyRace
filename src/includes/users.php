<?php 
    include('src/scripts/php/db_connect.php');
    $q = 'SELECT id, username, email, role FROM USER';
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

        echo `
                <table class="table table-bordered overflow-auto h-75">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
            `;
            foreach ($results as $key => $user) {
                echo '<tr>';
                echo '<td>' . $user['username'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>' . $user['role'] . '</td>';
                echo '<td class="text-nowrap">';
                echo '<a class="btn btn-primary btn-sm me-2 col-6" href="edit.php?id=' . $user['id'] . '">Edit</a>';
                echo '<a id="delete-Btn" class="btn btn-danger btn-sm me-2 col-6" href="./src/scripts/php/delete.php?id=' . $user['id'] . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
        echo '</table>';
?>
