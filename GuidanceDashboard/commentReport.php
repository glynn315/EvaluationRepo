<?php
require_once('../tcpdf/tcpdf.php');
require '../Configuration/connectionConf.php';
if (isset($_REQUEST["facultyId"])) {
    $facultyId = $_REQUEST["facultyId"];

    $conn1 = mysqli_query($db, "SELECT * FROM facultyformtable WHERE facultyId = '$facultyId'");
    while ($row = mysqli_fetch_array($conn1)) {
        $NAME = $row['facultyFname'] . ' ' . $row['facultyLname'];

        $query1 = "SELECT commenttableform.facultyID,commenttableform.teachersBehavior FROM commenttableform WHERE commenttableform.facultyID='$facultyId' AND commenttableform.commentStatus = 'ACTIVE' LIMIT 10;";
        $result1 = $db->query($query1);
    }

    




    class PDF extends TCPDF
    {
        public function Header()
        {
            $imageFile = K_PATH_IMAGES . 'header.png';
            $this->Image($imageFile, 12, 5, 190, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $this->SetFont('times', 'B', 12);
            $this->Ln(30);
            $this->Cell(0, 0, 'Performance Appraisal System for Teachers', 0, 1, 'C');

            $this->Cell(0, 0, 'Second Semester, AY 2022-2023', 0, 1, 'C');
            $this->SetFont('times', 'B', 14);
            $this->Ln(5);
            $this->Cell(0, 0, 'Student Evaluation of Teacher' . "'" . ' s Performance (SETP)', 0, 1, 'C');
        }

        public function Footer()
        {
            $this->Ln(2);
            $this->Cell('23', '', 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');

        }

    }

    // create new PDF document
    $pageLayout = array(216, 356); //  or array($height, $width) 
    $pdf = new PDF('p', 'mm', $pageLayout, true, 'UTF-8', false);

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
    $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
    $pdf->SetFont('helvetica', '', 14, '', true);




    $pdf->AddPage();
    $txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
    $pdf->SetFont('Times', '', 12);
    $pdf->Ln(35);

    $leftMargin = 2000; // Left margin in millimeters
    $html = '
    <div>
        <table width="70%"  style="margin-left:10px;">
            <tr>
                <td>  Name of teacher:</td>
                <td><b>' . $NAME . '</b></td>
            </tr>
        </table>
    </div>
    ';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Cell(180, 20, 'A. TEACHERS BEHAVIOR', 1, 0, 'L');
    $pdf->Ln(10);
    $query1 = "SELECT commenttableform.facultyID,commenttableform.teachersBehavior FROM commenttableform WHERE commenttableform.facultyID='$facultyId' AND commenttableform.commentStatus = 'ACTIVE' LIMIT 10;";
    $result1 = $db->query($query1);
    while ($row = mysqli_fetch_array($result1)) {
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 11);
        $Question = $row['teachersBehavior'];
        $pdf->Cell(180, 10, $Question, 1, 0, 'L');

    }
    $pdf->Ln(10);
    $pdf->Cell(180, 20, 'B. TEACHING PROCEDURES', 1, 0, 'L');
    $pdf->Ln(10);
    $query1 = "SELECT commenttableform.facultyID,commenttableform.teachingProcedure FROM commenttableform WHERE commenttableform.facultyID='$facultyId' AND commenttableform.commentStatus = 'ACTIVE' LIMIT 10;";
    $result1 = $db->query($query1);
    while ($row = mysqli_fetch_array($result1)) {
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 11);
        $Question = $row['teachingProcedure'];
        $pdf->Cell(180, 10, $Question, 1, 0, 'L');

    }
    $pdf->Ln(10);
    $pdf->Cell(180, 20, 'C. ONLINE CLASS MANAGEMENT', 1, 0, 'L');
    $pdf->Ln(10);
    $query1 = "SELECT commenttableform.facultyID,commenttableform.onlineClassManagement FROM commenttableform WHERE commenttableform.facultyID='$facultyId' AND commenttableform.commentStatus = 'ACTIVE' LIMIT 10;";
    $result1 = $db->query($query1);
    while ($row = mysqli_fetch_array($result1)) {
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 11);
        $Question = $row['onlineClassManagement'];
        $pdf->Cell(180, 10, $Question, 1, 0, 'L');

    }
    }

$pdf->Output('EVALUATION RESULT', 'I');