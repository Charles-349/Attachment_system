<?php
include "includes/header.php"; 
include "includes/config.php";

if (!isset($_GET['week'])) {
    header("location: logbook.php?week=1");
}

$sid  = $_GET['studentid'];
$week = $_GET['week'];

$studentres = $conn->query("SELECT * FROM students where uniqueid = '$sid'");

if (mysqli_num_rows($studentres) >= 1){
    $studentarray = mysqli_fetch_assoc($studentres);
}else{
    ?>
    <script>
        alert("Invalid Student ID")
    </script>
    <?php
}

$checkresult  = mysqli_query($conn, "SELECT * FROM `tbl_registered_attachments` where studentid='$sid'");
$logresult  = mysqli_query($conn, "SELECT * FROM `tbl_logbook` where studentid='$sid' and week='$week' ");

$datecount = $week-1;
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

include "functions_all.php";
?>

<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h1 class="my-2 ml-2 text-center">LOGBOOK</h1>
        <h4 class="text-success my-2 ml-2 text-center"><?php echo $studentarray['fname'] ." ". $studentarray['lname']. " > ". $studentarray['regno'] ?></h4>
        <hr>
        <a href="pdfs/logbook.php?sid=<?php echo $sid; ?>" target="_blank" class="btn btn-primary mx-5 text-white">Export Log Book</a>
        <hr>
        <?php if (mysqli_num_rows($checkresult) < 1) : ?>
            <div class="row m-2">
                <h5>No Logbook Availabler.....check the student ID</h5>
            </div>
        <?php else : ?>
            <div class="row m-2">
                <div class="col-12" style="display:flex; justify-content:space-between;">
                    <button id="prevBtn" class="btn btn-outline-success">Previous</button>
                    <h4 class="text-success" style="text-decoration: underline;">Week <?php echo $week; ?></h4>
                    <button id="nextBtn" class="btn btn-outline-success">Next</button>
                </div>
            </div>
            <form action="#" id="logForm" class="row m-2">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Day</th>
                                <th scope="col">Job Assigned To Student</th>
                                <th scope="col">Special Skills Acquired</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>Monday</p>
                                    <p><?php echo $mon_date; ?></p>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="mondayjob" id="" cols="30" rows="4"><?php echo $mondayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="mondayskill" id="" cols="30" rows="4"><?php echo $mondayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tuesday</p>
                                    <p><?php echo $tue_date; ?></p>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="tuesdayjob" id="" cols="30" rows="4"><?php echo $tuesdayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="tuesdayskill" id="" cols="30" rows="4"><?php echo $tuesdayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Wednesday</p>
                                    <p><?php echo $wen_date; ?></p>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="wednesdayjob" id="" cols="30" rows="4"><?php echo $wednesdayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="wednesdayskill" id="" cols="30" rows="4"><?php echo $wednesdayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Thursday</p>
                                    <p><?php echo $thur_date; ?></p>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="thursdayjob" id="" cols="30" rows="4"><?php echo $thursdayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="thursdayskill" id="" cols="30" rows="4"><?php echo $thursdayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Friday</p>
                                    <p><?php echo $fri_date; ?></p>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="fridayjob" id="" cols="30" rows="4"><?php echo $fridayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea disabled class="form-control" name="fridayskill" id="" cols="30" rows="4"><?php echo $fridayskill; ?></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        <?php endif ?>
    </div>
</section>

<script>
    const form = document.querySelector("#logForm");
    const nextBtn = document.querySelector("#nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    form.onsubmit = (e) => {
        e.preventDefault();
    };
    prevBtn.addEventListener('click', () => {
        const studentid =location.search.split("week=")[0].split("=")[1].split("&")[0];
        const week = parseInt(location.search.split("week=")[1]);
        if (week > 1) {
            location.href = `logbook.php?studentid=${studentid}&week=${week-1}`
        }
    })

    nextBtn.onclick = () => {
        const studentid =location.search.split("week=")[0].split("=")[1].split("&")[0];
        const week = parseInt(location.search.split("week=")[1]);
        if (week < 12) {
            location.href = `logbook.php?studentid=${studentid}&week=${week+1}`
        }
    }
</script>