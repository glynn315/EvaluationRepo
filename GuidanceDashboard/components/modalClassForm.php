<?php
require '../Configuration/connectionConf.php';
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST["subForm"])) {
    $fileName = $_FILES['cCode']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['cCode']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 1) {
                $facultyID = $row['2'];
                $departmentID = $row['5'];
                $courseID = $row['6'];
                $year = $row['8'];
                $section = $row['9'];
                $studentQuery1 = "INSERT INTO classinfotable VALUES('','$facultyID','$departmentID','$courseID','$year','$section','ACTIVE');";
                $result1 = mysqli_query($db, $studentQuery1);
                $msg = true;

            } else {
                $count = "3";
            }
        }
        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: classesModule.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location:classesModule.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: classesModule.php');
        exit(0);
    }
}
?>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Question Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Course Code
                        <input type="file" class="form-control" name="cCode">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="subForm">Upload File</button>
                </div>
            </form>

        </div>
    </div>
</div>