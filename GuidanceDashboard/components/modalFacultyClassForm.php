<?php
require '../Configuration/connectionConf.php';
if (isset($_POST["subFormQuestionnaire"])) {
    $date = date('Y-m-d');
    $facultyCode = $_POST["facultID"];
    mysqli_query($db, "INSERT INTO classassignmentform VALUES('','$classID','$facultyCode','ACTIVE');");
    echo " <script> alert('CLASS ADDED'); document.location.href = ''; </script> ";
}
?>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Class Assignment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Faculty
                        <select name="facultID" class="form-control mb-3">
                            <?php
                            $res = mysqli_query($db, "SELECT * FROM facultyformtable WHERE facultyStatus = 'ACTIVE'");
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <option value="<?php echo $row['facultyId']; ?>"><?php echo $row['facultyFname']. ' ' .$row['facultyLname']; ?></option>
                                <?php
                            }
                            ?>
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