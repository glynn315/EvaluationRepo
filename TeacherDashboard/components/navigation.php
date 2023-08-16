

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
    <img src="../IMAGES/logo.png" alt="" srcset="" width="100%">
    <hr>
    <a href="facultyDashboard.php" class="nav-link align-middle px-0 nav-color">
        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"> HOME</span>
    </a>
    <a href="resultTabularRetrieval.php" class="nav-link align-middle px-0 nav-color">
        <i class="fs-4 bi-file-earmark-text"></i> <span class="ms-1 d-none d-sm-inline"> TABULAR RESULT</span>
    </a>
    <a href="resultRetrieval.php" class="nav-link align-middle px-0 nav-color">
        <i class="fs-4 bi-graph-up-arrow"></i> <span class="ms-1 d-none d-sm-inline"> STATISTICAL REPORT</span>
    </a>
    <a href="commentRetrieval.php" class="nav-link align-middle px-0 nav-color">
        <i class="fs-4 bi-chat-right-dots"></i> <span class="ms-1 d-none d-sm-inline"> COMMENTS</span>
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