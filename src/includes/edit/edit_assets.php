<?php
    include('src/scripts/php/db_connect.php');
    $q = "SELECT helmet, visor, vest, background, car, banner FROM ASSETS WHERE user_id = $_GET[id]";
    $req = $db->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="d-flex flex-column justify-content-center align-items-center">
    <h1>Assets</h1>
</div>
<form method="post" action="src/scripts/php/update.php?id='<?php echo $_GET['id'] ?>'">
<table class="table table-bordered">
    <?php
    echo '<tr>
            <td class="text-center">Helmet</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="helmet" type="text" value="' . $results[0]['helmet'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Visor</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="visor" type="text" value="' . $results[0]['visor'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Vest</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="vest" type="text" value="' . $results[0]['vest'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Background</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="background" type="text" value="' . $results[0]['background'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Car</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="car" type="text" value="' . $results[0]['car'] . '">
            </td>
            </tr>';
    echo '<tr>
            <td class="text-center">Banner</td>
            <td class="text-center">
                <input class="input-field border-0 px-3 py-2 rounded" name="banner" type="text" value="' . $results[0]['banner'] . '">
            </td>
            </tr>';
    ?>
</table>
