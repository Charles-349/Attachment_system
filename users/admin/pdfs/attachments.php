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
    $this->Cell(80,10,'Available Attachment Opportunities',1,0,'C');
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
    $display_heading = array('id'=> 'Serial', 'title'=> 'Title','cname'=>"Company", 'category'=> 'Category', 'location'=> 'Location', 'startdate'=> 'Start', 'description'=> 'Description');

    $result = mysqli_query($conn, "SELECT id, title, cname, category, location, startdate, description FROM tbl_attachments") or die("database error:". mysqli_error($conn));

    $pdf = new PDF('P', 'mm', 'A4');
    //header
    

    $pdf->AddPage();
    //foter page
    $pdf->Ln();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',5);
    $pdf->Cell(10, 8, $display_heading["id"], 1);
    $pdf->Cell(25, 8, $display_heading["title"], 1);
    $pdf->Cell(25, 8, $display_heading["cname"], 1);
    $pdf->Cell(20, 8, $display_heading["category"], 1);
    $pdf->Cell(25, 8, $display_heading["location"], 1);
    $pdf->Cell(25, 8, $display_heading["startdate"], 1);
    $pdf->Cell(60, 8, $display_heading["description"], 1);
    // foreach($header as $heading) {
    // $pdf->Cell(40,8,$display_heading[$heading['Field']],3);
    // }
    foreach($result as $row) {
    $pdf->Ln();
    $pdf->Cell(10, 8, $row["id"], 1);
    $pdf->SetFont('Arial','B',5);
    $pdf->Cell(25, 8, $row["title"], 1);
    // $pdf->SetFont('Arial','B',8);
    $pdf->Cell(25, 8, $row["cname"], 1);
    $pdf->Cell(20, 8, $row["category"], 1);
    $pdf->Cell(25, 8, $row["location"], 1);
    $pdf->Cell(25, 8, $row["startdate"], 1);
    $pdf->Cell(60, 8, $row["description"], 1);
}
$pdf->Output();

// }
?>