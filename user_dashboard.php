<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if (!$_SESSION['email'])
{
  header("Location: index.php");
}


function get_book_count()
{
  $connection = mysqli_connect("localhost", "root", "");
  $db = mysqli_select_db($connection, "lms");
  $book_count = "";
  $query = "select count(*) as user_issued_book from issued_books where student_id = $_SESSION[id]";
  $query_run = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($query_run)) {
      $book_count = $row['user_issued_book'];
  }
  return($book_count);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>USER DASHBOARD</title>
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
      <a class="navbar-brand" href="">
        Library Management System
      </a>  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
           <li class="nav-item">
             <a class="nav-link"><b>Welcome: <?php echo $_SESSION['name']; ?></b></a>
          </li>
          <li class="nav-item">
             <a class="nav-link"><b>Email: <?php echo $_SESSION['email']; ?></b></a>
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

  <!------------------------------------------------------------------**THIS IS MAIN CONTENTS** ---------------------------------------------------------->
  <br><br>
  <div class="row">
    <div class="col-lg-3 col-md-3"></div>
    <div class="col-lg-3 col-md-3">
      <div class="card bg-light" style="width:25vw;">
        <div class="card-header">
          <b>Issued Books:</b>
        </div>
        <div class="card-body">
          <p class="card-text">No. of issued books: <?php echo get_book_count(); ?></p>
          <a href="view_issued_book.php" class="btn btn-danger" target="_blank">View Issued Books</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3"></div>
    <div class="col-lg-3 col-md-3"></div>
  </div>

</body>
</html>