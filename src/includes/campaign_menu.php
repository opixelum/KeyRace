<h1 class='text-center w-100 my-3'>Campaign</h1>
<h3 class='text-center w-100 my-3'>
    Prove that you're the fastest racer in KeyTown!
</h3>
<div class='btn-group-vertical w-25'>

<?php
    // Buttons for each quest
    for ($i = 1; $i <= 8; $i++)
    {
        // TODO: Put ternary for "disabled" class
        echo "<button id='quest${i}-btn' type='button' class='btn'>Quest ${i}</button>";
    }

    echo
    "
        </div>
        <script src='src/scripts/js/campaign_menu.js'></script>
    ";
