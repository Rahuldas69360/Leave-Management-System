<?php 
if(!isset($_SESSION['idn'])&& !isset($_SESSION['uname'])){
		header('location:Adminlog.php');
		die();
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<style>
	.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.heading {
font-family:Arial, Helvetica, sans-serif;
font-style:bold;
font-size:22px;
}
</style>
<body>
	<div class="heading">
		<h2 align="center">Employee Leave Management System</h2>
	</div>
<header>
	<div class="navbar">
  <a href="Admin.php">Admin Home</a>
  <div class="dropdown">
    <button class="dropbtn">Admin Tools 
      <i class="dropp"></i>
    </button>
    <div class="dropdown-content">
	     <a href="AdminAddEmp.php">Add New Employee</a>
       <a href="Remove_emp.php">Remove An Employee Profile</a>
       <a href="leaveReq.php">Accept/Reject Leave</a>
       <a href="update_leave.php">Update Leave Days</a>
	     <a href="AdminChngPass.php">Change Password</a>
    </div>
  </div> 
  <a href="Adlogout.php">Logout</a>
</div>
</body>
</html>
