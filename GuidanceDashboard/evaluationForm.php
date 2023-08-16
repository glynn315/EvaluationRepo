<?php
require '../Configuration/connectionConf.php';
include('../Guidancesession.php');
$query = "SELECT * FROM questionformtable";
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
                        <h2><i class="bi bi-ui-radios"></i> Evaluation Form</h2>
                        <hr>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#myModal"><i class="bi bi-plus-lg"></i> Manage Questionnaire</button>
                        <?php include 'components/modalEvaluationForm.php'; ?>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                        <div class='card mt-1'>
                            <div class='card-header'>
                                Question ID -  " . $row["questionID"] . "
                            </div>
                            <div class='card-body'>
                                <blockquote class='blockquote mb-0'>
                                    <p>" . $row["questionDescrirption"] . "</p>
                                    <p>" . $row["questionType"] . "</p>
                                </blockquote>
                                <div class='modal-footer'>
                                    <button class='btn btn-primary'>Update</button>
                                </div>
                            </div>
                            
                        </div>";
                            }
                        } else {
                            echo "NO QUESTIONS AVAILABLE";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>