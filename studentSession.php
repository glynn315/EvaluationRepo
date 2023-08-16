<?php
require 'Configuration/connectionConf.php';
session_start();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db,"SELECT * from pippersonalinfo where studentID = '$user_check'");
   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_ses = $row['studentRefNo'];
$login_session = $row['studentID'];
$login_Name = $row['pipFname'] . ' ' .$row['pipLname'];
$cCode = $row['courseCode'];
$Year = $row['pipYear'];
$Section = $row['pipSection'];
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
    die();
}
?>