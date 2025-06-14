<?php
session_start();
include "includes/config.php";
if (!isset($_SESSION['studentid'])) {
    header("location: login.php");
}
if (!isset($_GET['quiz'])) {
    echo "<script> alert('No question specifies.') </script>";
    header("location: tests.php");
}

$test = $_GET['test'];
$quiz = $_GET['quiz'];
$studentid = $_SESSION['studentid'];
$next = $quiz < 10 ? $quiz + 1 : $quiz;

$query_student_test = "SELECT test, start_time, end_time FROM student_test WHERE test = '$test' AND student = '$studentid'";
$result_student_test = mysqli_query($conn, $query_student_test);
$row_student_test = mysqli_fetch_assoc($result_student_test);

$end_time = strtotime($row_student_test['end_time']);
$new_end_time = $end_time + (3 * 3600);
$end = date("Y-m-d H:i:s", $new_end_time);
$_SESSION[$test] = $end;

$quizresult = mysqli_query($conn, "select * from tbl_questions where test = '$test' and quizno = '$quiz'");

if (mysqli_num_rows($quizresult) < 1) {
    echo "<script> alert('No question available.') </script>";
    header("location: starttest.php?test=$test");
}
$quizarray = mysqli_fetch_assoc($quizresult);

$answerresult = mysqli_query($conn, "select * from tbl_answers where test = '$test' and quizno = '$quiz'");


$student_answer_result = mysqli_query($conn, "SELECT response FROM tbl_responses WHERE test = '$test' and quizno = '$quiz' and student_id='$_SESSION[studentid]' ");
if (mysqli_num_rows($student_answer_result) > 0) {
    $answer_dict = mysqli_fetch_assoc($student_answer_result);
    $response = $answer_dict['response'];
}

?>


<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <div class="d-flex justify-content-between">
            <h4 style="text-transform: uppercase;" class="text-success my-5 ml-2">Tests - <?php echo $test; ?></h4>
            <p id="countdown">00h 00m 00s</p>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    var endTime = new Date('<?php echo ($_SESSION[$test]); ?>').getTime();
                    var x = setInterval(function() {
                        var now = new Date().getTime();
                        var distance = endTime - now;
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
                        if (distance < 0) {
                            clearInterval(x);
                            alert("Time is up")
                            location.href = "tests.php";
                        }
                    }, 1000);
                });
            </script>
        </div>
        <div class="row ml-2">
            <div class="card m-2" style="width: 50rem;">
                <div class="card-header">
                    <h2>QUESTION <?php echo $quiz ?> of 10 </h2>
                </div>
                <div class="card-body">
                    <h5 style="color: #000;"> Que <?php echo $quiz ?>: <?php echo $quizarray['question'] ?>. </h5>
                    <form id="question_answer" action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-input m-2 mx-4">
                            <input type="hidden" value="<?php echo $quiz ?>" name="quizno" />
                            <input type="hidden" value="<?php echo $test ?>" name="test" />
                            <?php while ($row = mysqli_fetch_assoc($answerresult)) : ?>
                                <label for="<?php echo $row['answer'] ?>">
                                    <input name="answer" type="radio" id="<?php echo $row['answer'] ?>" value="<?php echo $row['answer'] ?>" class="mr-2"> <?php echo $row['answer'] ?>
                                </label>
                                <br>
                            <?php endwhile ?>
                        </div>
                        <button id="nextBtn" type="submit" class="mt-2 btn btn-outline-success btn-lg">Next</button>
                        <button id="previousBtn" type="submit" class="mt-2 btn btn-outline-success btn-lg">Previous</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll("input[type=radio]").forEach((input) => {
            if (input.value.toLowerCase() === "<?php echo $response ?>".toLowerCase()) {
                input.checked = true;
            }

            input.addEventListener('click', () => {
                const form = document.querySelector("#question_answer");
                const formData = new FormData(form);
                fetch("utils/test.php", {
                    method: "POST",
                    body: formData
                }).then(response => response.text()).then(data => {
                    console.log(data);
                });
            });

            const form = document.querySelector("#question_answer"),
                nextBtn = form.querySelector("#nextBtn"),
                previousBtn = form.querySelector("#previousBtn");

            // href="test.php?test=<?php echo $test ?>&quiz=<?php echo $next ?>"

            form.onsubmit = (e) => {
                e.preventDefault();
            };

            nextBtn.onclick = () => {
                const qn = parseInt(document.location.search.split("quiz=")[1]);
                let next = qn < 10 ? qn + 1 : qn;
                const test = document.location.search.split("test=")[1].split("&")[0];
                location.href = qn === 10 ? "tests.php" : `test.php?test=${test}&quiz=${next}`;
            };

            previousBtn.onclick = () => {
                const qn = parseInt(document.location.search.split("quiz=")[1]);
                let previous = qn > 1 ? qn - 1 : qn;
                const test = document.location.search.split("test=")[1].split("&")[0];
                location.href = `test.php?test=${test}&quiz=${previous}`;
            };
        });
    });
</script>
<?php include "includes/footer.php"; ?>