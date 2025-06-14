<?php include "includes/header1.php" ?>
<div class="form signup">
    <form action="#" method="POST" enctype="multipart/form-data">
        <h3 class="my-2 mb-3">Student Register</h3>
        <div class="error-text"></div>
        <div class="field input">
            <label for="">First Name</label>
            <input type="text" name="fname" placeholder="Enter your first name" />
        </div>
        <div class="field input">
            <label for="">Last Name</label>
            <input type="text" name="lname" placeholder="Enter your last name" />
        </div>
        <div class="field input">
            <label for="">Registration Number</label>
            <input type="text" name="regno" placeholder="Enter your reg number" />
        </div>
        <div class="field input">
            <label for="">Course Name</label>
            <select name="course" >
                <optipreg_matchon>Select Course</option>
                <option value="BBIT">BBIT</option>
                <option value="IT">IT</option>
            </select>
        </div>
        <div class="field input">
            <label for="">Year of Study</label>
            <select name="year" >
                <option>Select Year</option>
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
                <option value="3">3rd Year</option>
                <option value="4">4th Year</option>
            </select>
        </div>
        <div class="field input">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Enter your password" />
            <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
            <input type="submit" name="" value="Continue" />
        </div>
        <div class="link">Already have an account?<a href="login.php">Login</a></div>
    </form>
</div>
</div>
<script src="js/password-show-hide.js"></script>
<script>
    const form = document.querySelector(".signup form"),
        continueBtn = form.querySelector(".button input"),
        errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    continueBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/register.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        location.href = "login.php";
                        errorText.style.display = "none";
                    } else {
                        errorText.style.display = "block";
                        errorText.textContent = data;
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