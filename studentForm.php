<?php
require 'Configuration/connectionConf.php';

$query = "SELECT COUNT(studentRefNo) AS studRef FROM pippersonalinfo;";
$studentCountResult = mysqli_query($db, $query);

// Check if the query was successful
if ($studentCountResult) {
    // Fetch the count value from the result
    $countData = mysqli_fetch_assoc($studentCountResult);
    $studentCount = $countData['studRef'];
}

$ResID = $studentCount + 1;


$RefID = "ReferenceNumber - 00". $ResID;

if (isset($_POST["subForm"])) {
    $date = date('Y-m-d');
    mysqli_query($db, "INSERT INTO pippersonalinfo VALUES('$_POST[txt0]','$_POST[txtIdNumber]','$_POST[Fname]','$_POST[Mname]','$_POST[Lname]','$_POST[txtYear]','$_POST[txtStrand]','$_POST[txtAge]','$_POST[txtSex]','$_POST[txtGender]','$_POST[txtDOB]','$_POST[txtDOP]','$_POST[txtCitizenship]','$_POST[txtReligion]','$_POST[txtBirthOrder]','$_POST[txtCivil]','$_POST[txtPersonal]','$_POST[txtInterest]','PENDING','$_POST[Lname]','','');");
    mysqli_query($db, "INSERT INTO addresscontactinfotable VALUES('','$_POST[txt0]','$_POST[permAddress]','$_POST[currentAddress]','$_POST[homeContact]','$_POST[personalContact]','$_POST[emailAddress]','$_POST[boardAddress]','$_POST[landlordName]','$_POST[landLordContact]','$_POST[emergencyName]','$_POST[emergencyContact]','$_POST[emergencyAddress]','$_POST[emergencyRelation]');");
    mysqli_query($db, "INSERT INTO familybackground VALUES('', '$_POST[txt0]', '$_POST[fatherFname]', '$_POST[fatherMname]', '$_POST[fatherLname]', '$_POST[fatherAge]', '$_POST[fatherDOB]', '$_POST[fatherContact]', '$_POST[fatherOccu]', '$_POST[fatherEduc]', '$_POST[fatherReligion]', '$_POST[motherFname]', '$_POST[motherMname]', '$_POST[motherLname]', '$_POST[motherAge]', '$_POST[motherDOB]', '$_POST[motherContact]', '$_POST[motherOccu]', '$_POST[motherEduc]', '$_POST[motherReligion]', '$_POST[parentRelation]', '$_POST[siblingName1]', '$_POST[siblingSchoolWork1]', '$_POST[siblingAge1]', '$_POST[siblingAdditional1]', '$_POST[siblingName2]', '$_POST[siblingSchoolWork2]', '$_POST[siblingAge2]', '$_POST[siblingAdditional2]', '$_POST[siblingName3]', '$_POST[siblingSchoolWork3]', '$_POST[siblingAge3]', '$_POST[siblingAdditional3]', '$_POST[siblingName4]', '$_POST[siblingSchoolWork4]', '$_POST[siblingAge4]', '$_POST[siblingAdditional4]', '$_POST[siblingName5]', '$_POST[siblingSchoolWork5]', '$_POST[siblingAge5]', '$_POST[siblingAdditional5]', '$_POST[siblingName6]', '$_POST[siblingSchoolWork6]', '$_POST[siblingAge6]', '$_POST[siblingAdditional6]', '$_POST[question1]', '$_POST[question2]');");
    mysqli_query($db, "INSERT INTO marriedtable VALUES ('','$_POST[marriedFname]', '$_POST[marriedMname]', '$_POST[marriedLname]', '$_POST[marriedOccu]', '$_POST[marriedAge]', '$_POST[marriedReligion]', '$_POST[marriedContact]', '$_POST[question4]', '$_POST[childName1]', '$_POST[childAge1]', '$_POST[childSex1]', '$_POST[childName2]', '$_POST[childAge2]', '$_POST[childSex2]', '$_POST[childName3]', '$_POST[childAge3]', '$_POST[childSex3]', '$_POST[childName4]', '$_POST[childAge4]', '$_POST[childSex4]', '$_POST[childName5]', '$_POST[childAge5]', '$_POST[childSex5]', '$_POST[childName6]', '$_POST[childAge6]', '$_POST[childSex6]', '$_POST[txt0]');");
    mysqli_query($db, "INSERT INTO educationalbackground VALUES ('','" . $_POST['txt0'] . "','" . $_POST['preSchoolName'] . "', '" . $_POST['preSchoolAddress'] . "', '" . $_POST['preSchoolyearGraduated'] . "', '" . $_POST['preSchoolAwards'] . "', '" . $_POST['elemSchoolName'] . "', '" . $_POST['elemSchoolAddress'] . "', '" . $_POST['elemSchoolyearGraduated'] . "', '" . $_POST['elemSchoolAwards'] . "', '" . $_POST['AlsElemName'] . "', '" . $_POST['AlsElemAddress'] . "', '" . $_POST['AlsElemyearGraduated'] . "', '" . $_POST['AlsElemAwards'] . "', '" . $_POST['highSchoolName'] . "', '" . $_POST['highSchoolAddress'] . "', '" . $_POST['highSchoolYearGrad'] . "', '" . $_POST['highSchoolAwards'] . "', '" . $_POST['alsHighName'] . "', '" . $_POST['alsHighAddress'] . "', '" . $_POST['alsHighYearGrad'] . "', '" . $_POST['alsHighAwards'] . "', '" . $_POST['seniorHighName'] . "', '" . $_POST['seniorHighAddress'] . "', '" . $_POST['seniorHighYearGrad'] . "', '" . $_POST['seniorHighAwards'] . "', '" . $_POST['alsSeniorName'] . "', '" . $_POST['alsSeniorAddress'] . "', '" . $_POST['alsSeniorYearGrad'] . "', '" . $_POST['alsSeniorAwards'] . "', '" . $_POST['prevSchoolName'] . "', '" . $_POST['prevSchoolAddress'] . "', '" . $_POST['prevSchoolYearGrad'] . "', '" . $_POST['prevSchoolAwards'] . "', '" . $_POST['statusSchoolYear'] . "', '" . $_POST['schoolStatus'] . "', '" . $_POST['work'] . "', '" . $_POST['area'] . "', '" . $_POST['payeeName'] . "', '" . $_POST['relationship'] . "', '" . $_POST['sponsor'] . "', '" . $_POST['scholarship'] . "', '" . $_POST['firstChoice'] . "', '" . $_POST['firstReason'] . "', '" . $_POST['secondChoice'] . "', '" . $_POST['secondReason'] . "', '" . $_POST['thirdChoice'] . "', '" . $_POST['thirdReason'] . "', '" . $_POST['enrolledStrand'] . "', '" . $_POST['enrolledStrandReason'] . "', '" . $_POST['interviewersComment'] . "');");
    mysqli_query($db, "INSERT INTO otherinformationtable VALUES ('','" . $_POST['txt0'] . "','" . $_POST['disabilities'] . "', '" . $_POST['chronicIllness'] . "', '" . $_POST['accidentExperience'] . "', '" . $_POST['operationsExperience'] . "', '" . $_POST['phsycologicalDisorder'] . "', '" . $_POST['diagnosedBy'] . "', '" . $_POST['diagnosisDate'] . "', '" . $_POST['clinicAddress'] . "', '" . $_POST['goals'] . "', '" . $_POST['presentConcerns'] . "', 
    '" . (isset($_POST['collegeAdjustment']) ? 1 : 0) . "', '" . (isset($_POST['selfAwareness']) ? 1 : 0) . "', '" . (isset($_POST['boostingSelfEsteem']) ? 1 : 0) . "', '" . (isset($_POST['improvingTimeManagement']) ? 1 : 0) . "', '" . (isset($_POST['noteTaking']) ? 1 : 0) . "', '" . (isset($_POST['workValues']) ? 1 : 0) . "', '" . (isset($_POST['stressManagement']) ? 1 : 0) . "', '" . (isset($_POST['conflictManagement']) ? 1 : 0) . "', 
    '" . (isset($_POST['strengtheningFamily']) ? 1 : 0) . "', '" . (isset($_POST['handlingRelationship']) ? 1 : 0) . "', '" . (isset($_POST['financialManagement']) ? 1 : 0) . "', '" . (isset($_POST['improvingSocial']) ? 1 : 0) . "', '" . (isset($_POST['knowledgeAboutPossible']) ? 1 : 0) . "', '" . (isset($_POST['dealingWithPersonal']) ? 1 : 0) . "', '" . (isset($_POST['otherConcerns']) ? 1 : 0) . "', 
    '" . $_POST['interviewerComment'] . "');");
    echo
        "
    <script>
    alert('ACCOUNT UPDATED');
    document.location.href = 'approved.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT FORM</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-4 rounded mt-3">
        <h3 class="text-center">HCCCI STUDENT INVENTORY AND PROFILE</h3>
        <div class="container-fluid border p-3">
            <form method="POST">
                <div class="container-fluid bg-dark p-3 color-white">
                    <div class="text-light"><i class="bi bi-pencil-fill"></i> Personal Information</div>
                </div>
                <div class="container-fluid p-3">
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Student Reference No.
                        <input type="text" class="form-control" name="txt0" value="<?php echo $RefID ?>" readonly>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> ID Number
                        <input type="text" class="form-control" name="txtIdNumber">
                    </div>
                    <div class="form-group">
                        <table width="100%">
                            <tr>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> First Name
                                        <input type="text" class="form-control" name="Fname" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Middle Name
                                        <input type="text" class="form-control" name="Mname" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Last Name
                                        <input type="text" class="form-control" name="Lname" required>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Year/Grade Level
                        <select class="form-control" name="txtYear" required>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Curricular Program/Strand
                        <select class="form-control" name="txtStrand" required>
                            <?php
                            $res = mysqli_query($db, "SELECT * FROM departmenttableform WHERE departmentStatus = 'ACTIVE'");
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <option value="<?php echo $row['departmentCode']; ?>"><?php echo $row['departmentDesc']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <table width="100%">
                            <tr>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Age
                                        <input type="text" class="form-control" name="txtAge" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Sex
                                        <input type="text" class="form-control" name="txtSex" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Gender
                                        <input type="text" class="form-control" name="txtGender" required>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Date of Birth
                        <input type="date" class="form-control" name="txtDOB" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Place of Birth
                        <input type="text" class="form-control" name="txtDOP" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Citizenship
                        <input type="text" class="form-control" name="txtCitizenship" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Religion
                        <input type="text" class="form-control" name="txtReligion" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Birth Order
                        <input type="text" class="form-control" name="txtBirthOrder" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Civil Status
                        <select class="form-control" name="txtCivil" required>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Seperated">Seperated</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-chat-fill"></i> Personal Statement
                        <textarea class="form-control" placeholder="Personal Statement" name="txtPersonal" required></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-heart-fill"></i> Area of Interest and Special Abilities
                        <textarea class="form-control" placeholder="Personal Statement" name="txtInterest" required></textarea>
                    </div>
                </div>

                <div class="container-fluid bg-dark p-3 color-white">
                    <div class="text-light"><i class="bi bi-globe-americas"></i> Address and Contact Information</div>
                </div>
                <div class="container-fluid p-3">
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Permanent Address
                        <input type="text" class="form-control" name="permAddress" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Current Address
                        <input type="text" class="form-control" name="currentAddress" required>
                    </div>
                    <div class="form-group">
                        <table width="100%">
                            <tr>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Home Contact Number
                                        <input type="text" class="form-control" name="homeContact">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Personal Contact Number
                                        <input type="text" class="form-control" name="personalContact" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        <i class="bi bi-person-fill"></i> Email Address
                                        <input type="email" class="form-control" name="emailAddress" required>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <i class="text-center">If you are staying in a boarding house/dormitory, please give us the
                            following details</i>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-person-fill"></i> Boarding house Address
                        <input type="text" class="form-control" name="boardAddress">
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Name of Landlord/Landlady
                        <input type="text" class="form-control" name="landlordName">
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Contact Number of Landlord
                        <input type="text" class="form-control" name="landLordContact">
                    </div>
                    <div class="text-center mt-4">
                        <b>IN CASE OF EMERGENCY, CONTACT:</b>
                    </div>

                    <div class="form-group">
                        <i class="bi bi-person-fill"></i> Name
                        <input type="text" class="form-control" name="emergencyName" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Contact Number
                        <input type="text" class="form-control" name="emergencyContact" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Address
                        <input type="text" class="form-control" name="emergencyAddress" required>
                    </div>
                    <div class="form-group mt-4">
                        <i class="bi bi-person-fill"></i> Relationship
                        <input type="text" class="form-control" name="emergencyRelation" required>
                    </div>

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
                                            <input type="text" class="form-control" name="fatherFname" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Middle Name
                                            <input type="text" class="form-control" name="fatherMname" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Last Name
                                            <input type="text" class="form-control" name="fatherLname" required>
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
                                            <input type="text" class="form-control" name="fatherAge" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Date of Birth
                                            <input type="date" class="form-control" name="fatherDOB" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Contact Number
                                            <input type="text" class="form-control" name="fatherContact" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
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
                                            <input type="text" class="form-control" name="fatherOccu" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Highest Educational Attainment
                                            <input type="text" class="form-control" name="fatherEduc" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Religion
                                            <input type="text" class="form-control" name="fatherReligion" required>
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
                                            <input type="text" class="form-control" name="motherFname" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Middle Name
                                            <input type="text" class="form-control" name="motherMname" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Last Name
                                            <input type="text" class="form-control" name="motherLname" required>
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
                                            <input type="text" class="form-control" name="motherAge" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Date of Birth
                                            <input type="date" class="form-control" name="motherDOB" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Contact Number
                                            <input type="text" class="form-control" name="motherContact" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
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
                                            <input type="text" class="form-control" name="motherOccu" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Highest Educational Attainment
                                            <input type="text" class="form-control" name="motherEduc" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Religion
                                            <input type="text" class="form-control" name="motherReligion" required>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Parents Relationship Status
                            <select name="parentRelation" class="form-control" required>
                                <option value="Legally Married">Legally Married</option>
                                <option value="Not Married But Staying Together">Not Married But Staying Together
                                </option>
                                <option value="Not Married and bot staying together">Not Married and bot staying
                                    together</option>
                                <option value="Seperated">Seperated</option>
                                <option value="Annulled">Annulled</option>
                            </select>
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
                                            <input type="text" class="form-control" name="siblingName1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                            <input type="text" class="form-control" name="siblingSchoolWork1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="siblingAge1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                            <input type="text" class="form-control" name="siblingAdditional1">
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
                                            <input type="text" class="form-control" name="siblingName2">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                            <input type="text" class="form-control" name="siblingSchoolWork2">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="siblingAge2">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                            <input type="text" class="form-control" name="siblingAdditional2">
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
                                            <input type="text" class="form-control" name="siblingName3">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                            <input type="text" class="form-control" name="siblingSchoolWork3">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="siblingAge3">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                            <input type="text" class="form-control" name="siblingAdditional3">
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
                                            <input type="text" class="form-control" name="siblingName4">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                            <input type="text" class="form-control" name="siblingSchoolWork4">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="siblingAge4">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                            <input type="text" class="form-control" name="siblingAdditional4">
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
                                            <input type="text" class="form-control" name="siblingName5">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                            <input type="text" class="form-control" name="siblingSchoolWork5">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="siblingAge5">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                            <input type="text" class="form-control" name="siblingAdditional5">
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
                                            <input type="text" class="form-control" name="siblingName6">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SCHOOL/PLACE OF WORK
                                            <input type="text" class="form-control" name="siblingSchoolWork6">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="siblingAge6">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> ADDITIONAL INFORMATION
                                            <input type="text" class="form-control" name="siblingAdditional6">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Do you have a live-in partner?
                            <select name="question1" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Does your partner have a job?
                            <select name="question2" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
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
                                            <input type="text" class="form-control" name="marriedFname">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Middle Name
                                            <input type="text" class="form-control" name="marriedMname">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Last Name
                                            <input type="text" class="form-control" name="marriedLname">
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
                                            <input type="text" class="form-control" name="marriedOccu">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Age
                                            <input type="text" class="form-control" name="marriedAge">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Religion
                                            <input type="text" class="form-control" name="marriedReligion">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Contact Number
                                            <input type="text" class="form-control" name="marriedContact">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Do you have a child?
                            <select name="question4" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="text-center mt-4">
                            <i class="text-center">If YES, please fill-out the following details of your
                                child/children</i>
                        </div>
                        <div class="form-group">
                            <table width="100%">
                                <tr>
                                    <td width="70%">
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> NAME
                                            <input type="text" class="form-control" name="childName1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="childAge1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SEX
                                            <input type="text" class="form-control" name="childSex1">
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
                                            <input type="text" class="form-control" name="childName2">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="childAge2">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SEX
                                            <input type="text" class="form-control" name="childSex2">
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
                                            <input type="text" class="form-control" name="childName3">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="childAge3">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SEX
                                            <input type="text" class="form-control" name="childSex3">
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
                                            <input type="text" class="form-control" name="childName4">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="childAge4">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SEX
                                            <input type="text" class="form-control" name="childSex4">
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
                                            <input type="text" class="form-control" name="childName5">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="childAge5">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SEX
                                            <input type="text" class="form-control" name="childSex5">
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
                                            <input type="text" class="form-control" name="childName6">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> AGE
                                            <input type="text" class="form-control" name="childAge6">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> SEX
                                            <input type="text" class="form-control" name="childSex6">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
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
                                            <input type="text" class="form-control" name="preSchoolName" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="preSchoolAddress" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="preSchoolyearGraduated"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="preSchoolAwards">
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
                                            <input type="text" class="form-control" name="elemSchoolName" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="elemSchoolAddress" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="elemSchoolyearGraduated" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="elemSchoolAwards">
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
                                            <input type="text" class="form-control" name="AlsElemName">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="AlsElemAddress">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="AlsElemyearGraduated" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="AlsElemAwards">
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
                                            <input type="text" class="form-control" name="highSchoolName" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="highSchoolAddress" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="highSchoolYearGrad" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="highSchoolAwards">
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
                                            <input type="text" class="form-control" name="alsHighName">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="alsHighAddress">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="alsHighYearGrad" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="alsHighAwards">
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
                                            <input type="text" class="form-control" name="seniorHighName" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="seniorHighAddress" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="seniorHighYearGrad" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="seniorHighAwards">
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
                                            <input type="text" class="form-control" name="alsSeniorName">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="alsSeniorAddress">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="alsSeniorYearGrad" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onpaste="return false;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="alsSeniorAwards">
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
                                            <input type="text" class="form-control" name="prevSchoolName">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="prevSchoolAddress">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Year Graduated
                                            <input type="text" class="form-control" name="prevSchoolYearGrad">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Awards Received
                                            <input type="text" class="form-control" name="prevSchoolAwards">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Status for School Year
                            <select name="statusSchoolYear" class="form-control" required>
                                <option value="Transferee">Transferee</option>
                                <option value="Old Student">Old Student</option>
                                <option value="New Student">New Student</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Status
                            <select name="schoolStatus" class="form-control" required>
                                <option value="Working Student">Working Student</option>
                                <option value="Paying">Paying</option>
                                <option value="Scholarship Grantee">Scholarship Grantee</option>
                                <option value="Applied for a Scholarship">Applied for a Scholarship</option>
                            </select>
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
                                            <input type="text" class="form-control" name="work">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Area
                                            <input type="text" class="form-control" name="area">
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
                                            <input type="text" class="form-control" name="payeeName">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Relationship
                                            <input type="text" class="form-control" name="relationship">
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
                                            <input type="text" class="form-control" name="sponsor">
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
                                            <input type="text" class="form-control" name="scholarship">
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
                                            <input type="text" class="form-control" name="firstChoice">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Reason
                                            <input type="text" class="form-control" name="firstReason">
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
                                            <input type="text" class="form-control" name="secondChoice">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Reason
                                            <input type="text" class="form-control" name="secondReason">
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
                                            <input type="text" class="form-control" name="thirdChoice">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Reason
                                            <input type="text" class="form-control" name="thirdReason">
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
                                            <input type="text" class="form-control" name="enrolledStrand" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mt-4">
                                            <i class="bi bi-person-fill"></i> Reason
                                            <input type="text" class="form-control" name="enrolledStrandReason" required>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Interviewers Comment
                            <textarea name="interviewersComment" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="container-fluid bg-dark p-3 color-white">
                        <div class="text-light"><i class="bi bi-pencil-fill"></i> Other Information</div>
                    </div>
                    <div class="container-fluid p-3">
                        <div class="form-group mt-4">
                            <b><i class="bi bi-person-fill"></i> Health Conditions</b>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Disabilities/Impairement
                            <input type="text" class="form-control" name="disabilities">
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Chronic Illnesses
                            <input type="text" class="form-control" name="chronicIllness">
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Accident Experience
                            <input type="text" class="form-control" name="accidentExperience">
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Operations Experience
                            <input type="text" class="form-control" name="operationsExperience">
                        </div>

                        <div class="form-group mt-4">
                            <b><i class="bi bi-person-fill"></i> Psychological Health</b>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Psychological Disorder
                            <input type="text" class="form-control" name="phsycologicalDisorder">
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Diagnosed By
                            <input type="text" class="form-control" name="diagnosedBy">
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i>Date Diagnosis
                            <input type="text" class="form-control" name="diagnosisDate">
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Address of Clinic
                            <input type="text" class="form-control" name="clinicAddress">
                        </div>


                        <div class="form-group mt-4">
                            <b><i class="bi bi-person-fill"></i> Self Evaluation</b>
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Goals
                            <input type="text" class="form-control" name="goals">
                        </div>
                        <div class="form-group mt-4">
                            <i class="bi bi-person-fill"></i> Present Concerns/Problems
                            <input type="text" class="form-control" name="presentConcerns">
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
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary" name="subForm">SUBMIT FORM</button>
                    </div>
            </form>

        </div>

    </div>

</body>

</html>