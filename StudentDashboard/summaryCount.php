<?php
require '../Configuration/connectionConf.php'; 
$query ="SELECT COUNT(subjectID) AS subjectCount FROM classinfotable WHERE correspondingYear = '$Year' AND correspondingSection = '$Section';";
$studentCount = mysqli_query($db , $query);
$count = mysqli_num_rows($studentCount);

$query ="SELECT COUNT(subjectID) AS subjectCount FROM classinfotable WHERE correspondingYear = '$Year' AND correspondingSection = '$Section';";
$studentCount = mysqli_query($db , $query);
$count1 = mysqli_num_rows($studentCount);

$query ="SELECT COUNT(subjectID) AS subjectCount FROM classinfotable WHERE correspondingYear = '$Year' AND correspondingSection = '$Section';";
$studentCount = mysqli_query($db , $query);
$count2 = mysqli_num_rows($studentCount);
?>