<?php
require 'Configuration/connectionConf.php';
session_start();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db,"SELECT * from facultyformtable where facultyId = '$user_check'");
   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['facultyId'];
$login_Name = $row['facultyFname'] . ' ' .$row['facultyLname'];

if(!isset($_SESSION['login_user'])){
    header("location:index.php");
    die();
}
?>