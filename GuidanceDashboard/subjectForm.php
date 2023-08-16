<?php
require '../Configuration/connectionConf.php';
include('../GuidanceSession.php');
include('summaryCount.php');
$query = "SELECT * FROM subjecttableform WHERE subjectStatus = 'ACTIVE'";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCCCI Evaluation</title>
    <link rel="stylesheet" href="css/style.css">
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
</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <div class="main">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col py-3">
                    <div class="container-fluid">
                        <h2><i class="bi bi-diagram-3-fill"></i> Class Form</h2>
                        <hr>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="bi bi-plus-lg"></i> Add Subject
                        </button>
                        <?php include 'components/modalSubjectForm.php'; ?>
                        <div class="table-responsive" style="margin-top:20px;">
                            <table id="employee_data" class="table table-fluid" width="100%">
                                <thead>
                                    <tr>
                                        <td width="10%">#</td>
                                        <td>Course Code</td>
                                        <td>Year Level</td>
                                        <td width="10%">Action</td>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td class='align-middle'>";
                                    echo $row["subjectID"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["subjectCode"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["subjectDesc"];
                                    echo "</td>";
                                    echo "<td class='align-middle'><a href='manageForm.php?subjectID=$row[subjectID]''><button type='button' class='btn btn-primary mr-2' data-toggle='modal' data-target=.bd-example-modal-lg'>MANAGE</button></a>";
                                    "</td>";
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