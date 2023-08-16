<?php
require_once('../tcpdf/tcpdf.php');
require '../configuration/connectConfiguration.php';


$conn1 = mysqli_query($conn, "SELECT studentFname,studentLname,programCode,studentCount,studentYear FROM studentuseraccount WHERE studentStatus = 'Alumni'");
while ($row = mysqli_fetch_array($conn1)) {
    $NAME = $row['studentFname'] . ' ' . $row['studentLname'];
}

    class PDF extends TCPDF
    {
        public function Header()
        {
            $date = date('Y-m-d');
            $imageFile = K_PATH_IMAGES . 'header.png';
            $this->Image($imageFile, 12, 5, 190, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $this->SetFont('times', 'B', 12);
            $this->Ln(30);
            $this->Cell(0, 0, 'Holy Child Central Colleges, Inc. Alumni Report' , 0, 1, 'C');
            $this->SetFont('times', 'B', 14);
            $this->Cell(0, 0, 'List of ALUMNI', 0, 1, 'C');
            $this->Ln(2);
            $this->SetFont('times', '', 10);
            $this->Cell(0, 0, 'Printed Date : ' . $date, 0, 1, 'C');
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

    $pdf->SetFont('Times', 'B', 11);
    // Add table headers
    $pdf->Cell(35, 5, 'Student ID', 1, 0, 'L');
    $pdf->Cell(70, 5, 'Name', 1, 0, 'L');
    $pdf->Cell(40, 5, 'Course', 1, 0, 'L');
    $pdf->Cell(40, 5, 'Batch', 1, 0, 'C');
    $pdf->Ln(5);
    $sql = "SELECT  studentFname,studentLname,programCode,studentCount,studentYear FROM studentuseraccount WHERE studentStatus = 'Alumni' ORDER BY studentYear DESC ";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $pdf->SetFont('Times', '', 11);
        $ID =$row['studentCount'];
        $Name =  $row['studentFname'] . ' ' . $row['studentLname'];
        $Course =$row['programCode'];
        $Batch = $row['studentYear'];
        $pdf->Cell(35, 5, $ID, 1, 0, 'L');
        $pdf->Cell(70, 5, $Name, 1, 0, 'L');
        $pdf->Cell(40, 5, $Course, 1, 0, 'L');
        $pdf->Cell(40, 5, $Batch, 1, 0, 'C');
        $pdf->Ln(5);
    }


$pdf->Output('EVALUATION RESULT', 'I');