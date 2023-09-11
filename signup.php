<!DOCTYPE html>
<html lang="en">
<head>
    <title>LMS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-5.0.2-dist/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <style>
        <?php include 'assets/index.css'; ?>
    </style>
</head>
<body>

    <!------------------------------------------------------------------**THIS IS NAVBAR** ---------------------------------------------------------->
     <nav class="navbar navbar-expand-lg  navbar-expand-sm  navbar-dark bg-dark ">
     <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
       Library Management System
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link mx-3" href="./admin/index.php">Admin Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="index.php">User Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="signup.php">Register</a>
          </li>
      </div>
    </div>
    </nav>

    <!------------------------------------------------------------------**THIS IS MARQUEE** ---------------------------------------------------------->
    <div class="bg-warning  text-danger">
    <span><marquee style="font-weight: bolder">THIS IS LIBARARY MANAGEMENT SYSTEM</marquee></span>
    </div>

    <!-----------------------------------------------------------------**THIS IS SIDEBAR** ---------------------------------------------------------->
    <div class="row" id="index_info">
        <div class="col-lg-4" id="index_info_div">
            <h3><u>LIBRARY TIMING</u></h3><br>
            <ul>
                <li>Opening Timing: 10:00 AM</li>
                <li>Closing Timing:  6:00 PM</li>
                <li><b>SUNDAY IS OFF</b></li>
            </ul><br><br>
            <h3><u>LIBRARY FACILITIES</u></h3><br>
            <ul>
                <li>Full Furniture</li>
                <li>Free WiFi</li>
                <li>News Papers</li>
                <li>Discussion Rooms</li>
                <li>RO Water</li>
                <li>500+ Novels</li>
            </ul>
        </div>
    
        <!------------------------------------------------------------------**THIS IS MAIN FORM** --------------------------------------------------------->
        <div class="col-lg-8" id="main_content">
                <center><h1 class="display-5">USER REGISTRATION FORM</h1></center>
                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="name">Full Name: </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email ID: </label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Password: </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Mobile Number: </label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Address: </label>
                        <textarea name="address" cols="40" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Register</button>
                    </div>
                    <div class="text-center">
                    <a href="index.php" class="link" >Already have account?</a>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>