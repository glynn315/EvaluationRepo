<?php
require '../Configuration/connectionConf.php';
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST["subFormQuestionnaire"])) {
    $fileName = $_FILES['confirmationFile']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['confirmationFile']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 1) {
                $ID = $row['0'];
                $Name = $row['1'];
                $Section = $row['4'];
                $sql = "UPDATE pippersonalinfo SET studentID = '$ID', pipSection = '$Section',pipRegistrationStatus = 'ACTIVE' WHERE CONCAT(pipLname, ' ', pipFname, ' ', pipMname) = '$Name' AND pipRegistrationStatus = 'WAITING FOR CONFIRMATION'";
                $result1 = mysqli_query($db, $sql);
                $msg = true;

            } else {
                $count = "3";
            }
        }
        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('studentAccountManagement.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('studentAccountManagement.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('studentAccountManagement.php');
        exit(0);
    }
}
?>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-2">
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="confirmationFile" class="form-control">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="subFormQuestionnaire">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>