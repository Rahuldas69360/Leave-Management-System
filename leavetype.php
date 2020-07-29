<?php
	require('db_conn.inc.php');
	session_start();
	$id=$_SESSION['id'];
	$name=$_SESSION['name'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Leave Type</title>
<style>
	.leaveApply{
	font: 95% Arial, Helvetica, sans-serif;
	max-width: 100%;
	margin: 10px auto;
	padding: 16px;
	background: #F7F7F7;
	}
	.leaveApply h2{
	background:#43D1AF;
	padding: 20px 0;
	font-size: 140%;
	font-weight: 300;
	text-align: center;
	color: #fff;
	margin: -16px -16px 16px -16px;
}
.type a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.type a:hover, a:active {
  background-color: red;
}
</style>
</head>

<body>
	<header>
		<?php require "include/emp_nav.php"?>
	</header>

  <div class="leaveApply">
  	<h2 align="center" class="type">Select Leave Type </h2>
	<div class="type" align="center">
	<a href="cltype.php">Casual Leave</a>
	<a href="sltype.php">Sick Leave</a>
	</div>
	<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
