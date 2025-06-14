<?php
include "functions_all.php";
include "includes/header.php"; 

?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Company Supervisors</h4>
        <hr>
        <div class="row">
            <div class="col mx-5 mb-2">
                <h2 class="text-success">Add Company Supervisor</h2>
                <form id="addCompanySupervisorForm">
                    <div class="row ">
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>First name</label>
                            <input name="fname" type="text" class="form-control" placeholder="Enter first name">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Last name</label>
                            <input name="lname" type="text" class="form-control" placeholder="Enter last name">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Company</label>
                            <input name="company" type="text" class="form-control" placeholder="Enter company">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Email address</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Password</label>
                            <input name="password" type="text" class="form-control" placeholder="Enter password">
                        </div>
                    </div>
                    <button type="submit" id="addCompanySupervisorBtn" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col mx-5">
                <h2 class="text-success">All Company Supervisors</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php getAllCompanySupervisors();?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    const form = document.querySelector("#addCompanySupervisorForm"),
        addCompanySupervisorBtn = form.querySelector("#addCompanySupervisorBtn"),
        errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    addCompanySupervisorBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/addCompanySupervisor.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Admin added")
                        location.href = location.href;
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