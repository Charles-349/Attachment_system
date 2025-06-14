<?php

include "includes/config.php";
include "includes/header.php";
if (!isset($_GET['csupid'])) {
    header("location: index.php");
}

$csupid = $_GET['csupid'];
$sql = mysqli_query($conn, "SELECT * FROM company_supervisors WHERE uniqueid = '$csupid'");
if(mysqli_num_rows($sql)>0){
    $arr = mysqli_fetch_assoc($sql);
}

?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Password Reset</h4>
        <form id="resetPassForm">
            <h4>Supervisor First Name: <span class="text-primary"> <?php echo $arr["firstname"] ?></span></h4>
            <div class="row ">
                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                    <label>Enter new password</label>
                    <input name="password" type="text" class="form-control" placeholder="Password">
                </div>
            </div>
            <button type="submit" id="resetPassBtn" class="btn btn-primary">Reset</button>
        </form>
    </div>
</section>

<script>
    const form = document.querySelector("#resetPassForm"),
        resetPassBtn = form.querySelector("#resetPassBtn");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    resetPassBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/resetPass2.php?csupid=<?php echo $csupid ?>", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Password reset successful")
                        location.href = "companysupervisors.php";
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
</body>

</html>