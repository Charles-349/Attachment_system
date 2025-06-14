<?php
session_start();
include_once "../includes/config.php";
$csupid  = $_SESSION['csupid'];
$studentid = $_GET['studentid'];

$onemarks = mysqli_real_escape_string($conn, $_POST['onemarks']);
$oneremarks = mysqli_real_escape_string($conn, $_POST['oneremarks']);
$twomarks = mysqli_real_escape_string($conn, $_POST['twomarks']);
$tworemarks = mysqli_real_escape_string($conn, $_POST['tworemarks']);
$threeamarks = mysqli_real_escape_string($conn, $_POST['threeamarks']);
$threearemarks = mysqli_real_escape_string($conn, $_POST['threearemarks']);
$threebmarks = mysqli_real_escape_string($conn, $_POST['threebmarks']);
$threebremarks = mysqli_real_escape_string($conn, $_POST['threebremarks']);
$threecmarks = mysqli_real_escape_string($conn, $_POST['threecmarks']);
$threecremarks = mysqli_real_escape_string($conn, $_POST['threecremarks']);
$threedmarks = mysqli_real_escape_string($conn, $_POST['threedmarks']);
$threedremarks = mysqli_real_escape_string($conn, $_POST['threedremarks']);
$fivemarks = mysqli_real_escape_string($conn, $_POST['fivemarks']);
$fiveremarks = mysqli_real_escape_string($conn, $_POST['fiveremarks']);
$sixmarks = mysqli_real_escape_string($conn, $_POST['sixmarks']);
$sixremarks = mysqli_real_escape_string($conn, $_POST['sixremarks']);
$sevenmarks = mysqli_real_escape_string($conn, $_POST['sevenmarks']);
$sevenremarks = mysqli_real_escape_string($conn, $_POST['sevenremarks']);
$eightmarks = mysqli_real_escape_string($conn, $_POST['eightmarks']);
$eightremarks = mysqli_real_escape_string($conn, $_POST['eightremarks']);
$ninemarks = mysqli_real_escape_string($conn, $_POST['ninemarks']);
$nineremarks = mysqli_real_escape_string($conn, $_POST['nineremarks']);
$tenmarks = mysqli_real_escape_string($conn, $_POST['tenmarks']);
$tenremarks = mysqli_real_escape_string($conn, $_POST['tenremarks']);
$elevenmarks = mysqli_real_escape_string($conn, $_POST['elevenmarks']);
$elevenremarks = mysqli_real_escape_string($conn, $_POST['elevenremarks']);
$twelvemarks = mysqli_real_escape_string($conn, $_POST['twelvemarks']);
$twelveremarks = mysqli_real_escape_string($conn, $_POST['twelveremarks']);
$thirteenmarks = mysqli_real_escape_string($conn, $_POST['thirteenmarks']);
$thirteerenmarks = mysqli_real_escape_string($conn, $_POST['thirteerenmarks']);
$fourteenmarks = mysqli_real_escape_string($conn, $_POST['fourteenmarks']);
$fourteenremarks = mysqli_real_escape_string($conn, $_POST['fourteenremarks']);
$fifteenmarks = mysqli_real_escape_string($conn, $_POST['fifteenmarks']);
$fifteenremarks = mysqli_real_escape_string($conn, $_POST['fifteenremarks']);

if (

    empty($onemarks) ||
    empty($oneremarks) ||
    empty($twomarks) ||
    empty($tworemarks) ||
    empty($threeamarks) ||
    empty($threearemarks) ||
    empty($threebmarks) ||
    empty($threebremarks) ||
    empty($threecmarks) ||
    empty($threecremarks) ||
    empty($threedmarks) ||
    empty($threedremarks) ||
    empty($fivemarks) ||
    empty($fiveremarks) ||
    empty($sixmarks) ||
    empty($sixremarks) ||
    empty($sevenmarks) ||
    empty($sevenremarks) ||
    empty($eightmarks) ||
    empty($eightremarks) ||
    empty($ninemarks) ||
    empty($nineremarks) ||
    empty($tenmarks) ||
    empty($tenremarks) ||
    empty($elevenmarks) ||
    empty($elevenremarks) ||
    empty($twelvemarks) ||
    empty($twelveremarks) ||
    empty($thirteenmarks) ||
    empty($thirteerenmarks) ||
    empty($fourteenmarks) ||
    empty($fourteenremarks) ||
    empty($fifteenmarks) ||
    empty($fifteenremarks)
) {
    echo "All fields are required";
} else if (

    $onemarks>2 ||
    $twomarks>2 ||
    $threeamarks>4 ||
    $threebmarks>4 ||
    $threecmarks>4 ||
    $threedmarks>4 ||
    $fivemarks>2 ||
    $sixmarks>2 ||
    $sevenmarks>2 ||
    $eightmarks>2 ||
    $ninemarks>2 ||
    $tenmarks>2 ||
    $elevenmarks>2 ||
    $twelvemarks>2 ||
    $thirteenmarks>2 ||
    $fourteenmarks>1 ||
    $fifteenmarks>2
) {
    echo "Please assign marks within the limit";
} else {
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `tbl_csupervisor_assess` (`onemarks`, `oneremarks`, `twomarks`, `tworemarks`, `threeamarks`, `threearemarks`, `threebmarks`, `threebremarks`, `threecmarks`, `threecremarks`, `threedmarks`, `threedremarks`, `fivemarks`, `fiveremarks`, `sixmarks`, `sixremarks`, `sevenmarks`, `sevenremarks`, `eightmarks`, `eightremarks`, `ninemarks`, `nineremarks`, `tenmarks`, `tenremarks`, `elevenmarks`, `elevenremarks`, `twelvemarks`, `twelveremarks`, `thirteenmarks`, `thirteerenmarks`, `fourteenmarks`, `fourteenremarks`, `fifteenmarks`, `fifteenremarks`, `studentid`, `csupid`) VALUES ('{$onemarks}', '{$oneremarks}','{$twomarks}', '{$tworemarks}', '{$threeamarks}', '{$threearemarks}', '{$threebmarks}', '{$threebremarks}', '{$threecmarks}', '{$threecremarks}', '{$threedmarks}', '{$threedremarks}', '{$fivemarks}','{$fiveremarks}', '{$sixmarks}', '{$sixremarks}', '{$sevenmarks}', '{$sevenremarks}', '{$eightmarks}', '{$eightremarks}','{$ninemarks}', '{$nineremarks}', '{$tenmarks}', '{$tenremarks}', '{$elevenmarks}', '{$elevenremarks}','{$twelvemarks}', '{$twelveremarks}', '{$thirteenmarks}','{$thirteerenmarks}', '{$fourteenmarks}', '{$fourteenremarks}', '{$fifteenmarks}','{$fifteenremarks}', '{$studentid}', '{$csupid}')";

    $insert_query = mysqli_query($conn, $sql) or die($conn->error);
    if ($insert_query) {
        echo "success";
    } else {
        echo $conn->error;
        // echo "Something went wrong. Please try again!";
    }
}
