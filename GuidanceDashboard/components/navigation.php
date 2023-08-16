
<?php
require '../Configuration/connectionConf.php';


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
        width: 1000px;
        transition: 0.5s;
        border-radius: 10px;
        margin-left: 10px;
        color: #000;
    }

    .main {
        margin-left: 17%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    .khaki
    {
        background-color: #c6ae96;
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
        <img src="../IMAGES/logo.png" alt="" srcset="" width="50%" class="mx-auto d-block">
        <p class="text-center">Holy Child Central Colleges Evaluation and Profiling System</p>
    <hr>
    <a href="guidanceIndex.php" class="nav-link align-middle px-0 nav-color">
        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"> HOME</span>
    </a>
    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
        <i class="fs-4 bi-person-square"></i> <span class="ms-1 d-none d-sm-inline">ACCOUNTS MANAGEMENT</span> </a>
    <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
        <li class="w-100">
            <a href="studentAccountManagement.php" class="nav-link px-0"><i class="bi bi-people-fill"></i> <span
                    class="d-none d-sm-inline">STUDENTS ACCOUNTS</span></a>
        </li>
        <li>
            <a href="facultyAccountManagement.php" class="nav-link px-0"><i class="bi bi-people-fill"></i> <span
                    class="d-none d-sm-inline">TEACHERS ACCOUNT</span></a>
        </li>
        <li>
            <a href="guidanceAccountManagement.php" class="nav-link px-0" target="_blank"><i class="bi bi-people-fill"></i> <span
                    class="d-none d-sm-inline">GUIDANCE ACCOUNT</span></a>
        </li>
    </ul>
    <a href="studentConf.php" class="nav-link px-0 align-middle">
        <i class="fs-4 bi-ui-radios"></i> <span class="ms-1 d-none d-sm-inline">STUDENT CONFIRMATION</span></a>
    <a href="evaluationForm.php" class="nav-link px-0 align-middle">
        <i class="fs-4 bi-ui-radios"></i> <span class="ms-1 d-none d-sm-inline">FORMS</span></a>
    <a href="evaluationResult.php" class="nav-link px-0 align-middle ">
        <i class="fs-4 bi-graph-up-arrow"></i> <span class="ms-1 d-none d-sm-inline">RESULTS</span></a>
    <a href="classesModule.php" class="nav-link px-0 align-middle ">
        <i class="fs-4 bi-diagram-3-fill"></i> <span class="ms-1 d-none d-sm-inline">CLASSES</span></a>
    <a href="departmentForm.php" class="nav-link px-0 align-middle ">
        <i class="fs-4 bi-diagram-3-fill"></i> <span class="ms-1 d-none d-sm-inline">Department</span></a>
    <a href="subjectForm.php" class="nav-link px-0 align-middle ">
        <i class="fs-4 bi-diagram-3-fill"></i> <span class="ms-1 d-none d-sm-inline">Subjects</span></a>
    <a href="announceModule.php" class="nav-link px-0 align-middle ">
        <i class="fs-4 bi-megaphone-fill"></i> <span class="ms-1 d-none d-sm-inline">Announcement</span>
    </a>
    <a href="maintenanceForm.php" class="nav-link px-0 align-middle ">
        <i class="fs-4 bi-gear-wide-connected"></i> <span class="ms-1 d-none d-sm-inline">Settings</span>
    </a>
    <hr>

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