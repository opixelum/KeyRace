<h1 class='text-center w-100 my-3'>Campaign</h1>
<h3 class='text-center w-100 my-3'>
    Prove that you're the fastest racer in KeyTown!
</h3>
<div class='btn-group-vertical w-25'>

<?php
    // Get user's max quest
    $query = "SELECT quest FROM STATS WHERE user_id=:id";
    $prepared_query = $db->prepare($query);
    $prepared_query->execute(["id" => $_SESSION["id"]]);
    $result = $prepared_query->fetchAll();
    $quest = $result[0]["quest"];

    // Buttons for each quest
    for ($i = 1; $i <= 8; $i++)
    {
        echo "<button id='quest${i}-btn' type='button' class='btn ";
        echo ($i > $quest + 1 ? " disabled" : '');
        echo "'>Quest ${i}</button>";
    }

    echo
    "
        </div>
        <script src='src/scripts/js/campaign_menu.js'></script>
    ";
?>
