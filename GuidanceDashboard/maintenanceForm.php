<?php
require '../Configuration/connectionConf.php';
include('../GuidanceSession.php');


$query = "SELECT * FROM studentupdatesettings WHERE settingsID = '1';";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$setCondition = $row['enableUpdate'];
$setEvaluation = $row['enableEvaluation'];
if (isset($_POST["btnConfirm"])) {
    mysqli_query($db, "UPDATE commenttableform SET commentStatus = 'INACTIVE'");
    mysqli_query($db, "UPDATE resulttable SET resultStatus = 'INACTIVE'");
    mysqli_query($db, "UPDATE classinfotable SET classStatus = 'INACTIVE'");


    echo
        "
    <script>
    alert('Data is Archive');
    document.location.href = 'guidanceIndex.php';
    </script>
    ";
}

if (isset($_POST["btnDisable"])) {
    mysqli_query($db, "UPDATE studentupdatesettings SET enableUpdate = '0' WHERE settingsID = '1'");
    echo
        "
    <script>
    document.location.href = '';
    </script>
    ";
}
if (isset($_POST["btnEnable"])) {
    mysqli_query($db, "UPDATE studentupdatesettings SET enableUpdate = '1' WHERE settingsID = '1'");
    echo
        "
    <script>
    document.location.href = '';
    </script>
    ";
}
if (isset($_POST["btnDisableEval"])) {
    mysqli_query($db, "UPDATE studentupdatesettings SET enableEvaluation = '0' WHERE settingsID = '1'");
    echo
        "
    <script>
    document.location.href = '';
    </script>
    ";
}
if (isset($_POST["btnEnableEval"])) {
    mysqli_query($db, "UPDATE studentupdatesettings SET enableEvaluation = '1' WHERE settingsID = '1'");
    echo
        "
    <script>
    document.location.href = '';
    </script>
    ";
}
if (isset($_POST["btnPending"])) {
    mysqli_query($db, "UPDATE pippersonalinfo SET pipRegistrationStatus = 'PENDING'");
    echo
        "
    <script>
    alert('Students Data Updated');
    document.location.href = '';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCCCI Evaluation</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <style>
        body
        {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <div class="main">
        <h2 class="pt-3 pl-2">ADMIN SETTINGS</h2>
        <hr>
        <form method="post">
            <div class="container-fluid border p-4 mt-3 rounded">
                <h3>Are you sure you want to archive results of the evaluations?</h3>
                <hr>
                <button type="submit" class="btn btn-danger" name="btnConfirm"><i class="bi bi-arrow-clockwise"></i>
                    Confirm</button>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="container-fluid border p-4 mt-3 rounded">
                        <h3>Student Update Status</h3>
                        <?php
                            if($setCondition ==1){ echo "<p class='bg-success text-light p-1 rounded'>Enable</p>"; } 
                            else if($setCondition ==0){ echo "<p class='bg-danger text-light p-1 rounded'>Disable</p>"; }
                        ?>
                        <hr>
                        <div class="modal-footer">
                            <?php
                                if ($setCondition == 1) {
                                    echo '<button class="btn btn-danger border" type="submit" name="btnDisable">Disable</button>';
                                } else if ($setCondition == 0) {
                                    echo '<button type="submit" class="btn btn-primary" name="btnEnable">Enable</button>';
                                }
                            ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm">
                    <div class="container-fluid border p-4 mt-3 rounded">
                        <h3>Student Evaluation</h3>
                        <?php
                            if($setEvaluation ==1){ echo "<p class='bg-success text-light p-1 rounded'>Enable</p>"; } 
                            else if($setEvaluation ==0){ echo "<p class='bg-danger text-light p-1 rounded'>Disable</p>"; }
                        ?>
                        <hr>
                        <div class="modal-footer">
                            <?php
                                if ($setEvaluation == 1) {
                                    echo '<button class="btn btn-danger border" type="submit" name="btnDisableEval">Disable</button>';
                                } else if ($setEvaluation == 0) {
                                    echo '<button type="submit" class="btn btn-primary" name="btnEnableEval">Enable</button>';
                                }
                            ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm">
                    <div class="container-fluid border p-4 mt-3 rounded">
                        <h3>Reset Student Data</h3>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="btnPending">Reset</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#employee_data').DataTable();
        });  
    </script>
</body>

</html>