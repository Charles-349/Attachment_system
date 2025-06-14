<?php
session_start();
include_once "../includes/config.php";
$quizno = mysqli_real_escape_string($conn, $_POST['quizno']);
$test = mysqli_real_escape_string($conn, $_POST['test']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);

if (!empty($quizno) && !empty($test) && !empty($answer)) {
    $result = mysqli_query($conn, "SELECT * FROM tbl_responses WHERE test = '$test' and quizno = '$quizno' and student_id='$_SESSION[studentid]' ");
    if (mysqli_num_rows($result) > 0) {
        echo "answered";
    } else {
        $sql = "INSERT INTO `tbl_responses`(`test`, `quizno`, `response`, `student_id`) VALUES ('$test','$quizno','$answer', '$_SESSION[studentid]')";
        $result2  = mysqli_query($conn, $sql);
        if ($result2) {
            echo "success";
        } else {
            echo "Encountered a problem. Try again later";
        }
    }
} else {
    echo "Select your answer";
}
?>