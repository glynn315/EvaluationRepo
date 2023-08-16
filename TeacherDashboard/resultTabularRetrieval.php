<?php
require '../Configuration/connectionConf.php';
include('../facultySession.php');
$query1 = "SELECT questionformtable.questionType,AVG(resulttable.rates) AS RESULT FROM resulttable INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId INNER JOIN questionformtable ON questionformtable.questionID = resulttable.questionID GROUP BY questionformtable.questionType;";
$result1 = mysqli_query($db, $query1);
$chart_data = '';
while ($row1 = mysqli_fetch_array($result1)) {
    $chart_data .= "{ QUESTION:'" . $row1["questionType"] . "', TYPE:" . $row1["RESULT"] . "}, ";
}


$sql = "SELECT questionformtable.questionDescrirption,(resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$login_session' AND questionformtable.questionType='Teachers Behavior' AND  resulttable.resultStatus = 'ACTIVE' GROUP BY questionformtable.questionDescrirption;";
$result = $db->query($sql);

$sql1 = "SELECT questionformtable.questionDescrirption,(resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$login_session' AND questionformtable.questionType='Teaching Procedures'AND resulttable.resultStatus = 'ACTIVE' GROUP BY questionformtable.questionDescrirption;";
$result1 = $db->query($sql1);

$sql2 = "SELECT questionformtable.questionDescrirption,(resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$login_session' AND questionformtable.questionType='Online Class Management' AND  resulttable.resultStatus = 'ACTIVE' GROUP BY questionformtable.questionDescrirption;";
$result2 = $db->query($sql2);
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
    <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <style>
        .main {
            width: 85%;
        }

        #chart .morris-hover-row-label,
        #chart .morris-hover-point {
            fill: blue; /* Replace with the desired color */
            color: blue; /* Replace with the desired color */
        }
    </style>
</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <div class="main" style="width:83%;">
        <div class="container-fluid mt-4">
            <h1 class="mt-4 mb-4">Tabular Result</h1>
            <?php
            if ($result->num_rows > 0) {
                // Start building the table
                echo "<table class='table table-hover table-bordered'>";
                echo "<tr>";
                echo "<th>Teacher Behavior</th>";
                echo "<th width='10%'>Rating</th>";
                // Add more column headers if needed
                echo "</tr>";

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["questionDescrirption"] . "</td>";
                    echo "<td>" . $row["AVERAGE"] . "</td>";
                    // Add more columns if needed
                    echo "</tr>";
                }

                // Close the table
                echo "</table>";
            } else {
                echo "No results found";
            }
            if ($result->num_rows > 0) {
                // Start building the table
                echo "<table class='table table-hover table-bordered'>";
                echo "<tr>";
                echo "<th>Teaching Procedures</th>";
                echo "<th width='10%'>Rating</th>";
                // Add more column headers if needed
                echo "</tr>";

                // Output data of each row
                while ($row = $result1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["questionDescrirption"] . "</td>";
                    echo "<td>" . $row["AVERAGE"] . "</td>";
                    // Add more columns if needed
                    echo "</tr>";
                }

                // Close the table
                echo "</table>";
            } else {
                echo "No results found";
            }
            if ($result->num_rows > 0) {
                // Start building the table
                echo "<table class='table table-hover table-bordered'>";
                echo "<tr>";
                echo "<th>Online Class Management</th>";
                echo "<th width='10%'>Rating</th>";
                // Add more column headers if needed
                echo "</tr>";

                // Output data of each row
                while ($row = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["questionDescrirption"] . "</td>";
                    echo "<td>" . $row["AVERAGE"] . "</td>";
                    // Add more columns if needed
                    echo "</tr>";
                }

                // Close the table
                echo "</table>";
            } else {
                echo "No results found";
            }
            ?>
        </div>
    </div>


    <script>
        new Morris.Bar({
            element: 'chart',
            data: [<?php echo $chart_data; ?>],
            xkey: 'QUESTION',
            ykeys: ['TYPE'],
            labels: ['RELEASED DATA'],
            hideHover: 'auto',
            stacked: true
        });
    </script>
</body>

</html>