<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Add Attachment</h4>
        <div class="row ml-2">
            <form id="addAttachmentForm">
                <div class="row ">
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                        <label>Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Enter title">
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                        <label>Company Name</label>
                        <input name="cname" type="text" class="form-control" placeholder="Enter company name">
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                        <label>Category</label>
                        <select name="category" type="text" class="form-control" placeholder="Enter category">
                            <option value="hardware">Hardware</option>
                            <option value="software">Software</option>
                            <option value="networking">Networking</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                        <label>Location</label>
                        <input name="location" type="text" class="form-control" placeholder="Enter location">
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-5">
                        <label>Start date</label>
                        <input name="startdate" type="date" class="form-control">
                    </div>
                    <div class="form-group col-12 col-lg-10">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Enter description"></textarea>
                    </div>
                </div>
                <button type="submit" id="addAttachmentBtn" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</section>

<script>
    const form = document.querySelector("#addAttachmentForm"),
        addAttachmentBtn = form.querySelector("#addAttachmentBtn");

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    addAttachmentBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "utils/addAttachment.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    console.log("Data", data);
                    if (data === "success") {
                        alert("Attachment added")
                        location.href = "addattachment.php";
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