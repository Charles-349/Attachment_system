
<?php include "includes/header1.php" ?>
<div class="form login">
    <form action="#" method="POST" enctype="multipart/form-data">
        <h3 class="my-2 mb-3">Company Supervisor Login</h3>
        <div class="error-text"></div>
        <div class="field input">
            <label for="">Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" />
        </div>
        <div class="field input">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Enter your password" />
            <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
            <input type="submit" name="" value="Continue" />
        </div>
        <div class="link"><a href="#">Forgot password?</a></div>
    </form>
</div>
</div>

<script src="js/password-show-hide.js"></script>
<script>
    const form = document.querySelector(".login form"),
        continueBtn = form.querySelector(".button input"),
        errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    continueBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/login.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    if (data === "success") {
                        location.href = "index.php";
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