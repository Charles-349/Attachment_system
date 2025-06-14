<?php

include "functions_all.php";
include "includes/config.php";

$studentid = $_GET['studentid'];

if (!isset($studentid)) {
    header("location: index.php");
}


$studentres = $conn->query("SELECT * FROM students where uniqueid = '$studentid'");
$compres = $conn->query("SELECT * FROM tbl_registered_attachments where studentid = '$studentid'");

$checkres = $conn->query("SELECT * FROM tbl_csupervisor_assess where studentid = '$studentid'");

$onemarks = "";
$oneremarks = "";
$twomarks = "";
$tworemarks = "";
$threeamarks = "";
$threearemarks = "";
$threebmarks = "";
$threebremarks = "";
$threecmarks = "";
$threecremarks = "";
$threedmarks = "";
$threedremarks = "";
$fivemarks = "";
$fiveremarks = "";
$sixmarks = "";
$sixremarks = "";
$sevenmarks = "";
$sevenremarks = "";
$eightmarks = "";
$eightremarks = "";
$ninemarks = "";
$nineremarks = "";
$tenmarks = "";
$tenremarks = "";
$elevenmarks = "";
$elevenremarks = "";
$twelvemarks = "";
$twelveremarks = "";
$thirteenmarks = "";
$thirteerenmarks = "";
$fourteenmarks = "";
$fourteenremarks = "";
$fifteenmarks = "";
$fifteenremarks = "";

