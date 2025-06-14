<?php
session_start();
if (!isset($_SESSION['studentid'])) {
    header("location: login.php");
}
$sid  = $_SESSION['studentid'];

include "myFunctions.php";

$checkresult = mysqli_query($conn, "SELECT * FROM tbl_registered_attachments where studentid = '$sid'");
$testsdone = testsDone($sid);
?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Register Attachment Details</h4>
        <div class="row m-2">
            <?php if ($testsdone == 3) : ?>
                <?php if (mysqli_num_rows($checkresult) < 1) : ?>
                    <div class="col">
                        <form id="registerAttachmentForm">
                            <div class="row ">
                                <input name="studentid" type="hidden" value="<?php echo $sid; ?>">
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                                    <label>Company Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Enter company name">
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                                    <label>Company Location</label>
                                    <input name="location" type="text" class="form-control" placeholder="Enter company location">
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                                    <label>Company Address</label>
                                    <input name="address" type="text" class="form-control" placeholder="Enter company address">
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                                    <label>Company Contact</label>
                                    <input name="contact" type="text" class="form-control" placeholder="Enter company contacts">
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                                    <label>Your Role</label>
                                    <input name="role" type="text" class="form-control" placeholder="Enter your role">
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                                    <label>Duration in weeks</label>
                                    <input name="duration" type="number" max="12" class="form-control" placeholder="Enter number of weeks">
                                </div>
                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                                    <label>Start date</label>
                                    <input name="startdate" type="date" class="form-control">
                                </div>
                            </div>
                            <button type="submit" id="registerAttachmentBtn" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                <?php else : ?>
                    <div class="col col-12 col-md-12 col-lg-8">
                        <h5>You have Already registered for an attachement in the company shown below</h5>
                        <br>
                        <table class="table">
                            <tbody>
                                <?php getAttachmentDetails($sid); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
            <?php else : ?>
                <div class="m-2">
                    <h3>No tests have been done</h3>
                    <p>You need to do all the tests to register attachment details</p>
                    <a href="tests.php" class="btn btn-primary btn-lg">Take Tests</a>
                </div>
            <?php endif ?>
        </div>
    </div>
    </div>
</section>
<script>
    const form = document.querySelector("#registerAttachmentForm"),
        registerAttachmentBtn = form.querySelector("#registerAttachmentBtn");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    registerAttachmentBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/registerAttachment.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Attachment registered successfully")
                        location.href = "registerattachment.php";
                    } else {
                        alert(data);
                    }
                }
            }
        };
        let formData = new FormData(form);
        xhr.send(formData);
    };
</script>
<?php include "includes/footer.php"; ?>