<?php
require('includes/config.php');
session_start();
if (!isset($_SESSION['studentid'])) {
    header("location: login.php");
}

$test = $_GET['test'];
$studentid = $_SESSION['studentid'];

$conn = mysqli_connect($host, $user, $password, $database);
?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 style="text-transform: uppercase;" class="text-success my-5 ml-2">Tests - <?php echo $test; ?></h4>
        <div class="row ml-2">
            <div class="card m-2" style="width: 38rem;">
                <div class="card-header">
                    <h2>Welcome to The Test - Start Now </h2>
                </div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4>Start Test</h4>
                    <p>This is a multiple choice test to test your <?php echo $test ?> knowledge</p>
                    <p>N/B: once you submit your answers or click next you cannot redo the test</p>
                    <h4>Number of questions <strong>10</strong></h4>
                    <h4 class="my-2">Number of attempts <strong>1</strong></h4>
                    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="test" value="<?php echo($test)?>">
                        <button type="submit" class="mt-5 btn btn-outline-success btn-lg">Start Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    // document.addEventListener('DOMContentLoaded', () => {
    //     document.getElementById("starttest").addEventListener('click', () => {
    //         var response = confirm("Are you sure you want to start the test?");
    //         if (response) {
    //             document.getElementById('form').submit();
    //         } else {
    //             return false;
    //         }
    //     });
    // });
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $test = $_POST['test'];
    $quizno = $_POST['quizno'];

    $query_test_time = "SELECT test_hours, test_minutes FROM test_time WHERE test = '$test'";
    $result_test_time = mysqli_query($conn, $query_test_time);
    $row_test_time = mysqli_fetch_assoc($result_test_time);
    $hours = intval($row_test_time['test_hours']);
    $minutes = $row_test_time['test_minutes'];

    $query_student_test = "SELECT test, start_time, end_time FROM student_test WHERE test = '$test' AND student = '$studentid'";
    $result_student_test = mysqli_query($conn, $query_student_test);
    if (mysqli_num_rows($result_student_test) > 0) {
        //check if time is not exhausted
        $row_student_test = mysqli_fetch_assoc($result_student_test);
        $start_time = strtotime($row_student_test['start_time']);
        $end_time = strtotime($row_student_test['end_time']);
        $current_time = strtotime(date("Y-m-d H:i:s"));
        if ($current_time > $end_time) {
            echo ("<script>alert('You have already attempted this test')</script>");
            echo('<script>location.href="/CHA/SAS/users/student/tests.php"</script>');
        } else {
            $new_end_time = $end_time + (3 * 3600);
            $end = date("Y-m-d H:i:s", $new_end_time);
            $_SESSION[$test] = $end;

            echo("<script>location.href='/CHA/SAS/users/student/test.php?test=$test&quiz=1'</script>");
        }
    }else{
        $time = strtotime("+$hours hours +$minutes minutes");
        $new_end_time = $time + (3 * 3600);
        $end = date("Y-m-d H:i:s", $time);
        $sql = "INSERT INTO student_test(test,student,start_time,end_time) VALUES ('$test','$studentid',NOW(),'$end')";
        $result = mysqli_query($conn, $sql);

        $_SESSION[$test] = date("Y-m-d H:i:s", $new_end_time);
        echo("<script>location.href='/CHA/SAS/users/student/test.php?test=$test&quiz=1'</script>");
    }
}
include "includes/footer.php";
?>