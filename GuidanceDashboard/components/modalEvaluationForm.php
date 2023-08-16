<?php
require '../Configuration/connectionConf.php';
if (isset($_POST["subFormQuestionnaire"])) {
    $date = date('Y-m-d');
    $Question = $_POST["QuestionText"];
    $QuestionType = $_POST["QuestionType"];
    mysqli_query($db, "INSERT INTO questionformtable VALUES('','$Question','$QuestionType','$date');");
    echo " <script> alert('Question Added'); document.location.href = ''; </script> ";
}
?>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Question Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Question
                        <input type="text" class="form-control" placeholder="Enter Question" name="QuestionText">
                    </div>
                    <div class="form-group">
                        Question Type
                        <select name="QuestionType" class="form-control">
                            <option value="Teachers Behavior">Teacher’s Behavior</option>
                            <option value="Teaching Procedures">Teaching Procedures</option>
                            <option value="Online Class Management">Online Class Management</option>
                        </select>
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