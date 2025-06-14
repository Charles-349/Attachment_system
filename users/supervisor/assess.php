<?php

include "functions_all.php";
include "includes/config.php";

$studentid = $_GET['studentid'];

if (!isset($studentid)) {
    header("location: index.php");
}


$studentres = $conn->query("SELECT * FROM students where uniqueid = '$studentid'");
$compres = $conn->query("SELECT * FROM tbl_registered_attachments where studentid = '$studentid'");

$checkres = $conn->query("SELECT * FROM tbl_supervisor_assess where studentid = '$studentid'");

$intelmarks = "";
$intelremarks = "";
$indmarks = "";
$indremarks = "";
$commarks = "";
$comremarks = "";
$innomarks = "";
$innoremarks = "";
$appmarks = "";
$appremarks = "";
$totalmarks = "";
$totalremarks = "";

function calculateTotalScore($res){
    if(mysqli_num_rows($res) < 1){
        return 0;
    }else{
        $count = 0;
        $row=mysqli_fetch_assoc($res);
        $count += $row["intelmarks"];
        $count += $row["indmarks"];
        $count += $row["commarks"];
        $count += $row["innomarks"];
        $count += $row["appmarks"];

        echo $count;
        
    }
}
$totalmarks = 0;

$exists = mysqli_num_rows($checkres) > 0;
if ($exists) {
    $checkarray = mysqli_fetch_assoc($checkres);

    $intelmarks = $checkarray['intelmarks'];
    $intelremarks = $checkarray['intelremarks'];
    $indmarks = $checkarray['indmarks'];
    $indremarks = $checkarray['indremarks'];
    $commarks = $checkarray['commarks'];
    $comremarks = $checkarray['comremarks'];
    $innomarks = $checkarray['innomarks'];
    $innoremarks = $checkarray['innoremarks'];
    $appmarks = $checkarray['appmarks'];
    $appremarks = $checkarray['appremarks'];

    $totalmarks = $checkarray['intelmarks']+ $checkarray['indmarks']+$checkarray['commarks']+ $checkarray['innomarks']+$checkarray['appmarks'];

    $totalremarks = $checkarray['totalremarks'];
}
?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h6 class="my-2 ml-2 text-center">"CONFIDENTIAL"</h6>
        <h4 class="text-success my-2 ml-2 text-center">ASSESSMENT FORM FOR THE VISITING SUPERVISOR/LECTURER</h4>
        <hr>
        <?php
        if (mysqli_num_rows($studentres) >= 1) :
            $studentarray = mysqli_fetch_assoc($studentres);
            $comparray = mysqli_fetch_assoc($compres);
        ?>
            <div class="m-2">
                <h5>Student Name : <strong><?php echo $studentarray['fname'] . " " . $studentarray['lname'] ?></strong></h5><br>
                <h5>Student Reg. No : <strong><?php echo $studentarray['regno'] ?></strong></h5><br>
                <h5>Station where attached: <strong><?php echo $comparray['companyname'] . ", " . $comparray['companyaddress'] ?></strong></h5><br>
                <h5>Period of Attachment: <strong><?php echo $comparray['duration'] . " Weeks" ?></strong></h5>
            </div>
            <br>
            <h2 class="m-2">To the Assessor</h2>
            <p class="col col-8">This form is to be completed by the visiting Supervisor /Lecturer /Tutor on visiting and assessing the student at the station where the student is attached. The form should be handed over to the attachment co-ordinator as soon as the assessment staff returns to the University. It is designed to assist in objective assessment of the trainee.</p>
            <br>
            <form action="" method="POST" id="assessForm" class="m-3">
                <table class="table">
                    <thead>
                        <tr class="table-active">
                            <th>ATTRIBUTE TO BE ASSESSE</th>
                            <th>MAX- Marks</th>
                            <th>Marks Awarded</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Intellectual activity utilized in the task</th>
                            <td>5</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $intelmarks ?>" name="intelmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="intelremarks" id="" cols="30" rows="2" class="form-control"><?php echo $intelremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Independence (ability to work without supervision)</th>
                            <td>5</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $indmarks ?>" name="indmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="indremarks" id="" cols="30" rows="2" class="form-control"><?php echo $indremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Communication</th>
                            <td>5</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $commarks ?>" name="commarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="comremarks" id="" cols="30" rows="2" class="form-control"><?php echo $comremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Innovativeness in relation to task/project</th>
                            <td>5</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $innomarks ?>" name="innomarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="innoremarks" id="" cols="30" rows="2" class="form-control"><?php echo $innoremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Application of technology and skills in work</th>
                            <td>5</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $appmarks ?>" name="appmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="appremarks" id="" cols="30" rows="2" class="form-control"><?php echo $appremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>30</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> disabled value="<?php echo $totalmarks ?>" name="totalmarks" type="number" max="5" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p class="ml-2">NB- You can only fill this form once</p>
                <br>
                <div class="m-2">
                    <?php if (mysqli_num_rows($checkres) > 0) : ?>
                        <button id="" type="button" class="btn btn-secondary" disabled>Records Saved</button>
                    <?php else : ?>
                        <button id="saveBtn" type="submit" class="btn btn-primary">Save</button>
                    <?php endif ?>
                </div>
            </form>
            <hr>
        <?php else : ?>
            <h4>No student found with given ID</h4>
        <?php endif ?>
    </div>
</section>
<script>
    const form = document.querySelector("#assessForm");
    const saveBtn = form.querySelector("#saveBtn");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    saveBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", `utils/assess.php?studentid=<?php echo $studentid ?>`, true);
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
                        // location.href = location.href;
                    }
                }
            }
        };
        let formData = new FormData(form);
        xhr.send(formData);
    };
</script>
</body>

</html>