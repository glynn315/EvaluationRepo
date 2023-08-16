<?php
require '../Configuration/connectionConf.php';
include('../facultySession.php');


$query3 = "SELECT COUNT(DISTINCT pippersonalinfo.studentID) AS TOTAL_STUDENT, classinfotable.facultyId FROM classinfotable INNER JOIN pippersonalinfo ON classinfotable.departmentCode = pippersonalinfo.courseCode WHERE pippersonalinfo.pipRegistrationStatus = 'ACTIVE' AND classinfotable.facultyId='$login_session' AND classinfotable.classStatus='ACTIVE';";
$studentCount3 = mysqli_query($db , $query3);

if ($studentCount3) {
    $row = mysqli_fetch_assoc($studentCount3);
    $count3 = $row['TOTAL_STUDENT']; // The actual count value
} else {
    // Query execution failed, handle the error
    $count3 = 0;
}


$query2 = "SELECT COUNT(DISTINCT studentID) AS TOTAL_STUDENT FROM resulttable WHERE facultyId = '$login_session' AND resultStatus = 'ACTIVE';";
$studentCount2 = mysqli_query($db , $query2);

if ($studentCount2) {
    $row2 = mysqli_fetch_assoc($studentCount2);
    $count2 = $row2['TOTAL_STUDENT']; // The actual count value
} else {
    // Query execution failed, handle the error
    $count2 = 0;
}



$query = "SELECT classinfotable.departmentCode, classinfotable.correspondingYear, classinfotable.subjectID, classinfotable.correspondingSection, COUNT(DISTINCT pippersonalinfo.studentID) AS total_students FROM classinfotable LEFT JOIN pippersonalinfo ON pippersonalinfo.courseCode = classinfotable.departmentCode WHERE classinfotable.facultyId = '$login_session' AND pippersonalinfo.pipRegistrationStatus = 'ACTIVE' AND classStatus = 'ACTIVE' GROUP BY classinfotable.departmentCode, classinfotable.correspondingYear, classinfotable.correspondingSection; ";
$result = mysqli_query($db, $query);

$query1 = "SELECT * FROM announcementform";
$result1 = mysqli_query($db, $query1);

$query2 = "SELECT facultyId, subjectID, COUNT(DISTINCT studentID) AS total_evaluated_students FROM resulttable WHERE facultyID = '$login_session' GROUP BY facultyId, subjectID; ";
$result2 = mysqli_query($db, $query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCCCI Evaluation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>

<body>
<?php include 'components/navigation.php'; ?>
    <div class="main">
        <div class="container-fluid">
        <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm border p-3 m-2 rounded khaki">
                            <h4>STUDENT EVALUATE</h4>
                            <h1 class="pl-3">
                                <?php echo $count2 ?>
                            </h1>
                        </div>
                        <div class="col-sm border p-3 m-2 rounded khaki">
                            <h4>TOTAL STUDENT</h4>
                            <h1 class="pl-3">
                                <?php echo $count3 ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3>Class List</h3>
                            <table id="employee_data" class="table table-fluid mt-4" width="100%">
                                <thead>
                                    <tr>
                                        <td width="30%">Subject Code</td>
                                        <td>Faculty Name</td>
                                        <td>Year</td>
                                        <td>Section</td>
                                        <td>TOTAL</td>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr style='text-align:center;'>";
                                    echo "<td class='align-middle'>";
                                    echo $row["subjectID"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["departmentCode"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["correspondingYear"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["correspondingSection"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["total_students"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3>Announcement</h3>
                            <table id="employee_data" class="table table-fluid" width="100%">
                                <thead style="background-color:gray;">
                                    <tr>
                                        <td width="20%">#</td>
                                        <td>Announcement</td>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($result1)) {
                                    echo "<tr>";
                                    echo "<td class='align-middle'>";
                                    echo $row["announceID"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["announcementDesc"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3>Evaluation Count</h3>
                            <table id="employee_data" class="table table-fluid" width="100%">
                                <thead style="background-color:gray;">
                                    <tr>
                                        <td width="80%">Subject Code</td>
                                        <td>Count</td>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($result2)) {
                                    echo "<tr>";
                                    echo "<td class='align-middle'>";
                                    echo $row["subjectID"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["total_evaluated_students"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>