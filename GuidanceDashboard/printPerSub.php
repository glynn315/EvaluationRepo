<?php
require_once('../tcpdf/tcpdf.php');
require '../Configuration/connectionConf.php';
if (isset($_REQUEST["facultyId"])) {
    if (isset($_REQUEST["subjectID"])) {
        $subjectID = $_REQUEST["subjectID"];
        $facultyId = $_REQUEST["facultyId"];
        $conn1 = mysqli_query($db, "SELECT * FROM facultyformtable WHERE facultyId = '$facultyId'");
        while ($row = mysqli_fetch_array($conn1)) {
            $NAME = $row['facultyFname'] . ' ' . $row['facultyLname'];
        }

        $sql = "SELECT questionformtable.questionType,AVG(resulttable.rates) AS RESULT FROM resulttable INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId INNER JOIN questionformtable ON questionformtable.questionID = resulttable.questionID WHERE facultyformtable.facultyId='$facultyId' AND subjectID='$subjectID' AND resulttable.resultStatus = 'ACTIVE' GROUP BY questionformtable.questionType; ";
        $result = $db->query($sql);

    



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
        <tr>
            <td>  Subject:</td>
            <td><b>' . $subjectID . '</b></td>
        </tr>
    </table>
</div>
';

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->SetFont('Times', '', 12);
    $pdf->Write(0, '    Rate the teacher on each item following the given rating scale', '', 0, 'L', true, 0, false, false, 0);
    $pdf->Ln(5);
    $html = '
    <div>
        <table width="100%"  style="margin-left:10px;">
            <tr>
                <td>  5-Excellent</td>
                <td>  4-Very Good</td>
                <td>  3-Good</td>
                <td>  2-Fair</td>
                <td>  1-Poor</td>
            </tr>
        </table>
    </div>
    ';

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->SetFont('Times', 'B', 11);
    // Add table headers
    $pdf->Cell(155, 5, 'A. TEACHERS BEHAVIOR', 1, 0, 'L');
    $pdf->Cell(30, 5, 'RATING', 1, 0, 'C');
    $pdf->Ln(5);
    $sql = "SELECT questionformtable.questionDescrirption,(resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$facultyId' AND questionformtable.questionType='Teachers Behavior' AND subjectID='$subjectID' AND resulttable.resultStatus = 'ACTIVE' GROUP BY questionformtable.questionDescrirption;";
    $result = $db->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $pdf->SetFont('Times', '', 11);
        $Question = $row['questionDescrirption'];
        $Response = number_format($row['AVERAGE'], 2);
        $pdf->Cell(155, 5, $Question, 1, 0, 'L');
        $pdf->Cell(30, 5, $Response, 1, 0, 'C');
        $pdf->Ln(5);
    }
    $pdf->SetFont('Times', 'B', 11);
    $pdf->Cell(155, 5, 'B. TEACHING PROCEDURE', 1, 0, 'L');
    $pdf->Cell(30, 5, '', 1, 0, 'C');
    $pdf->Ln(5);
    $sql1 = "SELECT questionformtable.questionDescrirption,(resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$facultyId' AND questionformtable.questionType='Teaching Procedures' AND subjectID='$subjectID' AND resulttable.resultStatus = 'ACTIVE' GROUP BY questionformtable.questionDescrirption;";
    $result1 = $db->query($sql1);
    while ($row = mysqli_fetch_array($result1)) {
        $pdf->SetFont('Times', '', 11);
        $Question = $row['questionDescrirption'];
        $Response = number_format($row['AVERAGE'], 2);
        $pdf->Cell(155, 5, $Question, 1, 0, 'L');
        $pdf->Cell(30, 5, $Response, 1, 0, 'C');
        $pdf->Ln(5);
    }
    $pdf->SetFont('Times', 'B', 11);
    $pdf->Cell(155, 5, 'C. Online Class Management', 1, 0, 'L');
    $pdf->Cell(30, 5, '', 1, 0, 'C');
    $pdf->Ln(5);
    $sql2 = "SELECT questionformtable.questionDescrirption,(resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$facultyId' AND questionformtable.questionType='Online Class Management' AND subjectID='$subjectID' AND resulttable.resultStatus = 'ACTIVE' GROUP BY questionformtable.questionDescrirption;";
    $result2 = $db->query($sql2);
    while ($row = mysqli_fetch_array($result2)) {
        $pdf->SetFont('Times', '', 11);
        $Question = $row['questionDescrirption'];
        $Response = number_format($row['AVERAGE'], 2);
        $pdf->Cell(155, 5, $Question, 1, 0, 'L');
        $pdf->Cell(30, 5, $Response, 1, 0, 'C');
        $pdf->Ln(5);
    }
    $pdf->Ln(15);
    $pdf->SetFont('Times', 'B', 11);
    $pdf->Cell(70, 5, 'Components', 1, 0, 'C');
    $pdf->Cell(60, 5, 'Average', 1, 0, 'C');
    $pdf->Cell(55, 5, 'Description', 1, 0, 'C');
    $pdf->Ln(5);

    $sql2 = "SELECT (resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$facultyId' AND questionformtable.questionType='Online Class Management' AND resulttable.resultStatus = 'ACTIVE' GROUP BY facultyformtable.facultyId;";
    $result2 = $db->query($sql2);

    $sql11 = "SELECT (resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$facultyId' AND questionformtable.questionType='Teachers Behavior' AND resulttable.resultStatus = 'ACTIVE' GROUP BY facultyformtable.facultyId;";
    $result11 = $db->query($sql11);

    $sql12 = "SELECT (resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$facultyId' AND questionformtable.questionType='Teaching Procedures' AND resulttable.resultStatus = 'ACTIVE' GROUP BY facultyformtable.facultyId;";
    $result12 = $db->query($sql12);

    $sql13 = "SELECT (resulttable.rates),AVG(resulttable.rates) AS AVERAGE,facultyformtable.facultyId FROM resulttable INNER JOIN questionformtable ON resulttable.questionID = questionformtable.questionID INNER JOIN facultyformtable ON facultyformtable.facultyId = resulttable.facultyId WHERE facultyformtable.facultyId = '$facultyId' AND questionformtable.questionType='Online Class Management' AND resulttable.resultStatus = 'ACTIVE' GROUP BY facultyformtable.facultyId;";
    $result13 = $db->query($sql13);

    while ($row = mysqli_fetch_array($result11)) {
        $pdf->SetFont('Times', '', 11);
        $Response = number_format($row['AVERAGE'], 2);
        $rating = '';
        if ($row["AVERAGE"] <= 1) {
            $rating = 'Poor';
        } else if ($row["AVERAGE"] <= 2) {
            $rating = 'Fair';
        } else if ($row["AVERAGE"] <= 3) {
            $rating = 'Good';
        } else if ($row["AVERAGE"] <= 4) {
            $rating = 'Very Good';
        } else if ($row["AVERAGE"] <= 5) {
            $rating = 'Excellent';
        }



        $pdf->Cell(70, 5, 'TEACHERS BEHAVIOR', 1, 0, 'L');
        $pdf->Cell(60, 5, $Response, 1, 0, 'C');
        $pdf->Cell(55, 5, $rating, 1, 0, 'C');
    }
    $pdf->Ln(5);
    while ($row = mysqli_fetch_array($result12)) {
        $Response = number_format($row['AVERAGE'], 2);
        $rating = '';
        if ($row["AVERAGE"] <= 1) {
            $rating = 'Poor';
        } else if ($row["AVERAGE"] <= 2) {
            $rating = 'Fair';
        } else if ($row["AVERAGE"] <= 3) {
            $rating = 'Good';
        } else if ($row["AVERAGE"] <= 4) {
            $rating = 'Very Good';
        } else if ($row["AVERAGE"] <= 5) {
            $rating = 'Excellent';
        }
        $pdf->Cell(70, 5, 'TEACHING PROCEDURE', 1, 0, 'L');
        $pdf->Cell(60, 5, $Response, 1, 0, 'C');
        $pdf->Cell(55, 5, $rating, 1, 0, 'C');
    }
    $pdf->Ln(5);
    while ($row = mysqli_fetch_array($result13)) {
        $Response = number_format($row['AVERAGE'], 2);
        $rating = '';
        if ($row["AVERAGE"] <= 1) {
            $rating = 'Poor';
        } else if ($row["AVERAGE"] <= 2) {
            $rating = 'Fair';
        } else if ($row["AVERAGE"] <= 3) {
            $rating = 'Good';
        } else if ($row["AVERAGE"] <= 4) {
            $rating = 'Very Good';
        } else if ($row["AVERAGE"] <= 5) {
            $rating = 'Excellent';
        }
        $pdf->Cell(70, 5, 'ONLINE CLASS MANAGEMENT', 1, 0, 'L');
        $pdf->Cell(60, 5, $Response, 1, 0, 'C');
        $pdf->Cell(55, 5, $rating, 1, 0, 'C');
    }
    $pdf->Ln(15);
    $pdf->SetFont('Times', 'B', 11);
    $pdf->Cell(70, 5, '', 1, 0, 'C');
    $pdf->Cell(60, 5, 'Signature', 1, 0, 'C');
    $pdf->Cell(55, 5, 'Date', 1, 0, 'C');
    $pdf->Ln(5);
    $pdf->SetFont('Times', '', 11);
    $pdf->Cell(70, 5, 'Head, Guidance & Testing Center', 1, 0, 'L');
    $pdf->Cell(60, 5, '', 1, 0, 'C');
    $pdf->Cell(55, 5, '', 1, 0, 'C');
    $pdf->Ln(5);
    $pdf->Cell(70, 5, 'Program Head/Coordinator', 1, 0, 'L');
    $pdf->Cell(60, 5, '', 1, 0, 'C');
    $pdf->Cell(55, 5, '', 1, 0, 'C');
    $pdf->Ln(5);
    $pdf->Cell(70, 5, 'Academic Director', 1, 0, 'L');
    $pdf->Cell(60, 5, '', 1, 0, 'C');
    $pdf->Cell(55, 5, '', 1, 0, 'C');
    $pdf->Ln(5);
    $pdf->Cell(70, 5, 'Executive Vice Principal', 1, 0, 'L');
    $pdf->Cell(60, 5, '', 1, 0, 'C');
    $pdf->Cell(55, 5, '', 1, 0, 'C');


    }
}

$pdf->Output('EVALUATION RESULT', 'I');