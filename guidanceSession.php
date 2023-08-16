<?php
require 'Configuration/connectionConf.php';
session_start();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db,"SELECT * from guidanceformtable where guidanceID = '$user_check'");
   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['guidanceID'];
$login_Name = $row['guidanceFname'] . ' ' .$row['guidanceLname'];

if(!isset($_SESSION['login_user'])){
    header("location:index.php");
    die();
}
?>