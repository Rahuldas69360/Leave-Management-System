<?php 
if(!isset($_SESSION['id'])&& !isset($_SESSION['name'])){
    header('location:index.php');
    die();
  }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee-Home</title>
<style>
	.emp_navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
  
}

.emp_navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.emp_dd {
  float: left;
  overflow: hidden;
}

.emp_dd .emp_dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.emp_navbar a:hover, .emp_dd:hover .emp_dropbtn {
  background-color: red;
}

.emp_dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.emp_dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.emp_dropdown-content a:hover {
  background-color: #ddd;
}

.emp_dd:hover .emp_dropdown-content {
  display: block;
}
.heading {
font-family:Arial, Helvetica, sans-serif;
font-style:bold;
font-size:22px;
}
</style>
</head>

<body>
	<div class="heading">
		<h2 align="center">Employee Leave Management System</h2>
	</div>
<header>
	<div class="emp_navbar">
  <a href="emp_home.php">Employee Home</a>
  <div class="emp_dd">
    <button class="emp_dropbtn">Employee Tools 
      <i class="dropp"></i>
    </button>
    <div class="emp_dropdown-content">
      <a href="manage_profile.php">Manage Profile</a>
      <a href="leavetype.php">Apply for Leave</a>
      <a href="leavestatus.php">Check Leave Status</a>
	  <a href="EmpChangePass.php">Change Password</a>
    </div>
  </div> 
  <a href="logout.php">Logout</a>
</div>
</body>
</html>
