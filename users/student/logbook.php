<?php
session_start();
include "includes/config.php";
if (!isset($_SESSION['studentid'])) {
    header("location: login.php");
}

if (!isset($_GET['week'])) {
    header("location: logbook.php?week=1");
}

$sid  = $_SESSION['studentid'];
$week = $_GET['week'];

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

include "myFunctions.php";
?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-3 ml-4">Log Book</h4>
        
        <hr>
        <?php if (mysqli_num_rows($checkresult) < 1) : ?>
            <div class="row m-2">
                <h5>You cannot access the logbook. The form is only availabe for students in attachment</h5>
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
                                <td>
                                    <textarea class="form-control" name="mondayjob" id="" cols="30" rows="4"><?php echo $mondayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="mondayskill" id="" cols="30" rows="4"><?php echo $mondayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Tuesday</p>
                                    <p><?php echo $tue_date; ?></p>
                                </td>
                                <td>
                                    <textarea class="form-control" name="tuesdayjob" id="" cols="30" rows="4"><?php echo $tuesdayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="tuesdayskill" id="" cols="30" rows="4"><?php echo $tuesdayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Wednesday</p>
                                    <p><?php echo $wen_date; ?></p>
                                </td>
                                <td>
                                    <textarea class="form-control" name="wednesdayjob" id="" cols="30" rows="4"><?php echo $wednesdayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="wednesdayskill" id="" cols="30" rows="4"><?php echo $wednesdayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Thursday</p>
                                    <p><?php echo $thur_date; ?></p>
                                </td>
                                <td>
                                    <textarea class="form-control" name="thursdayjob" id="" cols="30" rows="4"><?php echo $thursdayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="thursdayskill" id="" cols="30" rows="4"><?php echo $thursdayskill; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Friday</p>
                                    <p><?php echo $fri_date; ?></p>
                                </td>
                                <td>
                                    <textarea class="form-control" name="fridayjob" id="" cols="30" rows="4"><?php echo $fridayjob; ?></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="fridayskill" id="" cols="30" rows="4"><?php echo $fridayskill; ?></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mb-5">
                    <button id="updateBtn" <?php if (mysqli_num_rows($logresult) < 1) {
                                                echo "disabled" . " " . "style='cursor: not-allowed;'";
                                            } ?> type="submit" class="btn btn-primary btn-lg">Update</button>
                    <button id="saveBtn" <?php if (mysqli_num_rows($logresult) > 0) {
                                                echo "disabled" . " " . "style='cursor: not-allowed;'";
                                            } ?> type="submit" class="btn btn-success btn-lg">Save</button>
                        <hr>
                            <a href="pdfs/logbook.php?sid=<?php echo $sid; ?>" target="_blank" class="btn btn-primary mx-5 text-white">Export Log Book</a>
                        <hr>

                </div>
            </form>
        <?php endif ?>
    </div>
</section>

<script>
    const form = document.querySelector("#logForm");
    const nextBtn = document.querySelector("#nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const updateBtn = form.querySelector("#updateBtn");
    const saveBtn = form.querySelector("#saveBtn");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    prevBtn.addEventListener('click', () => {
        const week = parseInt(location.search.split("week=")[1]);
        if (week > 1) {
            location.href = `logbook.php?week=${week-1}`
        }
    })

    nextBtn.onclick = () => {
        const week = parseInt(location.search.split("week=")[1]);
        if (week < 12) {
            location.href = `logbook.php?week=${week+1}`
        }
    }

    updateBtn.onclick = () => {
        const week = parseInt(location.search.split("week=")[1]);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", `utils/logbookUpdate.php?week=${week}`, true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Updated Successfully")
                        location.href = location.href;
                    } else {
                        alert(data);
                        location.href = location.href;
                    }
                }
            }
        };
        let formData = new FormData(form);
        xhr.send(formData);
    };
    saveBtn.onclick = () => {
        const week = parseInt(location.search.split("week=")[1]);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", `utils/logbook.php?week=${week}`, true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Saved Successfully")
                        location.href = location.href;
                    } else {
                        alert(data);
                        location.href = location.href;
                    }
                }
            }
        };
        let formData = new FormData(form);
        xhr.send(formData);
    };
</script>

<?php include "includes/footer.php"; ?>