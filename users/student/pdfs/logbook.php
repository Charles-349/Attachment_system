<?php
//include connection file 
include "../includes/config.php";
include_once('../libs/fpdf.php');
$sid  = $_GET['sid'];    

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    include "../includes/config.php";
    $this->Image('../images/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Logbook ',1,0,'C');
    $this->Ln(20);
    $this->Ln();
    $sid  = $_GET['sid'];   
    $studentres = $conn->query("SELECT * FROM students where uniqueid = '$sid'");

    if (mysqli_num_rows($studentres) >= 1){
        $studentarray = mysqli_fetch_assoc($studentres);
    }else{
        ?>
        <script>
            alert("Invalid Student ID");
            location.href = "../assignedstudents.php";
        </script>
        <?php
    }
    $name = $studentarray['fname'] ." ". $studentarray['lname']. " - ". $studentarray['regno'];
    $this->Cell(80,10, $name,1,0,'C');
    // Line break
    $this->Ln();
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
    $pdf = new PDF('P', 'mm', 'A4');
    //header

    // $sid  = $_GET['sid'];    
    // $studentres = $conn->query("SELECT * FROM students where uniqueid = '$sid'");
    
    // if (mysqli_num_rows($studentres) >= 1){
    //     $studentarray = mysqli_fetch_assoc($studentres);
    // }
    
    $checkresult  = mysqli_query($conn, "SELECT * FROM `tbl_registered_attachments` where studentid='$sid'");

    for ($i=1; $i <= 8; $i++) { 
        $logresult  = mysqli_query($conn, "SELECT * FROM `tbl_logbook` where studentid='$sid' and week='$i' ");
        
        $datecount = $i-1;
        $mon_date = date("Y-m-d", strtotime(' +'.($datecount * 7+1).' day'));
        $tue_date = date("Y-m-d", strtotime(' +'.($datecount * 7+2).' day'));
        $wen_date = date("Y-m-d", strtotime(' +'.($datecount * 7+3).' day'));
        $thur_date = date("Y-m-d", strtotime(' +'.($datecount * 7+4).' day'));
        $fri_date = date("Y-m-d", strtotime(' +'.($datecount * 7+5).' day'));
        $sat_date = date("Y-m-d", strtotime(' +'.($datecount * 7+6).' day'));
        $sun_date = date("Y-m-d", strtotime(' +'.($datecount * 7+7).' day'));
        
        $mondayjob = "";
        $mondayskill = "";
        $tuesdayjob = "";
        $tuesdayskill = "";
        $wednesdayjob = "";
        $wednesdayskill = "";
        $thursdayjob = "";
        $thursdayskill = "";
        $fridayjob = "";
        $fridayskill = "";
        
        if (mysqli_num_rows($logresult) > 0) {
            $row = mysqli_fetch_assoc($logresult);
            $mondayjob = $row['mondayjob'];
            $mondayskill = $row['mondayskill'];
            $tuesdayjob = $row['tuesdayjob'];
            $tuesdayskill = $row['tuesdayskill'];
            $wednesdayjob = $row['wednesdayjob'];
            $wednesdayskill = $row['wednesdayskill'];
            $thursdayjob = $row['thursdayjob'];
            $thursdayskill = $row['thursdayskill'];
            $fridayjob = $row['fridayjob'];
            $fridayskill = $row['fridayskill'];
        }


        $pdf->AddPage();
        //foter page
        $pdf->Ln();
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(30, 10, "Week ".$i, 0);
        $pdf->Ln();
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30, 10, "Day", 1);
        $pdf->Cell(80, 10, "Job Assigned To Student", 1);
        $pdf->Cell(80, 10, "Special Skills Acquired", 1);
        //foter page
        $pdf->Ln();
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(30, 25, "Monday \n".$mon_date, 1);
        $pdf->Cell(80, 25, $mondayjob, 1);
        $pdf->Cell(80, 25, $mondayskill, 1);
        
        $pdf->Ln();
        $pdf->Cell(30, 25, "Tuesday \n".$tue_date, 1);
        $pdf->Cell(80, 25, $tuesdayjob, 1);
        $pdf->Cell(80, 25, $tuesdayskill, 1);

        $pdf->Ln();
        $pdf->Cell(30, 25, "Wednesday \n".$wen_date, 1);
        $pdf->Cell(80, 25, $wednesdayjob, 1);
        $pdf->Cell(80, 25, $wednesdayskill, 1);

        $pdf->Ln();
        $pdf->Cell(30, 25, "Thursday \n".$thur_date, 1);
        $pdf->Cell(80, 25, $thursdayjob, 1);
        $pdf->Cell(80, 25, $thursdayskill, 1);

        $pdf->Ln();
        $pdf->Cell(30, 25, "Friday \n".$fri_date, 1);
        $pdf->Cell(80, 25, $fridayjob, 1);
        $pdf->Cell(80, 25, $fridayskill, 1);
    }
$pdf->Output();

// }
?>