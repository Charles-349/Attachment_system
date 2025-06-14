<?php
//include connection file 
include "includes/config.php";
include_once('libs/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Employee List',1,0,'C');
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

// $student_view = mysqli_query($conn, "CREATE VIEW student_view AS SELECT fname, lname, regno, supervisor, csupervisor, course, year FROM students ");

// if($student_view){
    $display_heading = array('fname'=> 'FirstName', 'lname'=> 'LastName','regno'=>"Reg. No.", 'supervisor'=> 'Supervisor', 'csupervisor'=> 'CSupervisor', 'course'=> 'Course', 'year'=> 'Year');

    $result = mysqli_query($conn, "SELECT fname, lname, regno, supervisor, csupervisor, course, year FROM student_view") or die("database error:". mysqli_error($conn));
    $header = mysqli_query($conn, "SHOW columns FROM student_view");

    $pdf = new PDF();
    //header
    $pdf->AddPage();
    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',5);
    foreach($header as $heading) {
    $pdf->Cell(20,8,$display_heading[$heading['Field']],1);
    }
    foreach($result as $row) {
    $pdf->Ln();
    foreach($row as $column)
    $pdf->Cell(20,8,$column,1);
    }
    $pdf->Output();

// }
?>