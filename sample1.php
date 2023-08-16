<!DOCTYPE html>
<html>
<head>
    <title>Select Tag Value Change</title>
</head>
<body>
    <form method="post">
        <label for="select1">Select 1:</label>
        <select id="select1" name="select1" onchange="updateSelect2Options()">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "hcccidb");

            $query = "SELECT facultyformtable.facultyId,facultyformtable.facultyFname,facultyformtable.facultyLname,classinfotable.correspondingYear,classinfotable.correspondingSection,classinfotable.departmentCode,classinfotable.subjectID FROM classinfotable INNER JOIN facultyformtable ON facultyformtable.facultyId = classinfotable.facultyId WHERE classinfotable.departmentCode = 'HC-BSIT' AND classinfotable.correspondingYear = '4th Year' AND classinfotable.correspondingSection = 'A';";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['facultyId'] . '">' . $row['facultyFname'] . '</option>';
            }
            ?>
        </select>

        <label for="select2">Select 2:</label>
        <select id="select2" name="select2">
            <?php
            if (isset($_POST['select1'])) {
                $selectedValue = $_POST['select1'];

                // Perform necessary processing with $selectedValue to fetch the options from the database
                // Replace 'your_db_query_here' with your actual database query to fetch the desired options
                // For example:
                $query = "SELECT facultyformtable.facultyId,classinfotable.subjectID FROM classinfotable INNER JOIN facultyformtable ON facultyformtable.facultyId = classinfotable.facultyId WHERE classinfotable.departmentCode = 'HC-BSIT' AND classinfotable.correspondingYear = '4th Year' AND classinfotable.correspondingSection = 'A' AND facultyformtable.facultyId = '$selectedValue'";
                $result = mysqli_query($connection, $query);


                foreach ($result as $option) {
                    echo '<option value="' . $option['subjectID'] . '">' . $option['subjectID'] . '</option>';
                }
            }
            ?>
        </select>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
