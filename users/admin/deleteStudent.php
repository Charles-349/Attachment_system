<?php
include "includes/config.php";
$studentid = $_GET['id'];

echo $studentid;

$query = "DELETE FROM `students` WHERE uniqueid = '$studentid'";
$query1 = "DELETE FROM `tbl_logbook` WHERE studentid = '$studentid'";
$query2 = "DELETE FROM `tbl_csupervisor_assess` WHERE studentid = '$studentid'";
$query3 = "DELETE FROM `tbl_registered_attachments` WHERE studentid = '$studentid'";
$query4 = "DELETE FROM `tbl_responses` WHERE student_id = '$studentid'";
$query5 = "DELETE FROM `tbl_supervisor_assess` WHERE studentid = '$studentid';";



$res1  = mysqli_query($conn, $query1) or die($conn->error);
$res2  = mysqli_query($conn, $query2) or die($conn->error);
$res3  = mysqli_query($conn, $query3) or die($conn->error);
$res4  = mysqli_query($conn, $query4) or die($conn->error);
$res5  = mysqli_query($conn, $query5) or die($conn->error);
$res  = mysqli_query($conn, $query) or die($conn->error);

if ($res1 && $res2 && $res3 && $res4 && $res5 && $res) {
?>
    <script>
        alert("Student Deleted Successfully");
    </script>
<?php
header("location: students.php");
} else {
    ?>
    <script>
        alert("Failed to delete Student. Try again later");
    </script>
<?php
header("location: students.php");
}

?>