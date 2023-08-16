<?php
require '../Configuration/connectionConf.php';
if (isset($_REQUEST["announceID"])) {
    $announceID = $_REQUEST["announceID"];

    mysqli_query($db, "UPDATE announcementform SET announcementStatus = 'INACTIVE' WHERE announceID = '$announceID';");

            echo
            "
            <script>
            alert('ANNOUNCEMENT REMOVE');
            document.location.href = 'announceModule.php';
            </script>
            ";
}

?>