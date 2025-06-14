<?php
session_start();
include_once "../includes/config.php";

$week = $_GET['week'];
$sid = $_SESSION['studentid'];

$mondayjob = mysqli_real_escape_string($conn, $_POST['mondayjob']);
$mondayskill = mysqli_real_escape_string($conn, $_POST['mondayskill']);
$tuesdayjob = mysqli_real_escape_string($conn, $_POST['tuesdayjob']);
$tuesdayskill = mysqli_real_escape_string($conn, $_POST['tuesdayskill']);
$wednesdayjob = mysqli_real_escape_string($conn, $_POST['wednesdayjob']);
$wednesdayskill = mysqli_real_escape_string($conn, $_POST['wednesdayskill']);
$thursdayjob = mysqli_real_escape_string($conn, $_POST['thursdayjob']);
$thursdayskill = mysqli_real_escape_string($conn, $_POST['thursdayskill']);
$fridayjob = mysqli_real_escape_string($conn, $_POST['fridayjob']);
$fridayskill = mysqli_real_escape_string($conn, $_POST['fridayskill']);

$sql = "UPDATE `tbl_logbook` SET `mondayjob`='$mondayjob',`mondayskill`='$mondayskill',`tuesdayjob`='$tuesdayjob',`tuesdayskill`='$tuesdayskill',`wednesdayjob`='$wednesdayjob',`wednesdayskill`='$wednesdayskill',`thursdayjob`='$thursdayjob',`thursdayskill`='$thursdayskill',`fridayjob`='$fridayjob',`fridayskill`='$fridayskill' WHERE `studentid`='$sid' and `week` ='$week' ";

$update_query = mysqli_query($conn, $sql);
if ($update_query) {
    echo "success";
} else {
    echo "Something went wrong. Please try again!";
}
