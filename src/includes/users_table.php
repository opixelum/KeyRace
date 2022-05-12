<?php 

include('../scripts/php/db_connect.php');
$q = 'SELECT id, username, email, role FROM USER';
$params = [];
$search = isset($_GET['search']) ? $_GET['search'] : NULL;
if ($search)
{
    $q .= ' WHERE username LIKE ? OR email LIKE ?';
    $params[] = "$search%";
    $params[] = "$search%";
}
$prepared_query = $db->prepare($q);
$prepared_query->execute($params);
$results = $prepared_query->fetchAll(PDO::FETCH_ASSOC);

echo '  <table id="users" class="table table-bordered w-100 h-25 m-2">
        <tr>
            <th class="text-center">Username</th>
            <th class="text-center">Email</th>
            <th class="text-center">Role</th>
            <th class="text-center">Actions</th>
        </tr>
    ';

        foreach ($results as $key => $user) {
            echo '<tr>';
                echo '<td class="text-center">' . $user['username'] . '</td>';
                echo '<td class="text-center">' . $user['email'] . '</td>';
                echo '<td class="text-center">' . $user['role'] . '</td>';
                echo '<td class="text-nowrap">';
                    echo '<a class="btn btn-primary btn-sm m-2 col-5" href="edit.php?id=' . $user['id'] . '">Edit</a>';
                    echo '<a id="delete-btn" class="btn btn-danger btn-sm m-2 col-5">Delete</a>';
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
?>
