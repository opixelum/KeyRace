<?php
include('src/scripts/php/db_connect.php');
$q = "SELECT id, username, email, password, keyboard, role FROM USER WHERE id = $_GET[id]";
$req = $db->query($q);
$results = $req->fetchAll(PDO::FETCH_ASSOC);
?> 
<div class="d-flex flex-column justify-content-center align-items-center">
<h1>User</h1>
</div>
<form method="post" action="src/scripts/php/update.php?id='<?php echo $results[0]['id'] ?>'">
<table class="table table-bordered">
    <?php
    echo '<tr>
            <td class="text-center">Id</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="id" type="number" value="' . $results[0]['id'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Username</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="username" type="text" value="' . $results[0]['username'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Email</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="email" type="text" value="' . $results[0]['email'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Password</td>
            <td class="text-center"> °°°°°° </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Keyboard</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="keyboard" type="number" value="' . $results[0]['keyboard'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Role</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="role" type="number" value="' . $results[0]['role'] . '">
            </td>
            </tr>';
    ?>
</table>
