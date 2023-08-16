<?php
require '../Configuration/connectionConf.php';
if (isset($_POST["subFormQuestionnaire"])) {
    $date = date('Y-m-d');
    $courseCode = $_POST["cCode"];
    $yearLevel = $_POST["cCodeDesc"];
    mysqli_query($db, "INSERT INTO departmenttableform VALUES('$courseCode','$yearLevel','ACTIVE');");
    echo " <script> alert('Department ADDED'); document.location.href = ''; </script> ";
}
?>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Department Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Department Code
                        <input type="text" class="form-control" placeholder="Enter Department Code" name="cCode">
                    </div>
                    <div class="form-group">
                        Department Desc
                        <input type="text" class="form-control" placeholder="Enter Department Name" name="cCodeDesc">
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