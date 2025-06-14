<?php
session_start();
include_once "../includes/config.php";
$ssupid  = $_SESSION['ssupid'];
$studentid = $_GET['studentid'];

$intelmarks = mysqli_real_escape_string($conn, $_POST['intelmarks']);
$intelremarks = mysqli_real_escape_string($conn, $_POST['intelremarks']);
$indmarks = mysqli_real_escape_string($conn, $_POST['indmarks']);
$indremarks = mysqli_real_escape_string($conn, $_POST['indremarks']);
$commarks = mysqli_real_escape_string($conn, $_POST['commarks']);
$comremarks = mysqli_real_escape_string($conn, $_POST['comremarks']);
$innomarks = mysqli_real_escape_string($conn, $_POST['innomarks']);
$innoremarks = mysqli_real_escape_string($conn, $_POST['innoremarks']);
$appmarks = mysqli_real_escape_string($conn, $_POST['appmarks']);
$appremarks = mysqli_real_escape_string($conn, $_POST['appremarks']);

if (
    $intelmarks < 0 ||
    empty($intelremarks) ||
    $indmarks < 0 ||
    empty($indremarks) ||
    $commarks < 0 ||
    empty($comremarks) ||
    $innomarks < 0 ||
    empty($innoremarks) ||
    $appmarks < 0 ||
    empty($appremarks)
) {
    echo "All Field are required";
}else if (
    $intelmarks > 5 ||
    $indmarks > 5 ||
    $commarks > 5 ||
    $innomarks > 5 ||
    $appmarks > 5
){
    echo "Please assign marks within the limit";
} else {
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `tbl_supervisor_assess`(`studentid`, `supid`, `intelmarks`, `intelremarks`, `indmarks`, `indremarks`, `commarks`, `comremarks`, `innomarks`, `innoremarks`, `appmarks`, `appremarks`, `total`, `totalremarks`, `date`) VALUES ('{$studentid}', '{$ssupid}','{$intelmarks}', '{$intelremarks}', '{$indmarks}', '{$indremarks}', '{$commarks}', '{$comremarks}', '{$innomarks}', '{$innoremarks}', '{$appmarks}', '{$appremarks}', 55, 'remarks', '{$date}')";

    $insert_query = mysqli_query($conn, $sql);
    if ($insert_query) {
        echo "success";
    } else {
        echo $conn->error;
        // echo "Something went wrong. Please try again!";
    }
}
