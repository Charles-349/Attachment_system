<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Student Attachment System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
</head>

<body>
  <div class="main-wrapper">
    <header class="py-3">
      <div class="menu-icon"><i class="fa fa-bars"></i></div>
      <div class="logo">
        <img src="images/logo.png" class="img-responsive" alt="logo" style="float:left;width:150px; height:50px;position:relative;left:20px">
      </div>
      <h3 class="text-white">Student Attachment System</h3>
      <div class="nav">
        <?php if (isset($_SESSION['studentid'])) : ?>
          <a href="logout.php" class="btn" style="background-color: orange;">Logout</a>
        <?php endif ?>
      </div>
    </header>
    