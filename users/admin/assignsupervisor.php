<?php

include "functions_all.php";
include "includes/config.php";
include "includes/header.php";

?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Assign Supervisor</h4>
        <h3 class="ml-4">School Supervisor</h3>
        <form action="#" method="POST" id="assignForm" class="row ml-2">
            <div class="col-4">
                <select class="form-control" name="regno">
                    <option value="">Select Student</option>
                    <?php
                    $attresult = mysqli_query($conn, "SELECT * from tbl_registered_attachments");
                    if (mysqli_num_rows($attresult) > 0) {
                        while ($attrow = mysqli_fetch_assoc($attresult)) {
                            echo $attrow['studentid'];
                            $stresult = mysqli_query($conn, "SELECT * from students where uniqueid='$attrow[studentid]' and supervisor = '' ") or die($conn->error);
                            echo mysqli_num_rows($stresult);
                            if (mysqli_num_rows($stresult) > 0) {
                                while($row = mysqli_fetch_assoc($stresult)){
                    ?>
                                <option value="<?php echo $row['regno'] ?>"><?php echo $row['regno'] ?></option>
                    <?php
                            }}
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-4">
                <select class="form-control" name="supervisor">
                    <option value="">Select Supervisor</option>
                    <?php
                    $supresult = mysqli_query($conn, "SELECT * from school_supervisors");
                    if (mysqli_num_rows($supresult) > 0) {
                        while ($row = mysqli_fetch_assoc($supresult)) {
                    ?>
                            <option value="<?php echo $row['email'] ?>"><?php echo $row['email'] ?></option>
                    <?php
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="col-4">
                <button type="submit" id="assignBtn" class="btn btn-success">Assign</button>
            </div>
        </form>

        <h3 class="ml-4 mt-5">Company Supervisor</h3>
        <form action="#" method="POST" id="cAssignForm" class="row ml-2">
            <div class="col-4">
                <select class="form-control" name="regnumber">
                    <option value="">Select Student</option>
                    <?php
                    $attresult = mysqli_query($conn, "SELECT * from tbl_registered_attachments");
                    if (mysqli_num_rows($attresult) > 0) {
                        while ($attrow = mysqli_fetch_assoc($attresult)) {
                            echo $attrow['studentid'];
                            $stresult = mysqli_query($conn, "SELECT * from students where uniqueid='$attrow[studentid]' and csupervisor = '' ") or die($conn->error);
                            echo mysqli_num_rows($stresult);
                            if (mysqli_num_rows($stresult) > 0) {
                                $row = mysqli_fetch_assoc($stresult);
                    ?>
                                <option value="<?php echo $row['regno'] ?>"><?php echo $row['regno'] ?></option>
                    <?php
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-4">
                <select class="form-control" name="csupervisor">
                    <option value="">Select Supervisor</option>
                    <?php
                    $supresult = mysqli_query($conn, "SELECT * from company_supervisors");
                    if (mysqli_num_rows($supresult) > 0) {
                        while ($row = mysqli_fetch_assoc($supresult)) {
                    ?>
                            <option value="<?php echo $row['email'] ?>"><?php echo $row['email'] ?></option>
                    <?php
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="col-4">
                <button type="submit" id="cAssignBtn" class="btn btn-success">Assign</button>
            </div>
        </form>

        <div class="row">
            <h4 class="text-success my-5 ml-4">Assign Students</h4>
            <div class="col col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Reg No</th>
                            <th scope="col">Supervisor Email</th>
                            <th scope="col">Company Supervisor Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php getAssignedAdmins(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    const form = document.querySelector("#assignForm"),
        cForm = document.querySelector("#cAssignForm"),
        assignBtn = form.querySelector("#assignBtn"),
        cAssignBtn = form.querySelector("#cAssignBtn"),
        errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault();
    };
    cForm.onsubmit = (e) => {
        e.preventDefault();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/cAssign.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Supervisor Assigned")
                        location.href = location.href;
                    } else {
                        alert(data);
                        location.href = location.href;
                    }
                }
            }
        };
        let formData = new FormData(cForm);
        xhr.send(formData);
    };

    assignBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/assign.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Supervisor Assigned")
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
</body>

</html>