<?php
include "functions_all.php";
include "includes/header.php";

if(isset($_GET['course'])){
    $course = $_GET['course'];
}else{
    $course = "all";
}
if(isset($_GET['year'])){
    $year = $_GET['year'];
}else{
    $year = "all";
}


?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

     <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Students</h4>
        <hr>
        <div class="row">
            <div class="col mx-5 mb-2">
                <h2 class="text-success">Add Students</h2>
                <form id="addStudentsForm">
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
                            <label>Registration Number</label>
                            <input name="regno" type="text" class="form-control" placeholder="Enter Registration Number ">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Password</label>
                            <input name="password" type="text" class="form-control" placeholder="Enter password">
                        </div>
                         <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Supervisor</label>
                            <input name="supervisor" type="text" class="form-control" placeholder="Enter Supervisor">
                        </div>
                         <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Company Supervisor</label>
                            <input name="csupervisor" type="text" class="form-control" placeholder="Enter Company Supervisor">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Course</label>
                            <input name="course" type="text" class="form-control" placeholder="Enter course">
                        </div>
                         <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                            <label>Year</label>
                            <input name="year" type="number" class="form-control" placeholder="Enter year">
                        </div>
                    </div>
                    <button type="submit" id="addStudentsBtn" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        <br>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content py-4 px-5">
        <form class="mt-2 row" id="filterForm">
            <select name="" id="yearInput" class="form-control col-3 col-lg-2">
                <option value="all">Select Year</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <select name="" id="courseInput" class="form-control col-3 col-lg-2">
                <option value="all">Select Course</option>
                <option value="IT">IT</option>
                <option value="BBIT">BBIT</option>
                <option value="CCS">CCS</option>
                <option value="CCT">CCT</option>
                <option value="IS">IS</option>
            </select>
            <button id="filterButton" class="btn btn-outline-success col col-2 col-lg-2">Apply</button>
        </form>
        <div class="row mt-3">
            <div class="col">
                <h2 class="text-success">All Students</h2>
                <div class="d-flex justify-content-end">
                    <a href="pdfs/students.php" target="_blank" class="m-3 btn btn-warning"><i class="fa fa-pdf" aria-hidden="true"></i>Export PDF</a> 
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Registration Number</th>
                            <th scope="col">Course</th>
                            <th scope="col">Year</th>
                            <th scope="col">Password Reset</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($course =="all" && $year == "all") {
                            getAllStudents();
                        }else{
                            getFilteredStudents($year, $course);
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    const filterForm = document.querySelector("#filterForm");
    const courseInput = document.querySelector("#courseInput");
    const yearInput = document.querySelector("#yearInput");
    const filterButton = document.querySelector("#filterButton");

    filterForm.onsubmit = (e) => {
        e.preventDefault();
    };

    filterButton.onclick = () => {
        const course = courseInput.value;
        const year = yearInput.value;

        if (course === "all" && year !== "all") {
            location.href = `students.php?year=${year}`;
        } else if (course != "all" && year == "all") {
            location.href = `students.php?course=${course}`;
        } else {
            location.href = `students.php?course=${course}&year=${year}`;
        }
    };
     const form = document.querySelector("#addStudentForm"),
        addStudentBtn = form.querySelector("#addStudentBtn"),
        errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    addStudentBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/addStudent.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Student added")
                        location.href = location.href
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