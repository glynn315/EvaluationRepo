<?php
require '../Configuration/connectionConf.php'; 

$query ="SELECT * FROM pippersonalinfo WHERE pipRegistrationStatus  = 'ACTIVE'";
$studentCount = mysqli_query($db , $query);
$count = mysqli_num_rows($studentCount);

$query1 ="SELECT studentID FROM resulttable GROUP BY studentID";
$resultCount = mysqli_query($db , $query1);
$count1 = mysqli_num_rows($resultCount);

$query2 ="SELECT * FROM facultyformtable";
$facultyCount = mysqli_query($db , $query2);
$count2 = mysqli_num_rows($facultyCount);

$query3 ="SELECT facultyID FROM resulttable GROUP BY facultyID; ";
$resultCountFaculty = mysqli_query($db , $query3);
$count3 = mysqli_num_rows($resultCountFaculty);

$query4 ="SELECT * FROM pippersonalinfo WHERE pipRegistrationStatus  = 'PENDING'";
$pendingCount = mysqli_query($db , $query4);
$count4 = mysqli_num_rows($pendingCount);
?>