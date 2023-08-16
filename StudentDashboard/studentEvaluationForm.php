<?php
require '../Configuration/connectionConf.php';
include('../studentSession.php');
$query = "SELECT * FROM questionformtable WHERE questionType = 'Teachers Behavior'";
$result = mysqli_query($db, $query);

$query1 = "SELECT * FROM questionformtable WHERE questionType = 'Teaching Procedures'";
$result1 = mysqli_query($db, $query1);

$query2 = "SELECT * FROM questionformtable WHERE questionType = 'Online Class Management'";
$result2 = mysqli_query($db, $query2);





if (isset($_POST["subEval"])) {
    $userComment1 = $_POST['comm1'];
    $userComment2 = $_POST['comm2'];
    $userComment3 = $_POST['comm3'];
    function containsMaliciousWords($comment) {

        $badWords = array("wala pulos", "tanga", "abnu");

        $comment = strtolower($comment);
        foreach ($badWords as $word) {
            if (strpos($comment, $word) !== false) {
                return true;
            }
        }

        return false;
    }
    if (containsMaliciousWords($userComment1)) {
        echo
        "
            <script>
                alert('Please Refarin from using badwords or hurtful terms');
            </script>
        ";
    }
    else if (containsMaliciousWords($userComment2)) {
        echo
        "
            <script>
                alert('Please Refarin from using badwords or hurtful terms');
            </script>
        ";
    }
    else if (containsMaliciousWords($userComment3)) {
        echo
        "
            <script>
                alert('Please Refarin from using badwords or hurtful terms');
            </script>
        ";
    }
    else
    {
        $teacherEval = mysqli_real_escape_string($db, $_POST['teacherID']);
        $sql = "SELECT * from resulttable WHERE facultyId = '$teacherEval' AND studentID = '$login_session' AND subjectID = '$_POST[subForm]';";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        if ($count == 0) {
            $qID = $_POST['eval'];
            $rates = $_POST['rate'];
            $subj = $_POST['subForm'];
            $teacher = $_POST['facultyIDfin'];
            foreach ($qID as $ques => $question) {
                $query = "INSERT INTO resulttable (questionID,studentID,facultyId,subjectID ,rates,resultStatus) VALUES('$question','$login_session','$teacher','$subj','$rates[$ques]','ACTIVE')";
                $query_run = mysqli_query($db, $query);
            }
            $query = "INSERT INTO commenttableform(studentID ,facultyId ,teachersBehavior ,teachingProcedure ,onlineClassManagement,commentStatus) VALUES('$login_session','$_POST[teacherID]','$_POST[comm1]','$_POST[comm2]','$_POST[comm3]','ACTIVE')";
            $query_run = mysqli_query($db, $query);
            echo
                "
            <script>
            alert('SUBMITTED');
            document.location.href = 'studentEvaluationForm.php';
            </script>
            ";
        }
        else if ($count != 0) {
            echo
                "
            <script>
            alert('ALREADY EVALUATED');
            document.location.href = 'studentEvaluationForm.php';
            </script>
            ";
        }
        

    }

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
                        <form method="POST">
                            <h2><i class="bi bi-ui-radios"></i> Evaluation Form</h2>
                            <hr>
                            <table width="50%">
                                <tr>
                                    <td width="40%">Faculty name</td>
                                    <td width="20%"></td>
                                    <td width="40%">Subject</td>
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <select name="teacherID" class="form-control" require>
                                            <?php
                                            $res = mysqli_query($db, "SELECT facultyformtable.facultyId,facultyformtable.facultyFname,facultyformtable.facultyLname,classinfotable.correspondingYear,classinfotable.correspondingSection,classinfotable.departmentCode,classinfotable.subjectID FROM classinfotable INNER JOIN facultyformtable ON facultyformtable.facultyId = classinfotable.facultyId WHERE classinfotable.departmentCode = '$cCode' AND classinfotable.correspondingYear = '$Year' AND classinfotable.correspondingSection = '$Section' GROUP BY facultyformtable.facultyFname,facultyformtable.facultyLname;");
                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                <option value="<?php echo $row['facultyId']; ?>"><?php echo $row['facultyFname'] . ' ' . $row['facultyLname']; ?></option><button
                                                    type="submit" name="submet">saascascasc</button>


                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><button type="submit" name="submet" class="btn btn-primary">SELECT</button></td>
                                    <td>

                                        <?php
                                        echo "<select name='subForm' class='form-control' require>";
                                        if (isset($_POST["submet"])) {
                                            $res1 = mysqli_query($db, "SELECT facultyformtable.facultyId,classinfotable.subjectID FROM classinfotable INNER JOIN facultyformtable ON facultyformtable.facultyId = classinfotable.facultyId WHERE classinfotable.departmentCode = 'HC-BSIT' AND classinfotable.correspondingYear = '4th Year' AND classinfotable.correspondingSection = 'A' AND facultyformtable.facultyId = '$_POST[teacherID]';");
                                            $sample = $_POST['teacherID'];
                                            
                                            while ($row = mysqli_fetch_array($res1)) {
                                                echo "<option value='" . $row['subjectID'] . "'>" . $row['subjectID'] . "</option>";

                                            }

                                        }
                                        ?>

                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type="text" name="facultyIDfin" value="<?php echo $sample ?>" hidden>
                            <h3>Teacher’s Behavior</h3>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                        <div class='card mt-1'>
                            <div class='card-header'>
                                Question ID -  <input type='text' name = 'eval[]' value='" . $row["questionID"] . "' style='pointer-events:none;border:none; background:transparent;'>
                            </div>
                            <div class='card-body'>
                                <blockquote class='blockquote mb-0'>
                                <p>" . $row["questionDescrirption"] . "</p>
                                <select class='form-control' name='rate[]'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                </select>
                            </blockquote>
                            </div>
                            
                        </div>";
                                }
                            } else {
                                echo "NO QUESTIONS AVAILABLE";
                            }

                            ?>
                            <h3>Teaching Procedures</h3>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result1)) {
                                    echo "
                        <div class='card mt-1'>
                            <div class='card-header'>
                            Question ID -  <input type='text' name = 'eval[]' value='" . $row["questionID"] . "' style='pointer-events:none;border:none; background:transparent;'>
                            </div>
                            <div class='card-body'>
                                <blockquote class='blockquote mb-0'>
                                    <p>" . $row["questionDescrirption"] . "</p>
                                    <select class='form-control' name='rate[]'>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                    </select>
                                </blockquote>
                            </div>
                            
                        </div>";
                                }
                            } else {
                                echo "NO QUESTIONS AVAILABLE";
                            }

                            ?>
                            <h3>Classroom Management</h3>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    echo "
                        <div class='card mt-1'>
                            <div class='card-header'>
                            Question ID -  <input type='text' name = 'eval[]' value='" . $row["questionID"] . "' style='pointer-events:none;border:none; background:transparent;'>
                            </div>
                            <div class='card-body'>
                                <blockquote class='blockquote mb-0'>
                                    <p>" . $row["questionDescrirption"] . "</p>
                                    <select class='form-control' name='rate[]'>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                    </select>
                                </blockquote>
                            </div>
                            
                        </div>";
                                }
                            } else {
                                echo "NO QUESTIONS AVAILABLE";
                            }

                            ?>
                            <div class="form-group mt-4">
                                COMMENT
                                <textarea name="comm1" class="form-control"
                                    placeholder="COMMENT FOR TEACHER'S BEHAVIOR"></textarea>
                            </div>
                            <div class="form-group mt-4">
                                COMMENT
                                <textarea name="comm2" class="form-control"
                                    placeholder="COMMENT FOR TEACHING PROCEDURES"></textarea>
                            </div>
                            <div class="form-group mt-4">
                                COMMENT
                                <textarea name="comm3" class="form-control"
                                    placeholder="COMMENT FOR ONLINE CLASS MANAGEMENT"></textarea>
                            </div>
                            <div class="modal-footer mt-3">
                                <button type="submit" class="btn btn-primary" name="subEval">SUBMIT EVALUATION</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>