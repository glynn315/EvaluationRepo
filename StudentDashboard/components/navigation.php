<?php
require '../Configuration/connectionConf.php';

$query8 = "SELECT * FROM studentupdatesettings WHERE settingsID = '1';";
$result8 = mysqli_query($db, $query8);
$row8 = mysqli_fetch_array($result8);
$setCondition = $row8['enableUpdate'];
$setEvaluation = $row8['enableEvaluation'];
if ($setCondition == 1) {
    $setCondition = "true";
    $link ='updateProfiling.php';
    $linkText = 'UPDATE PROFILING';
    
}
else if ($setCondition == 0) {
    $setCondition = "false";
    $link ='';
    $linkText ='UPDATE PROFILING DISABLE';

}
if ($setEvaluation == 1) {
    $setCondition = "true";
    $link1 ='studentEvaluationForm.php';
    $linkText1 = 'TEACHER EVALUATION';
    
}
else if ($setEvaluation == 0) {
    $setCondition = "false";
    $link1 ='';
    $linkText1 ='EVALUATION DISABLE';

}
?>

<style>
    .sidenav {
        height: 100%;
        width: 17%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;

        background-color: #c6ae96;
        overflow-x: hidden;
        padding: 20px 20px;
    }

    .sidenav a {
        text-decoration: none;
        font-size: 1em;
        color: #000;
        display: block;
        padding: 10px;
    }

    .sidenav a:hover {
        transition: 0.5s;
        border-radius: 10px;
        margin-left: 10px;
    }

    .main {
        margin-left: 17%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>
<div class="sidenav">
        <img src="../IMAGES/logo.png" alt="" srcset="" width="100%">
    <hr>
    <a href="studentIndex.php" class="nav-link align-middle px-0 nav-color">
        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"> HOME</span>
    </a>
    <a href="studentProfiling.php" class="nav-link px-0 align-middle ">
        <i class="fs-4 bi-file-text-fill"></i> <span class="ms-1 d-none d-sm-inline">PROFILING</span></a>
    <?php
        echo '<a href="' . $link1 . '" class="nav-link px-0 align-middle">';
        echo '<i class="fs-4 bi-file-earmark-post"></i> <span class="ms-1 d-none d-sm-inline">' . $linkText1 . '</span>';
        echo '</a>';
    ?>
    <?php
        echo '<a href="' . $link . '" class="nav-link px-0 align-middle">';
        echo '<i class="fs-4 bi bi-pen-fill"></i> <span class="ms-1 d-none d-sm-inline">' . $linkText . '</span>';
        echo '</a>';
    ?>
    <div class="dropdown pb-4">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none d-sm-inline mx-1"><?php echo $login_Name ; ?></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownUser1" style="width:100%; background-color:transparent;border:none;">
            <li><a class="dropdown-item" href="../index.php">Sign out</a></li>
        </ul>
    </div>
</div>