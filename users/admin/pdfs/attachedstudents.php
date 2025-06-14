<?php
//include connection file 
include "../includes/config.php";
include_once('../libs/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../images/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Students On Attachment',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
    $result = mysqli_query($conn, "SELECT id, studentid, companyname, companyaddress, companylocation, companycontact, startdate, role, duration FROM tbl_registered_attachments") or die("database error:". mysqli_error($conn));

    $pdf = new PDF('P', 'mm', 'A4');
    //header
    

    $pdf->AddPage();
    //foter page
    $pdf->Ln();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',5);
    $pdf->Cell(10, 8, "id", 1);
    $pdf->Cell(25, 8, "Student", 1);
    $pdf->Cell(25, 8, "Company Name", 1);
    $pdf->Cell(25, 8, "Company Location", 1);
    $pdf->Cell(25, 8, "Company Address", 1);
    $pdf->Cell(25, 8, "Company Contact", 1);
    $pdf->Cell(25, 8, "role", 1);
    $pdf->Cell(10, 8, "Duration", 1);
    $pdf->Cell(25, 8, "startdate", 1);

    $count = 0;
    foreach($result as $row) {
        $count += 1;

        $studentresult = mysqli_query($conn, "SELECT regno FROM students where uniqueid = $row[studentid]") or die("database error:". mysqli_error($conn));
        if(mysqli_num_rows($studentresult)>0){
            $studentrow = mysqli_fetch_array($studentresult);
            $regno = $studentrow["regno"];
        }else{
            $regno = $row["studentid"];
        }
              

        $pdf->Ln();
        $pdf->Cell(10, 8, $count, 1);
        $pdf->Cell(25, 8, $regno, 1);
        $pdf->Cell(25, 8, $row["companyname"], 1);
        $pdf->Cell(25, 8, $row["companylocation"], 1);
        $pdf->Cell(25, 8, $row["companyaddress"], 1);
        $pdf->Cell(25, 8, $row["companycontact"], 1);
        $pdf->Cell(25, 8, $row["role"], 1);
        $pdf->Cell(10, 8, $row["duration"], 1);
        $pdf->Cell(25, 8, $row["startdate"], 1);
    }
$pdf->Output();

// }
?>