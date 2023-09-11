<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$name = "";
$email = "";
$mobile = "";
$query = "select * from admins where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_run)) {
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>USER DASHBOARD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-5.0.2-dist/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <style>
        <?php include '../assets/index.css'; ?>
    </style>
</head>

<body>
    <!------------------------------------------------------------------**THIS IS NAVBAR** ---------------------------------------------------------->
    <nav class="navbar navbar-expand-lg  navbar-expand-sm  navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">
                Library Management System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link"><b>Welcome:
                                <?php echo $_SESSION['name']; ?>
                            </b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><b>Email:
                                <?php echo $_SESSION['email']; ?>
                            </b></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-3 dropdown-toggle" data-bs-toggle="dropdown" href="#">My Profile</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="view_profile.php">View Profile</a>
                            <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                            <a class="dropdown-item" href="change_password.php">Change Password</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
            </div>
        </div>
    </nav>

    <!------------------------------------------------------------------**THIS IS MARQUEE** ---------------------------------------------------------->
    <div class="bg-warning  text-danger">
        <span>
            <marquee style="font-weight: bolder">THIS IS LIBARARY MANAGEMENT SYSTEM</marquee>
        </span>
    </div>

    <!------------------------------------------------------------------**THIS IS PROFILE** ---------------------------------------------------------->
    <div class="row" id="profile">
        <div class="col-lg-4" style="padding:0; margin:0;"></div>
        <div class="col-lg-4" style="padding-top:12vh; margin:0;">
            <form action="update.php" method="post">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" value="<?php echo $email; ?>" name="email">
                </div>
                <div class="form-group">
                    <label>Mobile:</label>
                    <input type="text" class="form-control" value="<?php echo $mobile; ?>" name="mobile">
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4" style="padding:0; margin:0;"></div>
    </div>

</body>
</html>