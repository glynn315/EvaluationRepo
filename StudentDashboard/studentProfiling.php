<?php
require '../Configuration/connectionConf.php';
include('../studentSession.php');

$query = "SELECT * FROM pippersonalinfo WHERE studentRefNo = '$login_ses'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$query1 = "SELECT * FROM addresscontactinfotable WHERE studentRefNo = '$login_ses'";
$result1 = mysqli_query($db, $query1);
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

$query2 = "SELECT * FROM familybackground WHERE studentRefNo = '$login_ses'";
$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

$query3 = "SELECT * FROM marriedtable WHERE studentRefNo = '$login_ses'";
$result3 = mysqli_query($db, $query3);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

$query4 = "SELECT * FROM educationalbackground WHERE studentRefNo = '$login_ses'";
$result4 = mysqli_query($db, $query4);
$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
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
</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <div class="main">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col py-3">
                    <div class="container-fluid">
                        <h1>Student Profiling</h1>
                        <hr>
                        <form method="POST">
                            <div class="container-fluid bg-dark p-3 color-white">
                                <div class="text-light"><i class="bi bi-pencil-fill"></i> Personal Information</div>
                            </div>
                            <div class="container-fluid p-3">
                                <div class="form-group mb-3 text-center">
                                    <img src="<?php echo"data:image/jpeg;base64,".base64_encode($row["pipImage"] )."" ?>" style="width: 300px;height: 300px;display: block; margin: auto;">
                                </div>
                                <div class="form-group  ">
                                    <i class="bi bi-person-fill"></i> ID Number
                                    <input type="text" class="form-control" name="txtIdNumber"
                                        value="<?php echo $row["studentID"] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> First Name
                                                    <input type="text" class="form-control" name="Fname"
                                                        value="<?php echo $row["pipFname"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="Mname"
                                                        value="<?php echo $row["pipMname"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="Lname"
                                                        value="<?php echo $row["pipLname"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Year/Grade Level
                                    <input type="text" class="form-control" value="<?php echo $row["pipYear"] ?>"
                                        disabled>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Curricular Program/Strand
                                    <input type="text" class="form-control" value="<?php echo $row["courseCode"] ?>"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Age
                                                    <input type="text" class="form-control" name="txtAge"
                                                        value="<?php echo $row["pipAge"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Sex
                                                    <input type="text" class="form-control" name="txtSex"
                                                        value="<?php echo $row["pipSex"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Gender
                                                    <input type="text" class="form-control" name="txtGender"
                                                        value="<?php echo $row["pipGender"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Date of Birth
                                    <input type="text" class="form-control" name="txtDOB"
                                        value="<?php echo $row["pipDob"] ?>" disabled>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Date of Place
                                    <input type="text" class="form-control" name="txtDOP"
                                        value="<?php echo $row["pippob"] ?>" disabled>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Citizenship
                                    <input type="text" class="form-control" name="txtCitizenship"
                                        value="<?php echo $row["pipCitizenship"] ?>" disabled>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Religion
                                    <input type="text" class="form-control" name="txtReligion"
                                        value="<?php echo $row["pipReligion"] ?>" disabled>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Birth Order
                                    <input type="text" class="form-control" name="txtBirthOrder"
                                        value="<?php echo $row["pipBirthOrder"] ?>" disabled>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Civil Status
                                    <input type="text" class="form-control" value="<?php echo $row["pipCiv"] ?>"
                                        disabled>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-chat-fill"></i> Personal Statement
                                    <textarea class="form-control" name="txtPersonal"
                                        disabled><?php echo $row["pipPersonalStatement"] ?></textarea>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-heart-fill"></i> Area of Interest and Special Abilities
                                    <textarea class="form-control"
                                        disabled><?php echo $row["pipHobbiesSpecialties"] ?></textarea>
                                </div>
                                <hr>



                                
                                <div class="container-fluid bg-dark p-3 color-white">
                                    <div class="text-light"><i class="bi bi-globe-americas"></i> Address and Contact
                                        Information</div>
                                </div>
                                <div class="container-fluid p-3">
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Permanent Address
                                        <input type="text" class="form-control" name="permAddress" value="<?php echo $row1["permAddress"] ?>"
                                        disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Current Address
                                        <input type="text" class="form-control" name="currentAddress" value="<?php echo $row1["currentAddress"] ?>"
                                        disabled>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Home Contact Number
                                                        <input type="text" class="form-control" name="homeContact" value="<?php echo $row1["homeContactNo"] ?>"
                                        disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Personal Contact Number
                                                        <input type="text" class="form-control" name="personalContact" value="<?php echo $row1["personaContactNo"] ?>"
                                        disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Email Address
                                                        <input type="text" class="form-control" name="emailAddress" value="<?php echo $row1["emailAddress"] ?>"
                                        disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="text-center mt-4">
                                        <i class="text-center">If you are staying in a boarding house/dormitory, please
                                            give us the
                                            following details</i>
                                    </div>
                                    <div class="form-group">
                                        <i class="bi bi-person-fill"></i> Boarding house Address
                                        <input type="text" class="form-control" name="boardAddress" value="<?php echo $row1["boardingHouseAdd"] ?>"
                                        disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Name of Landlord/Landlady
                                        <input type="text" class="form-control" name="landlordName" value="<?php echo $row1["nameOfLandlord"] ?>"
                                        disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Contact Number of Landlord
                                        <input type="text" class="form-control" name="landLordContact" value="<?php echo $row1["contactLandlord"] ?>"
                                        disabled>
                                    </div>
                                    <div class="text-center mt-4">
                                        <b>IN CASE OF EMERGENCY, CONTACT:</b>
                                    </div>

                                    <div class="form-group">
                                        <i class="bi bi-person-fill"></i> Name
                                        <input type="text" class="form-control" name="emergencyName" value="<?php echo $row1["emergencyName"] ?>"
                                        disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Contact Number
                                        <input type="text" class="form-control" name="emergencyContact" value="<?php echo $row1["emergencyContact"] ?>"
                                        disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Address
                                        <input type="text" class="form-control" name="emergencyAddress" value="<?php echo $row1["emergencyAddress"] ?>"
                                        disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Relationship
                                        <input type="text" class="form-control" name="emergencyRelation" value="<?php echo $row1["emergencyRelation"] ?>"
                                        disabled>
                                    </div>
                                    
                                </div>
                                <hr>





                                <div class="container-fluid bg-dark p-3 color-white mt-4">
                                <div class="text-light"><i class="bi bi-house-fill"></i> Family Background</div>
                            </div>
                            <div class="container-fluid p-3">
                                <div class="form-group mt-4">
                                    <b><i class="bi bi-person-fill"></i> Fathers Information</b>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> First Name
                                                    <input type="text" class="form-control" name="fatherFname" value="<?php echo $row2["fatherFname"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="fatherMname" value="<?php echo $row2["fatherMname"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="fatherLname" value="<?php echo $row2["fatherLname"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Age
                                                    <input type="text" class="form-control" name="fatherAge" value="<?php echo $row2["fatherAge"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Date of Birth
                                                    <input type="text" class="form-control" name="fatherDOB" value="<?php echo $row2["fatherDOB"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Contact Number
                                                    <input type="text" class="form-control" name="fatherContact" value="<?php echo $row2["fatherContact"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Occupation
                                                    <input type="text" class="form-control" name="fatherOccu" value="<?php echo $row2["fatherOccu"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Highest Educational Attainment
                                                    <input type="text" class="form-control" name="fatherEduc" value="<?php echo $row2["fatherEduc"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Religion
                                                    <input type="text" class="form-control" name="fatherReligion" value="<?php echo $row2["fatherReligion"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-4">
                                    <b><i class="bi bi-person-fill"></i> Mothers Information</b>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> First Name
                                                    <input type="text" class="form-control" name="motherFname" value="<?php echo $row2["motherFname"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="motherMname" value="<?php echo $row2["motherMname"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="motherLname" value="<?php echo $row2["motherLname"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Age
                                                    <input type="text" class="form-control" name="motherAge" value="<?php echo $row2["motherAge"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Date of Birth
                                                    <input type="text" class="form-control" name="motherDOB" value="<?php echo $row2["motherDOB"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Contact Number
                                                    <input type="text" class="form-control" name="motherContact" value="<?php echo $row2["motherContact"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Occupation
                                                    <input type="text" class="form-control" name="motherOccu" value="<?php echo $row2["motherOccu"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Highest Educational Attainment
                                                    <input type="text" class="form-control" name="motherEduc" value="<?php echo $row2["motherEduc"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Religion
                                                    <input type="text" class="form-control" name="motherReligion" value="<?php echo $row2["motherReligion"] ?>"
                                                disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Parents Relationship Status
                                    <input type="text" class="form-control" name="motherReligion" value="<?php echo $row2["parentRelation"] ?>" disabled>
                                </div>
                                <div class="text-center mt-4">
                                    <i class="text-center">Please enumerate the names of your siblings from eldest to youngest,
                                        including yourself</i>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Name
                                                    <input type="text" class="form-control" name="siblingName1" value="<?php echo $row2["siblingName1"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork1" value="<?php echo $row2["siblingSchoolWork1"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge1" value="<?php echo $row2["siblingAge1"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional1" value="<?php echo $row2["siblingAdditional1"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Name
                                                    <input type="text" class="form-control" name="siblingName1" value="<?php echo $row2["siblingName2"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork1" value="<?php echo $row2["siblingSchoolWork2"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge1" value="<?php echo $row2["siblingAge2"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional1" value="<?php echo $row2["siblingAdditional2"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Name
                                                    <input type="text" class="form-control" name="siblingName1" value="<?php echo $row2["siblingName3"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork1" value="<?php echo $row2["siblingSchoolWork3"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge1" value="<?php echo $row2["siblingAge3"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional1" value="<?php echo $row2["siblingAdditional3"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Name
                                                    <input type="text" class="form-control" name="siblingName1" value="<?php echo $row2["siblingName4"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork1" value="<?php echo $row2["siblingSchoolWork4"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge1" value="<?php echo $row2["siblingAge4"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional1" value="<?php echo $row2["siblingAdditional4"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Name
                                                    <input type="text" class="form-control" name="siblingName1" value="<?php echo $row2["siblingName5"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork1" value="<?php echo $row2["siblingSchoolWork5"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge1" value="<?php echo $row2["siblingAge5"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional1" value="<?php echo $row2["siblingAdditional5"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Name
                                                    <input type="text" class="form-control" name="siblingName1" value="<?php echo $row2["siblingName6"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork1" value="<?php echo $row2["siblingSchoolWork6"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge1" value="<?php echo $row2["siblingAge6"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional1" value="<?php echo $row2["siblingAdditional6"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Do you have a live-in partner?
                                    <input type="text" class="form-control" name="siblingAdditional6" value="<?php echo $row2["question1"] ?>" disabled>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Does your partner have a job?
                                    <input type="text" class="form-control" name="siblingAdditional6" value="<?php echo $row2["question2"] ?>" disabled>
                                </div>
                                <div class="text-center mt-4">
                                    <i class="text-center">*For Married</i>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> First Name
                                                    <input type="text" class="form-control" name="marriedFname" value="<?php echo $row3["marriedFname"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="marriedMname" value="<?php echo $row3["marriedMname"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="marriedLname" value="<?php echo $row3["marriedLname"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Occupation
                                                    <input type="text" class="form-control" name="marriedOccu" value="<?php echo $row3["marriedOcc"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Age
                                                    <input type="text" class="form-control" name="marriedAge" value="<?php echo $row3["marriedAge"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Religion
                                                    <input type="text" class="form-control" name="marriedReligion" value="<?php echo $row3["marriedReligion"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Contact Number
                                                    <input type="text" class="form-control" name="marriedContact" value="<?php echo $row3["marriedContact"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Do you have a child?
                                    <input type="text" class="form-control" name="marriedContact" value="<?php echo $row3["queation3"] ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td width="70%">
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> NAME
                                                    <input type="text" class="form-control" name="childName1" value="<?php echo $row3["mariedChildname1"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge1" value="<?php echo $row3["mariedChildage1"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex1" value="<?php echo $row3["mariedChildsex1"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                    <tr>
                                            <td width="70%">
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> NAME
                                                    <input type="text" class="form-control" name="childName1" value="<?php echo $row3["mariedChildname2"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge1" value="<?php echo $row3["mariedChildage2"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex1" value="<?php echo $row3["mariedChildsex2"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                    <tr>
                                            <td width="70%">
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> NAME
                                                    <input type="text" class="form-control" name="childName1" value="<?php echo $row3["mariedChildname3"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge1" value="<?php echo $row3["mariedChildage3"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex1" value="<?php echo $row3["mariedChildsex3"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                    <tr>
                                            <td width="70%">
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> NAME
                                                    <input type="text" class="form-control" name="childName1" value="<?php echo $row3["mariedChildname4"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge1" value="<?php echo $row3["mariedChildage4"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex1" value="<?php echo $row3["mariedChildsex4"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                    <tr>
                                            <td width="70%">
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> NAME
                                                    <input type="text" class="form-control" name="childName1" value="<?php echo $row3["mariedChildname5"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge1" value="<?php echo $row3["mariedChildage5"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex1" value="<?php echo $row3["mariedChildsex5"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                    <tr>
                                            <td width="70%">
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> NAME
                                                    <input type="text" class="form-control" name="childName1" value="<?php echo $row3["mariedChildname6"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge1" value="<?php echo $row3["mariedChildage6"] ?>" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex1" value="<?php echo $row3["mariedChildsex6"] ?>" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <hr>

                                <div class="container-fluid bg-dark p-3 color-white">
                                    <div class="text-light"><i class="bi bi-pencil-fill"></i> Educational Background</div>
                                </div>
                                <div class="container-fluid p-3">
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> PRE-School</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="preSchoolName" value="<?php echo $row4["preSchoolName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="preSchoolAddress" value="<?php echo $row4["preSchoolAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="preSchoolyearGraduated" value="<?php echo $row4["preSchoolyearGraduated"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="preSchoolAwards" value="<?php echo $row4["preSchoolAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> Elementary</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="elemSchoolName" value="<?php echo $row4["elemSchoolName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="elemSchoolAddress" value="<?php echo $row4["elemSchoolAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="elemSchoolyearGraduated" value="<?php echo $row4["elemSchoolyearGraduated"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="elemSchoolAwards" value="<?php echo $row4["elemSchoolAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> Alternative Learning System(ALS) for Elementary</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="AlsElemName" value="<?php echo $row4["AlsElemName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="AlsElemAddress" value="<?php echo $row4["AlsElemAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="AlsElemyearGraduated" value="<?php echo $row4["AlsElemyearGraduated"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="AlsElemAwards" value="<?php echo $row4["AlsElemAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> High School</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="highSchoolName" value="<?php echo $row4["highSchoolName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="highSchoolAddress" value="<?php echo $row4["highSchoolAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="highSchoolYearGrad" value="<?php echo $row4["highSchoolYearGrad"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["highSchoolAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> Alternative Learning System(ALS) for High School</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="highSchoolName" value="<?php echo $row4["alsHighName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="highSchoolAddress" value="<?php echo $row4["alsHighAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="highSchoolYearGrad" value="<?php echo $row4["alsHighYearGrad"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["alsHighAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> Senior High School</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="highSchoolName" value="<?php echo $row4["seniorHighName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="highSchoolAddress" value="<?php echo $row4["seniorHighAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="highSchoolYearGrad" value="<?php echo $row4["seniorHighYearGrad"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["seniorHighAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> Alternative Learning System(ALS) for Senior High
                                            School</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="highSchoolName" value="<?php echo $row4["alsSeniorName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="highSchoolAddress" value="<?php echo $row4["alsSeniorAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="highSchoolYearGrad" value="<?php echo $row4["alsSeniorYearGrad"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["alsSeniorAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> Previous College</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name of School
                                                        <input type="text" class="form-control" name="highSchoolName" value="<?php echo $row4["prevSchoolName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="highSchoolAddress" value="<?php echo $row4["prevSchoolAddress"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="highSchoolYearGrad" value="<?php echo $row4["prevSchoolYearGrad"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["prevSchoolAwards"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Status for School Year
                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["statusSchoolYear"] ?>" disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Status
                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["schoolStatus"] ?>" disabled>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> If working</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Work
                                                        <input type="text" class="form-control" name="work" value="<?php echo $row4["work"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Area
                                                        <input type="text" class="form-control" name="area" value="<?php echo $row4["area"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> If paying</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Name
                                                        <input type="text" class="form-control" name="payeeName" value="<?php echo $row4["payeeName"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Relationship
                                                        <input type="text" class="form-control" name="relationship" value="<?php echo $row4["relationship"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> If Scholarship Grantee</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i>Sponsor
                                                        <input type="text" class="form-control" name="sponsor" value="<?php echo $row4["sponsor"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> If Applied for Scholarship</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Scholarship
                                                        <input type="text" class="form-control" name="scholarship" value="<?php echo $row4["scholarship"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <b><i class="bi bi-person-fill"></i> Curricular Program (if COLLEGE)/Strand (if SHS)</b>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> First Choice
                                                        <input type="text" class="form-control" name="firstChoice" value="<?php echo $row4["firstChoice"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="firstReason" value="<?php echo $row4["firstReason"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Second Choice
                                                        <input type="text" class="form-control" name="secondChoice" value="<?php echo $row4["secondChoice"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="secondReason" value="<?php echo $row4["secondReason"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Third Choice
                                                        <input type="text" class="form-control" name="thirdChoice" value="<?php echo $row4["thirdChoice"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="thirdReason" value="<?php echo $row4["thirdReason"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Enrolled Program/Strand
                                                        <input type="text" class="form-control" name="enrolledStrand" value="<?php echo $row4["enrolledStrand"] ?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="enrolledStrandReason" value="<?php echo $row4["enrolledStrandReason"] ?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Interviewers Comment
                                        <textarea name="interviewersComment" class="form-control" disabled><?php echo $row4["interviewersComment"] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>