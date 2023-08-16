<?php
require '../Configuration/connectionConf.php';

$query = "SELECT COUNT(guidanceID ) AS Guidance FROM guidanceformtable;";
$studentCountResult = mysqli_query($db, $query);

// Check if the query was successful
if ($studentCountResult) {
    // Fetch the count value from the result
    $countData = mysqli_fetch_assoc($studentCountResult);
    $studentCount = $countData['Guidance'];
}

$ResID = $studentCount + 1;


$RefID = "ADMIN-00". $ResID;
if (isset($_POST["subFormQuestionnaire"])) {
    $date = date('Y-m-d');
    $StudentID = $_POST["studentID"];
    $StudentFname = $_POST["firstName"];
    $StudentLname = $_POST["lastName"];
    $StudentMname = $_POST["middleName"];
    $StudentAddress = $_POST["studentAddress"];
    $StudentContact = $_POST["studentContact"];
    $StudentDOB = $_POST["studentDOB"];
    mysqli_query($db, "INSERT INTO guidanceformtable VALUES('$StudentID','$StudentFname','$StudentMname','$StudentLname','$StudentAddress','$StudentContact','$StudentDOB','$date','ACTIVE','$StudentLname');");
    echo " <script> alert('Guidance ADDED TO SYSTEM'); document.location.href = ''; </script> ";
}
?>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h2 class="modal-title">Admin Guidance INFORMATION</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Student ID
                        <input type="text" class="form-control" value="<?php echo $RefID ?>" name="studentID">
                    </div>
                    <div class="form-group">
                        First Name
                        <input type="text" class="form-control" placeholder="Enter First Name" name="firstName">
                    </div>
                    <div class="form-group">
                        Middle Name
                        <input type="text" class="form-control" placeholder="Enter Middle Name" name="middleName">
                    </div>
                    <div class="form-group">
                        Last Name
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName">
                    </div>
                    <div class="form-group">
                        Address
                        <input type="text" class="form-control" placeholder="Purok / Barangay / Municipality / Province" name="studentAddress">
                    </div>
                    <div class="form-group">
                        Contact Number
                        <input type="text" class="form-control" placeholder="Enter Contact Number" name="studentContact">
                    </div>
                    <div class="form-group">
                        Date of Birth
                        <input type="date" class="form-control" name="studentDOB">
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