$exists = mysqli_num_rows($checkres) > 0;
if ($exists) {
    $checkarray = mysqli_fetch_assoc($checkres);
    $onemarks = $checkarray['onemarks'];
    $oneremarks = $checkarray['oneremarks'];
    $twomarks = $checkarray['twomarks'];
    $tworemarks = $checkarray['tworemarks'];
    $threeamarks = $checkarray['threeamarks'];
    $threearemarks = $checkarray['threearemarks'];
    $threebmarks = $checkarray['threebmarks'];
    $threebremarks = $checkarray['threebremarks'];
    $threecmarks = $checkarray['threecmarks'];
    $threecremarks = $checkarray['threecremarks'];
    $threedmarks = $checkarray['threedmarks'];
    $threedremarks = $checkarray['threedremarks'];
    $fivemarks = $checkarray['fivemarks'];
    $fiveremarks = $checkarray['fiveremarks'];
    $sixmarks = $checkarray['sixmarks'];
    $sixremarks = $checkarray['sixremarks'];
    $sevenmarks = $checkarray['sevenmarks'];
    $sevenremarks = $checkarray['sevenremarks'];
    $eightmarks = $checkarray['eightmarks'];
    $eightremarks = $checkarray['eightremarks'];
    $ninemarks = $checkarray['ninemarks'];
    $nineremarks = $checkarray['nineremarks'];
    $tenmarks = $checkarray['tenmarks'];
    $tenremarks = $checkarray['tenremarks'];
    $elevenmarks = $checkarray['elevenmarks'];
    $elevenremarks = $checkarray['elevenremarks'];
    $twelvemarks = $checkarray['twelvemarks'];
    $twelveremarks = $checkarray['twelveremarks'];
    $thirteenmarks = $checkarray['thirteenmarks'];
    $thirteerenmarks = $checkarray['thirteerenmarks'];
    $fourteenmarks = $checkarray['fourteenmarks'];
    $fourteenremarks = $checkarray['fourteenremarks'];
    $fifteenmarks = $checkarray['fifteenmarks'];
    $fifteenremarks = $checkarray['fifteenremarks'];
    
}
?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h6 class="my-2 ml-2 text-center">"CONFIDENTIAL"</h6>
        <h4 class="text-success my-2 ml-2 text-center">ASSESSMENT FORM FOR INDUSTRY SUPERVISOR</h4>
        <hr>
        <?php
        if (mysqli_num_rows($studentres) >= 1) :
            $studentarray = mysqli_fetch_assoc($studentres);
            $comparray = mysqli_fetch_assoc($compres);
        ?>
            <div class="m-2">
                <h5>Student Name : <strong><?php echo $studentarray['fname'] . " " . $studentarray['lname'] ?></strong></h5><br>
                <h5>Student Reg. No : <strong><?php echo $studentarray['regno'] ?></strong></h5><br>
                <h5>Course. No : <strong><?php echo $studentarray['course'] ?></strong></h5><br>
                <h5>Station where attached: <strong><?php echo $comparray['companyname'] . ", " . $comparray['companyaddress'] ?></strong></h5><br>
                <h5>Period of Attachment: <strong><?php echo $comparray['duration'] . " Weeks" ?></strong></h5>
            </div>
            <br>
            <h2 class="m-2">To the Assessor</h2>
            <p class="col col-8">This form is designed to assist you to objectively assess the trainee attached to your organization. Your assessment of the trainee will be highly valued. Kindly complete and return under CONFIDENTIAL cover to:
                The ATTACHMENT CO-ORDINATOR SCHOOL OF COMPUTER SCIENCE AND INFORMATION TECHNOLOGY DeKUT P.O BOX 657-10100, Nyeri, immediately the trainee finishes the period of attachment.</p>
            <br>
            <form action="" method="POST" id="assessForm" class="m-3">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active">
                            <th>QUALITY</th>
                            <th>MAX- MARKS</th>
                            <th>MARKS AWARDED</th>
                            <th>REMARKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1.Attendance</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $onemarks ?>" name="onemarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="oneremarks" id="" cols="30" rows="1" class="form-control"><?php echo $oneremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>2. Punctuality</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $twomarks ?>" name="twomarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="tworemarks" id="" cols="30" rows="1" class="form-control"><?php echo $tworemarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th colspan="9">3. Attitude to work & Interest in work Place Skill:</th>
                        </tr>
                        <tr>
                            <th> a. Basic Computer skills (typing, Operating Systems etc.)</th>
                            <td>4</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $threeamarks ?>" name="threeamarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="threearemarks" id="" cols="30" rows="1" class="form-control"><?php echo $threearemarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th> b. General office applications (word processing, Spreadsheets, databases)</th>
                            <td>4</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $threebmarks ?>" name="threebmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="threebremarks" id="" cols="30" rows="1" class="form-control"><?php echo $threebremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th> c. Technical applications (Networking, Maintenance, Communication)</th>
                            <td>4</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $threecmarks ?>" name="threecmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="threecremarks" id="" cols="30" rows="1" class="form-control"><?php echo $threecremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th> d. Area of specialization (please indicate) where attached.</th>
                            <td>4</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $threedmarks ?>" name="threedmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="threedremarks" id="" cols="30" rows="1" class="form-control"><?php echo $threedremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>5. Scientific and Technical knowledge</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $fivemarks ?>" name="fivemarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="fiveremarks" id="" cols="30" rows="1" class="form-control"><?php echo $fiveremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>6. Intelligence / quality of work</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $sixmarks ?>" name="sixmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="sixremarks" id="" cols="30" rows="1" class="form-control"><?php echo $sixremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>7. Ability to learn and perform tasks</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $sevenmarks ?>" name="sevenmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="sevenremarks" id="" cols="30" rows="1" class="form-control"><?php echo $sevenremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>8. Acceptability to colleagues, Subordinates, Supervisor (s)</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $eightmarks ?>" name="eightmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="eightremarks" id="" cols="30" rows="1" class="form-control"><?php echo $eightremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>9. Acceptance of responsibility</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $ninemarks ?>" name="ninemarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="nineremarks" id="" cols="30" rows="1" class="form-control"><?php echo $nineremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>10. Initiative / creativity</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $tenmarks ?>" name="tenmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="tenremarks" id="" cols="30" rows="1" class="form-control"><?php echo $tenremarks ?></textarea></td>
                        </tr>

                        <tr>
                            <th>11. Judgement in situations/ improvisation</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $elevenmarks ?>" name="elevenmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="elevenremarks" id="" cols="30" rows="1" class="form-control"><?php echo $elevenremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>12. Dependability and Reliability</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $twelvemarks ?>" name="twelvemarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="twelveremarks" id="" cols="30" rows="1" class="form-control"><?php echo $twelveremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>13. Adaptability to environment/ Adjustment</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $thirteenmarks ?>" name="thirteenmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="thirteerenmarks" id="" cols="30" rows="1" class="form-control"><?php echo $thirteerenmarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>14. Organization & Planning</th>
                            <td>1</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $fourteenmarks ?>" name="fourteenmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="fourteenremarks" id="" cols="30" rows="1" class="form-control"><?php echo $fourteenremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>15. Effective use of student’s time</th>
                            <td>2</td>
                            <td><input <?php if ($exists) {echo "disabled";} ?> value="<?php echo $fifteenmarks ?>" name="fifteenmarks" type="number" max="5" class="form-control"></td>
                            <td><textarea <?php if ($exists) {echo "disabled";} ?> name="fifteenremarks" id="" cols="30" rows="1" class="form-control"><?php echo $fifteenremarks ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td></td>
                            <td><input disabled  value="<?php if ($exists) {echo getCAssessmentScore($studentid);} ?>"  class="form-control"></td>
                            
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
        xhr.open("POST", `utils/cAssess.php?studentid=<?php echo $studentid ?>`, true);
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