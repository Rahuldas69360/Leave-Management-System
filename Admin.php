<?php
	require('db_conn.inc.php');
	session_start();
	$idn=$_SESSION['idn'];
	$uname=$_SESSION['uname'];
	
	$query=mysqli_query($con,"select * from admin where idn='$idn'");
	$row=mysqli_fetch_assoc($query); //Fetch a result row as an associative array
	$uname=$row['uname'];
	$name=$row['name'];
	$gender=$row['gender'];
	$email=$row['email'];
	$doj=$row['doj'];
	$dob=$row['dob'];
	$mob=$row['mob'];
	$state=$row['state'];
	$city=$row['city'];
	$count=$row['count'];
	$pin=$row['pin'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin- Home</title>
<style>
.styleapply{
	font: 95% Arial, Helvetica, sans-serif;
	max-width: 450px;
	margin: 10px auto;
	padding: 16px;
	background: #F7F7F7;
	}
	.styleapply h2{
	background:#43D1AF;
	padding: 20px 0;
	font-size: 140%;
	font-weight: 300;
	text-align: center;
	color: #fff;
	margin: -16px -16px 16px -16px;
}


</style>
</head>
<body>
	<header>
		<?php require "include/AdminNav.php";?>
	</header>
<div>
	<h2 align="center">Welcome To Admin Portal</h2>
</div>
	<form action="#" method="post">
  <div class="styleapply">
  	<h2 align="center">Admin Profile </h2>
	<table width="265" align="center">
		<tr>
		  <td width="161" height="28"><label>User Name: </label></td>
		  <td width="92"><label><b><?php echo $uname;?></b></label></td>
		</tr>
		<tr>
		  <td height="30"><label>Name: </label></td>
			<td><label><b><?php echo $name;?></b></label></td>
		</tr>
		<tr>
		  <td height="28"><label>Gender: </label></td>
			<td><label><?php echo $gender;?><b></label></td>
		</tr>
		<tr>
		  <td height="29"><label>Email Address: </label></td>
			<td><label><b><?php echo $email;?></b></label></td>
		</tr>
		<tr>
		  <td height="29"><label>Date of Joining: </label></td>
			<td><label><b><?php echo $doj;?></b></label></td>
		</tr>
		<tr>
		  <td height="26"><label>Date of Birth: </label></td>
			<td><label><b><?php echo $dob;?></b></label></td>
		</tr>
		<tr>
		  <td height="27"><label>Contact No: </label></td>
			<td><label><b><?php echo $mob;?></b></label></td>
		</tr>
		<tr>
		  <td height="29"><label>State: </label></td>
			<td><label><b><?php echo $state;?></b></label></td>
		</tr>
		<tr>
		  <td height="25"><label>City: </label></td>
			<td><label><b><?php echo $city;?></b></label></td>
		</tr>
		<tr>
		  <td height="28"><label>Country: </label></td>
			<td><label><b><?php echo $count;?></b></label></td>
		</tr>
		<tr>
		  <td height="30"><label>Pin Code: </label></td>
			<td><label><b><?php echo $pin;?></b></label></td>
		</tr>
	</table>
    </div>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
