<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $book_name = "";
    $author = "";
    $book_no = "";
    $query = "select book_name, book_author, book_no from issued_books where student_id = $_SESSION[id] and status = 1";
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
      <a class="navbar-brand" href="user_dashboard.php">
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
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form action="">
            <table class="table-bordered" width="900px" style="text-align: center;">
                 <tr>
                    <th>Book Name: </th>
                    <th>Author: </th>
                    <th>Book No: </th>
                 </tr>
                 <?php

                 $query_run = mysqli_query($connection, $query);
                 while ($rows = mysqli_fetch_assoc($query_run)) 
                 {
                    $book_name = $rows['book_name'];
                    $author = $rows['book_author'];
                    $book_no = $rows['book_no'];
                 ?>
                 <tr>
                    <td><?php  echo  $book_name; ?></td> 
                    <td><?php  echo  $author; ?></td>
                    <td><?php  echo  $book_no; ?></td>
                 </tr>
                 <?php
                 }
                 ?>
            </table>
        </form>
    </div>
    <div class="col-lg-2"></div>
  </div>

</body>
</html> 