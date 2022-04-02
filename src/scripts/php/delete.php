<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete an user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php

    if ($choice)
    {
        include('C:\MAMP\htdocs\KeyRace\src\scripts\php\db_connect.php');
        $q = "DELETE FROM USER WHERE user_id = $_GET[id]";
        $req = $db->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);

        header("location:../../../settings.php");
    }
    else
    {
        header("location:../../../settings.php");
    }
    
?>
