<?php
$host = 'localhost'; 
$dbname = 'hcccidb'; 
$username = 'root'; 
$password = ''; 

$db= mysqli_connect($host, $username, $password, $dbname);

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
    <div class="main">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col py-3">
                    <div class="container-fluid">
                        <form method="POST">
                            <h2><i class="bi bi-ui-radios"></i> Evaluation Form</h2>
                            <hr>
                            <table>
                                <tr>
                                    <td>Faculty name</td>
                                    <td>Subject</td>
                                </tr>
                                <tr>
                                    <button type="submit" name="submet">saascascasc</button>
                                    <td>
                                        <select name="teacherID" class="form-control" require>
                                            <?php
                                            $res = mysqli_query($db, "SELECT facultyformtable.facultyId,facultyformtable.facultyFname,facultyformtable.facultyLname,classinfotable.correspondingYear,classinfotable.correspondingSection,classinfotable.departmentCode,classinfotable.subjectID FROM classinfotable INNER JOIN facultyformtable ON facultyformtable.facultyId = classinfotable.facultyId WHERE classinfotable.departmentCode = 'HC-BSIT' AND classinfotable.correspondingYear = '4th Year' AND classinfotable.correspondingSection = 'A' GROUP BY facultyformtable.facultyFname,facultyformtable.facultyLname;");
                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                <option value="<?php echo $row['facultyId']; ?>"><?php echo $row['facultyFname'] . ' ' . $row['facultyLname']; ?></option><button type="submit" name="submet">saascascasc</button>
                                                

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        
                                            <?php
                                            echo "<select name='subjectID' class='form-control' require>";
                                            if(isset($_POST["submet"])) {
                                                $res1 = mysqli_query($db, "SELECT facultyformtable.facultyId,classinfotable.subjectID FROM classinfotable INNER JOIN facultyformtable ON facultyformtable.facultyId = classinfotable.facultyId WHERE classinfotable.departmentCode = 'HC-BSIT' AND classinfotable.correspondingYear = '4th Year' AND classinfotable.correspondingSection = 'A' AND facultyformtable.facultyId = '$_POST[teacherID]';");
                                                while ($row = mysqli_fetch_array($res1)) {
                                                    echo "<option value='" . $row['subjectID'] . "'>" . $row['subjectID'] . "</option>";

                                                }
                                                
                                            }
                                            ?>
                                            
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>