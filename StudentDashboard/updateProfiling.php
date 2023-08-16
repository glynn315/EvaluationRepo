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

$query5 = "SELECT * FROM otherinformationtable WHERE studenRefNo = '$login_ses'";
$result5 = mysqli_query($db, $query5);
$row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);

if (isset($_POST["subForm"])) {
    $date = date('Y-m-d');
    $image = addslashes(file_get_contents($_FILES['imageFile']['tmp_name']));
    mysqli_query($db, "UPDATE pippersonalinfo SET pipImage='$image' ,studentID='$_POST[txtIdNumber]', pipFname='$_POST[Fname]', pipMname='$_POST[Mname]', pipLname='$_POST[Lname]', pipYear='$_POST[txtYear]', courseCode='$_POST[txtStrand]', pipAge='$_POST[txtAge]', pipSex='$_POST[txtSex]', pipGender='$_POST[txtGender]', pipDob='$_POST[txtDOB]', pippob='$_POST[txtDOP]', pipCitizenship='$_POST[txtCitizenship]', pipReligion='$_POST[txtReligion]', pipBirthOrder='$_POST[txtBirthOrder]', pipCiv='$_POST[txtCivil]', pipPersonalStatement='$_POST[txtPersonal]', pipHobbiesSpecialties='$_POST[txtInterest]' WHERE studentID='$_POST[txtIdNumber]'");
    mysqli_query($db, "UPDATE addresscontactinfotable SET permAddress='$_POST[permAddress]', currentAddress='$_POST[currentAddress]', homeContactNo='$_POST[homeContact]', personaContactNo='$_POST[personalContact]', emailAddress='$_POST[emailAddress]', boardingHouseAdd='$_POST[boardAddress]', nameOfLandlord='$_POST[landlordName]', contactLandlord='$_POST[landLordContact]', emergencyName='$_POST[emergencyName]', emergencyContact='$_POST[emergencyContact]', emergencyAddress='$_POST[emergencyAddress]', emergencyRelation='$_POST[emergencyRelation]' WHERE studentRefNo='$login_ses'");
    mysqli_query($db, "UPDATE familybackground SET fatherFname='$_POST[fatherFname]', fatherMname='$_POST[fatherMname]', fatherLname='$_POST[fatherLname]', fatherAge='$_POST[fatherAge]', fatherDOB='$_POST[fatherDOB]', fatherContact='$_POST[fatherContact]', fatherOccu='$_POST[fatherOccu]', fatherEduc='$_POST[fatherEduc]', fatherReligion='$_POST[fatherReligion]', motherFname='$_POST[motherFname]', motherMname='$_POST[motherMname]', motherLname='$_POST[motherLname]', motherAge='$_POST[motherAge]', motherDOB='$_POST[motherDOB]', motherContact='$_POST[motherContact]', motherOccu='$_POST[motherOccu]', motherEduc='$_POST[motherEduc]', motherReligion='$_POST[motherReligion]', parentRelation='$_POST[parentRelation]', siblingName1='$_POST[siblingName1]', siblingSchoolWork1='$_POST[siblingSchoolWork1]', siblingAge1='$_POST[siblingAge1]', siblingAdditional1='$_POST[siblingAdditional1]', siblingName2='$_POST[siblingName2]', siblingSchoolWork2='$_POST[siblingSchoolWork2]', siblingAge2='$_POST[siblingAge2]', siblingAdditional2='$_POST[siblingAdditional2]', siblingName3='$_POST[siblingName3]', siblingSchoolWork3='$_POST[siblingSchoolWork3]', siblingAge3='$_POST[siblingAge3]', siblingAdditional3='$_POST[siblingAdditional3]', siblingName4='$_POST[siblingName4]', siblingSchoolWork4='$_POST[siblingSchoolWork4]', siblingAge4='$_POST[siblingAge4]', siblingAdditional4='$_POST[siblingAdditional4]', siblingName5='$_POST[siblingName5]', siblingSchoolWork5='$_POST[siblingSchoolWork5]', siblingAge5='$_POST[siblingAge5]', siblingAdditional5='$_POST[siblingAdditional5]', siblingName6='$_POST[siblingName6]', siblingSchoolWork6='$_POST[siblingSchoolWork6]', siblingAge6='$_POST[siblingAge6]', siblingAdditional6='$_POST[siblingAdditional6]', question1='$_POST[question1]', question2='$_POST[question2]' WHERE studentRefNo='$login_ses'");
    mysqli_query($db, "UPDATE marriedtable SET marriedFname='$_POST[marriedFname]', marriedMname='$_POST[marriedMname]', marriedLname='$_POST[marriedLname]', marriedOcc='$_POST[marriedOccu]', marriedAge='$_POST[marriedAge]', marriedReligion='$_POST[marriedReligion]', marriedContact='$_POST[marriedContact]', queation3='$_POST[question4]', mariedChildname1='$_POST[childName1]', mariedChildage1='$_POST[childAge1]', mariedChildsex1='$_POST[childSex1]', mariedChildname2='$_POST[childName2]', mariedChildage2='$_POST[childAge2]', mariedChildsex2='$_POST[childSex2]', mariedChildname3='$_POST[childName3]', mariedChildage3='$_POST[childAge3]', mariedChildsex3='$_POST[childSex3]', mariedChildname4='$_POST[childName4]', mariedChildage4='$_POST[childAge4]', mariedChildsex4='$_POST[childSex4]', mariedChildname5='$_POST[childName5]', mariedChildage5='$_POST[childAge5]', mariedChildsex5='$_POST[childSex5]', mariedChildname6='$_POST[childName6]', mariedChildage6='$_POST[childAge6]', mariedChildsex6='$_POST[childSex6]' WHERE studentRefNo='$login_ses'");
    mysqli_query($db, "UPDATE educationalbackground SET preSchoolName='{$_POST['preSchoolName']}', preSchoolAddress='{$_POST['preSchoolAddress']}', preSchoolyearGraduated='{$_POST['preSchoolyearGraduated']}', preSchoolAwards='{$_POST['preSchoolAwards']}', elemSchoolName='{$_POST['elemSchoolName']}', elemSchoolAddress='{$_POST['elemSchoolAddress']}', elemSchoolyearGraduated='{$_POST['elemSchoolyearGraduated']}', elemSchoolAwards='{$_POST['elemSchoolAwards']}', AlsElemName='{$_POST['AlsElemName']}', AlsElemAddress='{$_POST['AlsElemAddress']}', AlsElemyearGraduated='{$_POST['AlsElemyearGraduated']}', AlsElemAwards='{$_POST['AlsElemAwards']}', highSchoolName='{$_POST['highSchoolName']}', highSchoolAddress='{$_POST['highSchoolAddress']}', highSchoolYearGrad='{$_POST['highSchoolYearGrad']}', highSchoolAwards='{$_POST['highSchoolAwards']}', alsHighName='{$_POST['alsHighName']}', alsHighAddress='{$_POST['alsHighAddress']}', alsHighYearGrad='{$_POST['alsHighYearGrad']}', alsHighAwards='{$_POST['alsHighAwards']}', seniorHighName='{$_POST['seniorHighName']}', seniorHighAddress='{$_POST['seniorHighAddress']}', seniorHighYearGrad='{$_POST['seniorHighYearGrad']}', seniorHighAwards='{$_POST['seniorHighAwards']}', alsSeniorName='{$_POST['alsSeniorName']}', alsSeniorAddress='{$_POST['alsSeniorAddress']}', alsSeniorYearGrad='{$_POST['alsSeniorYearGrad']}', alsSeniorAwards='{$_POST['alsSeniorAwards']}', prevSchoolName='{$_POST['prevSchoolName']}', prevSchoolAddress='{$_POST['prevSchoolAddress']}', prevSchoolYearGrad='{$_POST['prevSchoolYearGrad']}', prevSchoolAwards='{$_POST['prevSchoolAwards']}', statusSchoolYear='{$_POST['statusSchoolYear']}', schoolStatus='{$_POST['schoolStatus']}', work='{$_POST['work']}', area='{$_POST['area']}', payeeName='{$_POST['payeeName']}', relationship='{$_POST['relationship']}', sponsor='{$_POST['sponsor']}', scholarship='{$_POST['scholarship']}', firstChoice='{$_POST['firstChoice']}', firstReason='{$_POST['firstReason']}', secondChoice='{$_POST['secondChoice']}', secondReason='{$_POST['secondReason']}', thirdChoice='{$_POST['thirdChoice']}', thirdReason='{$_POST['thirdReason']}', enrolledStrand='{$_POST['enrolledStrand']}', enrolledStrandReason='{$_POST['enrolledStrandReason']}', interviewersComment='{$_POST['interviewersComment']}' WHERE studentRefNo='$login_ses'");
    mysqli_query($db, "UPDATE otherinformationtable SET disabilities='{$_POST['disabilities']}', chronicIllness='{$_POST['chronicIllness']}', accidentExperience='{$_POST['accidentExperience']}', operationsExperience='{$_POST['operationsExperience']}', phsycologicalDisorder='{$_POST['phsycologicalDisorder']}', diagnosedBy='{$_POST['diagnosedBy']}', diagnosisDate='{$_POST['diagnosisDate']}', clinicAddress='{$_POST['clinicAddress']}', goals='{$_POST['goals']}', presentConcerns='{$_POST['presentConcerns']}', collegeAdjustment='" . (isset($_POST['collegeAdjustment']) ? 1 : 0) . "', selfAwareness='" . (isset($_POST['selfAwareness']) ? 1 : 0) . "', boostingSelfEsteem='" . (isset($_POST['boostingSelfEsteem']) ? 1 : 0) . "', improvingTimeManagement='" . (isset($_POST['improvingTimeManagement']) ? 1 : 0) . "', noteTaking='" . (isset($_POST['noteTaking']) ? 1 : 0) . "', workValues='" . (isset($_POST['workValues']) ? 1 : 0) . "', stressManagement='" . (isset($_POST['stressManagement']) ? 1 : 0) . "', conflictManagement='" . (isset($_POST['conflictManagement']) ? 1 : 0) . "', strengtheningFamily='" . (isset($_POST['strengtheningFamily']) ? 1 : 0) . "', handlingRelationship='" . (isset($_POST['handlingRelationship']) ? 1 : 0) . "', financialManagement='" . (isset($_POST['financialManagement']) ? 1 : 0) . "', improvingSocial='" . (isset($_POST['improvingSocial']) ? 1 : 0) . "', knowledgeAboutPossible='" . (isset($_POST['knowledgeAboutPossible']) ? 1 : 0) . "', dealingWithPersonal='" . (isset($_POST['dealingWithPersonal']) ? 1 : 0) . "', otherConcerns='" . (isset($_POST['otherConcerns']) ? 1 : 0) . "', interviewerComment='{$_POST['interviewerComment']}' WHERE studenRefNo='$login_ses'");



    echo
        "
    <script>
    alert('ACCOUNT UPDATED');
    document.location.href = 'studentProfiling.php';
    </script>
    ";
}
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
                        <form method="POST" enctype="multipart/form-data">
                            <div class="container-fluid bg-dark p-3 color-white">
                                <div class="text-light"><i class="bi bi-pencil-fill"></i> Personal Information</div>
                            </div>
                            <div class="container-fluid p-3">
                                <div class="form-group  ">
                                    <i class="bi bi-person-fill"></i> Select Image
                                    <input type="file" class="form-control" name="imageFile"
                                        value="<?php echo $row["studentID"] ?>" >
                                </div>
                                <div class="form-group  ">
                                    <i class="bi bi-person-fill"></i> ID Number
                                    <input type="text" class="form-control" name="txtIdNumber"
                                        value="<?php echo $row["studentID"] ?>" >
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> First Name
                                                    <input type="text" class="form-control" name="Fname"
                                                        value="<?php echo $row["pipFname"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="Mname"
                                                        value="<?php echo $row["pipMname"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="Lname"
                                                        value="<?php echo $row["pipLname"] ?>" >
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Year/Grade Level
                                    <input type="text" class="form-control" name="txtYear" value="<?php echo $row["pipYear"] ?>"
                                        >
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Curricular Program/Strand
                                    <input type="text" class="form-control" name="txtStrand" value="<?php echo $row["courseCode"] ?>"
                                        >
                                </div>
                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Age
                                                    <input type="text" class="form-control" name="txtAge"
                                                        value="<?php echo $row["pipAge"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Sex
                                                    <input type="text" class="form-control" name="txtSex"
                                                        value="<?php echo $row["pipSex"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group ">
                                                    <i class="bi bi-person-fill"></i> Gender
                                                    <input type="text" class="form-control" name="txtGender"
                                                        value="<?php echo $row["pipGender"] ?>" >
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Date of Birth
                                    <input type="text" class="form-control" name="txtDOB"
                                        value="<?php echo $row["pipDob"] ?>" >
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Date of Place
                                    <input type="text" class="form-control" name="txtDOP"
                                        value="<?php echo $row["pippob"] ?>" >
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Citizenship
                                    <input type="text" class="form-control" name="txtCitizenship"
                                        value="<?php echo $row["pipCitizenship"] ?>" >
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Religion
                                    <input type="text" class="form-control" name="txtReligion"
                                        value="<?php echo $row["pipReligion"] ?>" >
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Birth Order
                                    <input type="text" class="form-control" name="txtBirthOrder"
                                        value="<?php echo $row["pipBirthOrder"] ?>" >
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-person-fill"></i> Civil Status
                                    <input type="text" class="form-control" name="txtCivil" value="<?php echo $row["pipCiv"] ?>"
                                        >
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-chat-fill"></i> Personal Statement
                                    <textarea class="form-control" name="txtPersonal"
                                        ><?php echo $row["pipPersonalStatement"] ?></textarea>
                                </div>
                                <div class="form-group ">
                                    <i class="bi bi-heart-fill"></i> Area of Interest and Special Abilities
                                    <textarea class="form-control" name="txtInterest"
                                        ><?php echo $row["pipHobbiesSpecialties"] ?></textarea>
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
                                        >
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Current Address
                                        <input type="text" class="form-control" name="currentAddress" value="<?php echo $row1["currentAddress"] ?>"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Home Contact Number
                                                        <input type="text" class="form-control" name="homeContact" value="<?php echo $row1["homeContactNo"] ?>"
                                        >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Personal Contact Number
                                                        <input type="text" class="form-control" name="personalContact" value="<?php echo $row1["personaContactNo"] ?>"
                                        >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Email Address
                                                        <input type="text" class="form-control" name="emailAddress" value="<?php echo $row1["emailAddress"] ?>"
                                        >
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
                                        >
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Name of Landlord/Landlady
                                        <input type="text" class="form-control" name="landlordName" value="<?php echo $row1["nameOfLandlord"] ?>"
                                        >
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Contact Number of Landlord
                                        <input type="text" class="form-control" name="landLordContact" value="<?php echo $row1["contactLandlord"] ?>"
                                        >
                                    </div>
                                    <div class="text-center mt-4">
                                        <b>IN CASE OF EMERGENCY, CONTACT:</b>
                                    </div>

                                    <div class="form-group">
                                        <i class="bi bi-person-fill"></i> Name
                                        <input type="text" class="form-control" name="emergencyName" value="<?php echo $row1["emergencyName"] ?>"
                                        >
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Contact Number
                                        <input type="text" class="form-control" name="emergencyContact" value="<?php echo $row1["emergencyContact"] ?>"
                                        >
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Address
                                        <input type="text" class="form-control" name="emergencyAddress" value="<?php echo $row1["emergencyAddress"] ?>"
                                        >
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Relationship
                                        <input type="text" class="form-control" name="emergencyRelation" value="<?php echo $row1["emergencyRelation"] ?>"
                                        >
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
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="fatherMname" value="<?php echo $row2["fatherMname"] ?>"
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="fatherLname" value="<?php echo $row2["fatherLname"] ?>"
                                                >
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
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Date of Birth
                                                    <input type="text" class="form-control" name="fatherDOB" value="<?php echo $row2["fatherDOB"] ?>"
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Contact Number
                                                    <input type="text" class="form-control" name="fatherContact" value="<?php echo $row2["fatherContact"] ?>"
                                                >
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
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Highest Educational Attainment
                                                    <input type="text" class="form-control" name="fatherEduc" value="<?php echo $row2["fatherEduc"] ?>"
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Religion
                                                    <input type="text" class="form-control" name="fatherReligion" value="<?php echo $row2["fatherReligion"] ?>"
                                                >
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
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="motherMname" value="<?php echo $row2["motherMname"] ?>"
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="motherLname" value="<?php echo $row2["motherLname"] ?>"
                                                >
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
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Date of Birth
                                                    <input type="text" class="form-control" name="motherDOB" value="<?php echo $row2["motherDOB"] ?>"
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Contact Number
                                                    <input type="text" class="form-control" name="motherContact" value="<?php echo $row2["motherContact"] ?>"
                                                >
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
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Highest Educational Attainment
                                                    <input type="text" class="form-control" name="motherEduc" value="<?php echo $row2["motherEduc"] ?>"
                                                >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Religion
                                                    <input type="text" class="form-control" name="motherReligion" value="<?php echo $row2["motherReligion"] ?>"
                                                >
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Parents Relationship Status
                                    <input type="text" class="form-control" name="parentRelation" value="<?php echo $row2["parentRelation"] ?>" >
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
                                                    <input type="text" class="form-control" name="siblingName1" value="<?php echo $row2["siblingName1"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork1" value="<?php echo $row2["siblingSchoolWork1"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge1" value="<?php echo $row2["siblingAge1"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional1" value="<?php echo $row2["siblingAdditional1"] ?>" >
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
                                                    <input type="text" class="form-control" name="siblingName2" value="<?php echo $row2["siblingName2"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork2" value="<?php echo $row2["siblingSchoolWork2"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge2" value="<?php echo $row2["siblingAge2"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional2" value="<?php echo $row2["siblingAdditional2"] ?>" >
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
                                                    <input type="text" class="form-control" name="siblingName3" value="<?php echo $row2["siblingName3"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork3" value="<?php echo $row2["siblingSchoolWork3"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge3" value="<?php echo $row2["siblingAge3"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional3" value="<?php echo $row2["siblingAdditional3"] ?>" >
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
                                                    <input type="text" class="form-control" name="siblingName4" value="<?php echo $row2["siblingName4"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork4" value="<?php echo $row2["siblingSchoolWork4"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge4" value="<?php echo $row2["siblingAge4"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional4" value="<?php echo $row2["siblingAdditional4"] ?>" >
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
                                                    <input type="text" class="form-control" name="siblingName5" value="<?php echo $row2["siblingName5"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork5" value="<?php echo $row2["siblingSchoolWork5"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge5" value="<?php echo $row2["siblingAge5"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional5" value="<?php echo $row2["siblingAdditional5"] ?>" >
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
                                                    <input type="text" class="form-control" name="siblingName6" value="<?php echo $row2["siblingName6"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                                    <input type="text" class="form-control" name="siblingSchoolWork6" value="<?php echo $row2["siblingSchoolWork6"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="siblingAge6" value="<?php echo $row2["siblingAge6"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                                    <input type="text" class="form-control" name="siblingAdditional6" value="<?php echo $row2["siblingAdditional6"] ?>" >
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Do you have a live-in partner?
                                    <input type="text" class="form-control" name="question1" value="<?php echo $row2["question1"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Does your partner have a job?
                                    <input type="text" class="form-control" name="question2" value="<?php echo $row2["question2"] ?>" >
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
                                                    <input type="text" class="form-control" name="marriedFname" value="<?php echo $row3["marriedFname"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Middle Name
                                                    <input type="text" class="form-control" name="marriedMname" value="<?php echo $row3["marriedMname"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Last Name
                                                    <input type="text" class="form-control" name="marriedLname" value="<?php echo $row3["marriedLname"] ?>" >
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
                                                    <input type="text" class="form-control" name="marriedOccu" value="<?php echo $row3["marriedOcc"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Age
                                                    <input type="text" class="form-control" name="marriedAge" value="<?php echo $row3["marriedAge"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Religion
                                                    <input type="text" class="form-control" name="marriedReligion" value="<?php echo $row3["marriedReligion"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> Contact Number
                                                    <input type="text" class="form-control" name="marriedContact" value="<?php echo $row3["marriedContact"] ?>" >
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Do you have a child?
                                    <input type="text" class="form-control" name="question4" value="<?php echo $row3["queation3"] ?>" >
                                </div>

                                <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td width="70%">
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> NAME
                                                    <input type="text" class="form-control" name="childName1" value="<?php echo $row3["mariedChildname1"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge1" value="<?php echo $row3["mariedChildage1"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex1" value="<?php echo $row3["mariedChildsex1"] ?>" >
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
                                                    <input type="text" class="form-control" name="childName2" value="<?php echo $row3["mariedChildname2"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge2" value="<?php echo $row3["mariedChildage2"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex2" value="<?php echo $row3["mariedChildsex2"] ?>" >
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
                                                    <input type="text" class="form-control" name="childName3" value="<?php echo $row3["mariedChildname3"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge3" value="<?php echo $row3["mariedChildage3"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex3" value="<?php echo $row3["mariedChildsex3"] ?>" >
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
                                                    <input type="text" class="form-control" name="childName4" value="<?php echo $row3["mariedChildname4"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge4" value="<?php echo $row3["mariedChildage4"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex4" value="<?php echo $row3["mariedChildsex4"] ?>" >
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
                                                    <input type="text" class="form-control" name="childName5" value="<?php echo $row3["mariedChildname5"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge5" value="<?php echo $row3["mariedChildage5"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex5" value="<?php echo $row3["mariedChildsex5"] ?>" >
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
                                                    <input type="text" class="form-control" name="childName6" value="<?php echo $row3["mariedChildname6"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> AGE
                                                    <input type="text" class="form-control" name="childAge6" value="<?php echo $row3["mariedChildage6"] ?>" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <i class="bi bi-person-fill"></i> SEX
                                                    <input type="text" class="form-control" name="childSex6" value="<?php echo $row3["mariedChildsex6"] ?>" >
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
                                                        <input type="text" class="form-control" name="preSchoolName" value="<?php echo $row4["preSchoolName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="preSchoolAddress" value="<?php echo $row4["preSchoolAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="preSchoolyearGraduated" value="<?php echo $row4["preSchoolyearGraduated"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="preSchoolAwards" value="<?php echo $row4["preSchoolAwards"] ?>" >
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
                                                        <input type="text" class="form-control" name="elemSchoolName" value="<?php echo $row4["elemSchoolName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="elemSchoolAddress" value="<?php echo $row4["elemSchoolAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="elemSchoolyearGraduated" value="<?php echo $row4["elemSchoolyearGraduated"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="elemSchoolAwards" value="<?php echo $row4["elemSchoolAwards"] ?>" >
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
                                                        <input type="text" class="form-control" name="AlsElemName" value="<?php echo $row4["AlsElemName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="AlsElemAddress" value="<?php echo $row4["AlsElemAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="AlsElemyearGraduated" value="<?php echo $row4["AlsElemyearGraduated"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="AlsElemAwards" value="<?php echo $row4["AlsElemAwards"] ?>" >
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
                                                        <input type="text" class="form-control" name="highSchoolName" value="<?php echo $row4["highSchoolName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="highSchoolAddress" value="<?php echo $row4["highSchoolAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="highSchoolYearGrad" value="<?php echo $row4["highSchoolYearGrad"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="highSchoolAwards" value="<?php echo $row4["highSchoolAwards"] ?>" >
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
                                                        <input type="text" class="form-control" name="alsHighName" value="<?php echo $row4["alsHighName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="alsHighAddress" value="<?php echo $row4["alsHighAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="alsHighYearGrad" value="<?php echo $row4["alsHighYearGrad"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="alsHighAwards" value="<?php echo $row4["alsHighAwards"] ?>" >
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
                                                        <input type="text" class="form-control" name="seniorHighName" value="<?php echo $row4["seniorHighName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="seniorHighAddress" value="<?php echo $row4["seniorHighAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="seniorHighYearGrad" value="<?php echo $row4["seniorHighYearGrad"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="seniorHighAwards" value="<?php echo $row4["seniorHighAwards"] ?>" >
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
                                                        <input type="text" class="form-control" name="alsSeniorName" value="<?php echo $row4["alsSeniorName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="alsSeniorAddress" value="<?php echo $row4["alsSeniorAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="alsSeniorYearGrad" value="<?php echo $row4["alsSeniorYearGrad"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="alsSeniorAwards" value="<?php echo $row4["alsSeniorAwards"] ?>" >
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
                                                        <input type="text" class="form-control" name="prevSchoolName" value="<?php echo $row4["prevSchoolName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Address
                                                        <input type="text" class="form-control" name="prevSchoolAddress" value="<?php echo $row4["prevSchoolAddress"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Year Graduated
                                                        <input type="text" class="form-control" name="prevSchoolYearGrad" value="<?php echo $row4["prevSchoolYearGrad"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Awards Received
                                                        <input type="text" class="form-control" name="prevSchoolAwards" value="<?php echo $row4["prevSchoolAwards"] ?>" >
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Status for School Year
                                        <input type="text" class="form-control" name="statusSchoolYear" value="<?php echo $row4["statusSchoolYear"] ?>" >
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Status
                                        <input type="text" class="form-control" name="schoolStatus" value="<?php echo $row4["schoolStatus"] ?>" >
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
                                                        <input type="text" class="form-control" name="work" value="<?php echo $row4["work"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Area
                                                        <input type="text" class="form-control" name="area" value="<?php echo $row4["area"] ?>" >
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
                                                        <input type="text" class="form-control" name="payeeName" value="<?php echo $row4["payeeName"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Relationship
                                                        <input type="text" class="form-control" name="relationship" value="<?php echo $row4["relationship"] ?>" >
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
                                                        <input type="text" class="form-control" name="sponsor" value="<?php echo $row4["sponsor"] ?>" >
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
                                                        <input type="text" class="form-control" name="scholarship" value="<?php echo $row4["scholarship"] ?>" >
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
                                                        <input type="text" class="form-control" name="firstChoice" value="<?php echo $row4["firstChoice"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="firstReason" value="<?php echo $row4["firstReason"] ?>" >
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
                                                        <input type="text" class="form-control" name="secondChoice" value="<?php echo $row4["secondChoice"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="secondReason" value="<?php echo $row4["secondReason"] ?>" >
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
                                                        <input type="text" class="form-control" name="thirdChoice" value="<?php echo $row4["thirdChoice"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="thirdReason" value="<?php echo $row4["thirdReason"] ?>" >
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
                                                        <input type="text" class="form-control" name="enrolledStrand" value="<?php echo $row4["enrolledStrand"] ?>" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group mt-4">
                                                        <i class="bi bi-person-fill"></i> Reason
                                                        <input type="text" class="form-control" name="enrolledStrandReason" value="<?php echo $row4["enrolledStrandReason"] ?>" >
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Interviewers Comment
                                        <textarea name="interviewersComment" class="form-control" ><?php echo $row4["interviewersComment"] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="container-fluid bg-dark p-3 color-white">
                                <div class="text-light"><i class="bi bi-pencil-fill"></i> Other Information</div>
                            </div>
                            <div class="container-fluid p-3">
                                <div class="form-group mt-4">
                                    <b><i class="bi bi-person-fill"></i> Health Conditions</b>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Disabilities/Impairement
                                    <input type="text" class="form-control" name="disabilities" value="<?php echo $row5["disabilities"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Chronic Illnesses
                                    <input type="text" class="form-control" name="chronicIllness" value="<?php echo $row5["chronicIllness"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Accident Experience
                                    <input type="text" class="form-control" name="accidentExperience" value="<?php echo $row5["accidentExperience"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Operations Experience
                                    <input type="text" class="form-control" name="operationsExperience" value="<?php echo $row5["operationsExperience"] ?>" >
                                </div>

                                <div class="form-group mt-4">
                                    <b><i class="bi bi-person-fill"></i> Psychological Health</b>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Psychological Disorder
                                    <input type="text" class="form-control" name="phsycologicalDisorder" value="<?php echo $row5["phsycologicalDisorder"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Diagnosed By
                                    <input type="text" class="form-control" name="diagnosedBy" value="<?php echo $row5["diagnosedBy"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i>Date Diagnosis
                                    <input type="text" class="form-control" name="diagnosisDate" value="<?php echo $row5["diagnosisDate"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Address of Clinic
                                    <input type="text" class="form-control" name="clinicAddress" value="<?php echo $row5["clinicAddress"] ?>" >
                                </div>


                                <div class="form-group mt-4">
                                    <b><i class="bi bi-person-fill"></i> Self Evaluation</b>
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Goals
                                    <input type="text" class="form-control" name="goals" value="<?php echo $row5["goals"] ?>" >
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Present Concerns/Problems
                                    <input type="text" class="form-control" name="presentConcerns" value="<?php echo $row5["presentConcerns"] ?>" >
                                </div>

                                <div class="form-group mt-4">
                                    <b><i class="bi bi-person-fill"></i> Needs Assesment (Check as many as possible)</b>
                                </div>
                                <div class="form-group mt-4">
                                    <input type="checkbox" name="collegeAdjustment" value="College Adjustment"> College
                                    Adjustment <br>
                                    <input type="checkbox" name="selfAwareness" value="College Adjustment"> Self Awareness<br>
                                    <input type="checkbox" name="boostingSelfEsteem" value="College Adjustment"> Boosting
                                    Self-esteem<br>
                                    <input type="checkbox" name="improvingTimeManagement" value="College Adjustment"> Improving
                                    Time Management<br>
                                    <input type="checkbox" name="noteTaking" value="College Adjustment">
                                    Note-taking/Test-taking/Studying
                                    Techniques<br>
                                    <input type="checkbox" name="workValues" value="College Adjustment"> Work Values<br>
                                    <input type="checkbox" name="stressManagement" value="College Adjustment"> Stress
                                    Management<br>
                                    <input type="checkbox" name="conflictManagement" value="College Adjustment"> Conflict
                                    Management<br>
                                    <input type="checkbox" name="strengtheningFamily" value="College Adjustment"> Strengthening
                                    Family
                                    Relationship<br>
                                    <input type="checkbox" name="handlingRelationship" value="College Adjustment"> Handling Peer
                                    Relationship<br>
                                    <input type="checkbox" name="financialManagement" value="College Adjustment"> Financial
                                    Management<br>
                                    <input type="checkbox" name="improvingSocial" value="College Adjustment"> Improving Social
                                    Interaction<br>
                                    <input type="checkbox" name="knowledgeAboutPossible" value="College Adjustment"> Knowledge
                                    about possible
                                    Careers<br>
                                    <input type="checkbox" name="dealingWithPersonal" value="College Adjustment"> Dealing with
                                    Personal
                                    Problems<br>
                                    <input type="checkbox" name="otherConcerns" value="College Adjustment"> Others Concerns
                                </div>
                                <div class="form-group mt-4">
                                    <i class="bi bi-person-fill"></i> Interviewers Comment
                                    <textarea name="interviewerComment" class="form-control"></textarea>
                                </div>
                            </div>
                            <form method="post">
                                <div class="modal-footer mt-3">
                                    <button type="submit" class="btn btn-primary" name="subForm">Update Form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>