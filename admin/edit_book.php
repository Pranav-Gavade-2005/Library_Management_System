<?php
require('functions.php');
session_start();

        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");
        $book_no = "";
        $book_name = "";
        $author_id = "";
        $cat_id = "";
        $book_price = "";

        $query = "select * from books where book_no = $_GET[bn]";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($query_run)) 
        {
            $book_name = $row['book_name'];
            $book_no= $row['book_no'];
            $author_id = $row['author_id'];
            $cat_id = $row['cat_id'];
            $book_price = $row['book_price'];
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ADMIN DASHBOARD</title>
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
    <!------------------------------------------------------------------**THIS IS DASHBOARD NAVBAR** ---------------------------------------------------------->

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; padding-top: 0; padding-bottom: 0;">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item" >
		        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
		      </li>

		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="padding-left: 3vw;">Books </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_book.php">Add New Book</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_book.php">Manage Books</a>
	        	</div>
		      </li>

		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="padding-left: 3vw;">Category </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_cat.php">Add New Category</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_cat.php">Manage Category</a>
	        	</div>
		      </li>

		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="padding-left: 3vw;">Authors</a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_author.php">Add New Author</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_author.php">Manage Author</a>
	        	</div>
		      </li>

	          <li class="nav-item">
		        <a class="nav-link" href="issue_book.php" style="padding-left: 3vw;">Issue Book</a>
		        </li>
            
		    </ul>
		</div>
	</nav>
  <!------------------------------------------------------------------**THIS IS MARQUEE** ---------------------------------------------------------->
  <div class="bg-warning  text-danger">
    <span>
      <marquee style="font-weight: bolder">THIS IS LIBARARY MANAGEMENT SYSTEM</marquee>
    </span>
  </div>

  <!------------------------------------------------------------------**THIS IS MAIN CONTENTS** ---------------------------------------------------------->
  <br>
  <div class="row">
    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4">
        <form action="" method="post">
            <div class="form-group">
                <label>Book No:</label>
                <input type="text" name="book_no" class="form-control" value="<?php echo $book_no; ?>"required>
            </div>
            <div class="form-group">
                <label>Book Name:</label>
                <input type="text" name="book_name" class="form-control" value="<?php echo $book_name; ?>"required>
            </div>
            <div class="form-group">
                <label>Author ID:</label>
                <input type="text" name="author_id" class="form-control" value="<?php echo $author_id; ?>"required>
            </div>
            <div class="form-group">
                <label>Category ID:</label>
                <input type="text" name="cat_id" class="form-control" value="<?php echo $cat_id; ?>"required>
            </div>
            <div class="form-group">
                <label>Book Price:</label>
                <input type="text" name="book_price" class="form-control" value="<?php echo $book_price; ?>"required>
            </div>
    
            <div class="text-center">
            <input type="submit" class ="btn btn-primary" value="Update Book" name="update_book">           
           </div>
        </form>
    </div>
    <div class="col-lg-4 col-md-4"></div>
  </div>
  <?php
  if(isset($_POST['update_book']))
  {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $query = "update books set book_name = '$_POST[book_name]', author_id = $_POST[author_id], cat_id = $_POST[cat_id], book_price = $_POST[book_price] where book_no = $_GET[bn]";
    $query_run = mysqli_query($connection, $query);
    echo "<script>window.location.href = 'manage_book.php';</script>";
  }
  ?>

</body>
</html>