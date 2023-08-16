<?php
require '../Configuration/connectionConf.php';
require '../vendor/autoload.php';
if (isset($_POST["subFormQuestionnaire"])) {
    $date = date('Y-m-d');
    $courseCode = $_POST["cCode"];
    mysqli_query($db, "INSERT INTO announcementform VALUES('','$courseCode','ACTIVE');");
    echo " <script> alert('Announcement ADDED'); document.location.href = ''; </script> ";
}
?>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Announcement Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Announcement Description
                        <input type="text" class="form-control" placeholder="Announcement" name="cCode">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="subFormQuestionnaire">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>