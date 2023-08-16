<?php
require '../Configuration/connectionConf.php';
include('../facultySession.php');

$query = "SELECT * FROM commenttableform WHERE commentStatus = 'ACTIVE'";
$result = mysqli_query($db, $query);
$result1 = mysqli_query($db, $query);
$result2 = mysqli_query($db, $query);
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


    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s;
        }

        /* Fade in tabs */
        @-webkit-keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <div class="main">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col py-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="tab">
                                <button class="tablinks" onclick="studentResult(event, 'Behavior')"
                                    id="defaultOpen">Teachers Behavior</button>
                                <button class="tablinks" onclick="studentResult(event, 'Procedure')">Teaching
                                    Procedure</button>

                                <button class="tablinks" onclick="studentResult(event, 'Management')">Online Class
                                    Management</button>
                            </div>

                            <div id="Behavior" class="tabcontent">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "
                                        <div class='card mt-1'>
                                            <div class='card-body'>
                                                <blockquote class='blockquote mb-0'>
                                                    <p><i>'" . $row["teachersBehavior"] . "'</i></p>
                                                </blockquote>
                                            </div>
                                        </div>";
                                    }
                                }
                                ?>
                            </div>

                            <div id="Procedure" class="tabcontent">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result1)) {
                                        echo "
                                        <div class='card mt-1'>
                                            <div class='card-body'>
                                                <blockquote class='blockquote mb-0'>
                                                    <p><i>'" . $row["teachingProcedure"] . "'</i></p>
                                                </blockquote>
                                            </div>
                                        </div>";
                                    }
                                }
                                ?>
                            </div>

                            <div id="Management" class="tabcontent">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result2)) {
                                        echo "
                                        <div class='card mt-1'>
                                            <div class='card-body'>
                                                <blockquote class='blockquote mb-0'>
                                                    <p><i>'" . $row["onlineClassManagement"] . "'</i></p>
                                                </blockquote>
                                            </div>
                                        </div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function studentResult(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>

</html>