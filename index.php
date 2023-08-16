<?php
require 'Configuration/connectionConf.php';
session_start();
if(isset($_POST["subLog"])) {
	$myusername = mysqli_real_escape_string($db,$_POST['loginID']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

	$sql = "SELECT * FROM guidanceformtable WHERE guidanceID = '$myusername' AND guidancePassword = '$mypassword'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);


    $sql1 = "SELECT * FROM facultyformtable WHERE facultyId = '$myusername' AND facultyPassword = '$mypassword'";
    $result1 = mysqli_query($db,$sql1);
    $row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count1 = mysqli_num_rows($result1);


    $sql2 = "SELECT * FROM pippersonalinfo WHERE studentID = '$myusername' AND pipPassword = '$mypassword'";
    $result2 = mysqli_query($db,$sql2);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $count2 = mysqli_num_rows($result2);
    $setCondition = $row2['pipRegistrationStatus'];
    
	if($count == 1) 
	{
            $_SESSION['login_user'] = $myusername;
            header("location:GuidanceDashboard/guidanceIndex.php");	
    }
    if($count1 == 1) 
    {
        $_SESSION['login_user'] = $myusername;
        header("location:TeacherDashboard/facultyDashboard.php");
    }
    if($count2 == 1) 
    {
        if ($setCondition == "ACTIVE") {
            $_SESSION['login_user'] = $myusername;
            header("location:StudentDashboard/studentIndex.php");
        }
        else if ($setCondition == "PENDING") {
            echo " <script> alert('ACCOUNT IS WAITING FOR APPROVAL')</script> ";
        }
        else if ($setCondition == "WAITING FOR CONFIRMATION") {
            echo " <script> alert('ACCOUNT IS WAITING FOR CONFIRMATION')</script> ";
        }
    }
   	else
    {
      	echo " <script> alert('ACCOUNT IS NOT VALID')</script> ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="IMAGES/logo.png" class="imgHeader">
    <h2 style="text-align:center;" class="mt-2">HOLY CHILD TEACHERS EVALUATION SYSTEM</h2>
    <div class="logCon">
        <h2>LOGIN FORM</h2>
        <form method="post">
            <div class="form-group mt-4">
                LOGIN ID
                <input type="text" class="form-control" placeholder="Enter Login ID" name="loginID">
            </div>
            <div class="form-group mt-2">
                PASSWORD
                <input type="password" class="form-control" placeholder="PASSWORD" name="password">
            </div>
            <div class="modal-footer mt-5">
                <button type="submit" class="btn" style="width:30%;" name="subLog">LOGIN</button>
            </div>
        </form>
    </div>

</body>

</html>