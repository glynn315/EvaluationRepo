<?php
require '../Configuration/connectionConf.php';
include('../studentSession.php');


$query3 = "SELECT COUNT(subjectID) AS subjectCount FROM classinfotable WHERE correspondingYear = '$Year' AND correspondingSection = '$Section' AND classinfotable.classStatus = 'ACTIVE';";
$studentCount3 = mysqli_query($db , $query3);

if ($studentCount3) {
    $row = mysqli_fetch_assoc($studentCount3);
    $count3 = $row['subjectCount']; // The actual count value
} else {
    // Query execution failed, handle the error
    $count3 = 0;
}


$query = "SELECT COUNT(classinfotable.subjectID) AS subjectCount, classinfotable.subjectID, classinfotable.facultyId, CONCAT(facultyformtable.facultyFname, ' ', facultyformtable.facultyLname) AS NAME, classinfotable.subjectID FROM classinfotable INNER JOIN facultyformtable ON facultyformtable.facultyId = classinfotable.facultyId WHERE classinfotable.correspondingYear = '$Year' AND classinfotable.correspondingSection = '$Section' AND classinfotable.classStatus = 'ACTIVE' GROUP BY classinfotable.subjectID, classinfotable.subjectID, classinfotable.facultyId, NAME; ";
$result = mysqli_query($db, $query);

$query1 = "SELECT * FROM announcementform WHERE announcementStatus = 'ACTIVE'";
$result1 = mysqli_query($db, $query1);
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
            <h1 class="pt-3">WELCOME
                <?php echo $login_Name ?>
            </h1>
            <hr>

            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm border p-3 m-2 rounded khaki">
                            <h4>TO EVALUATE</h4>
                            <h1 class="pl-3">
                                <?php echo $count3 ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3>Subjects to Evaluate</h3>
                            <table id="employee_data" class="table table-fluid mt-4" width="100%">
                                <thead>
                                    <tr>
                                        <td width="30%">Subject Code</td>
                                        <td>Faculty Name</td>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td class='align-middle'>";
                                    echo $row["subjectID"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["NAME"];
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
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>