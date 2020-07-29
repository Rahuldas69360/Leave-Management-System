<?php
	require('db_conn.inc.php');
	session_start();
	$id=$_SESSION['id'];
	$name=$_SESSION['name'];
	$res=mysqli_query($con,"select * from empregis where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$_SESSION['name']=$row['name'];
	$_SESSION['dob']=$row['dob'];
	$_SESSION['doj']=$row['doj'];
	$_SESSION['email']=$row['email'];
	$_SESSION['desg']=$row['desg'];
	$_SESSION['intrst']=$row['intrst'];
	$_SESSION['mob']=$row['mob'];
	
	if (isset($_POST['update'])){
		//$name=mysqli_real_escape_string($con,$_SESSION['name']);
		$dob=mysqli_real_escape_string($con,$_POST['dob']);
		//$doj=mysqli_real_escape_string($con,$_SESSION['doj']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$desg=mysqli_real_escape_string($con,$_POST['desg']);
		$intrst=mysqli_real_escape_string($con,$_POST['intrst']);
		$mob=mysqli_real_escape_string($con,$_POST['mob']);

  		$up="UPDATE empregis SET dob='$dob',email='$email',desg='$desg',intrst='$intrst',mob='$mob' where id=$id";
		if(mysqli_query($con,$up)){ 
			//echo'<script type="text/javascript">
					//window.alert("Profile updated successfully. Please refresh the page")</script>';
    		header('location:manage_profile.php');
		} else { 
    		$msg="ERROR: Could not able to execute"; 
			}  
			 
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LMS- Update Profile</title>
<style>
.update_emp{
	font: 95% Arial, Helvetica, sans-serif;
	max-width: 100%;
	margin: 10px auto;
	padding: 16px;
	background: #F7F7F7;
	}
	.update_emp h2{
	background:#43D1AF;
	padding: 20px 0;
	font-size: 140%;
	font-weight: 300;
	text-align: center;
	color: #fff;
	margin: -16px -16px 16px -16px;
}
.update_emp input[type="text"],
.update_emp input[type="date"],
.update_emp input[type="password"],
.update_emp textarea
{

	outline: none;
	width: 100%;
	background: #fff;
	margin-bottom: 4%;
	border: 1px solid #ccc;
	padding: 3%;
	color: #555;
	font: 95% Arial, Helvetica, sans-serif;
}
.update_emp input[type="text"]:focus,
.update_emp input[type="date"]:focus,
.update_emp input[type="password"]:focus,
.update_emp textarea:focus

{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}

.update_emp button[type="submit"],
.update_emp button[type="submit"]{
	box-sizing: border-box;
	width: 100px;
	padding: 3%;
	background: #43D1AF;
	border-bottom: 2px solid #30C29E;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;	
	color: #fff;
}
.update_emp button[type="submit"]:hover{
	background: #2EBC99;
}
</style>
</head>

<body>
	<header>
		<?php require "include/emp_nav.php"?>
	</header>
	<form action="#" method="post" name="update">
  <div class="update_emp">
  	<h2 align="center">Update your Profile </h2>
	
	<table align="center">
		
		<tr><td width="77">
			<label>
			<div align="left">Name
			  </label>
			</div></td>
		  	<td width="168"><input name="name" type="text" value="<?php echo $_SESSION['name'];?>" size="30" maxlength="15" disabled="disabled"/></td>
		</tr>
		<tr><td>
			<label>
			<div align="left">Date of Birth
			  </label>
			</div></td>
			<td><input type="date" name="dob" value="<?php echo $_SESSION['dob'];?>" required></td>
		</tr>
		<tr><td>
			<label>
			<div align="left">Date of Joining
			  </label>
			</div></td>
			<td><input type="date" name="doj" value="<?php echo $_SESSION['doj'];?>" disabled="disabled"></td>
		</tr>
		<tr><td>
			<label>
			<div align="left">Email ID
			  </label>
			</div></td>
			<td><input type="text" name="email" size="30" maxlength="50" value="<?php echo $_SESSION['email'];?>" required></td>
		</tr>
		<tr><td>
			<label>
			<div align="left">Designation
			  </label>
			</div></td>
			<td><input type="text" name="desg" size="30" maxlength="15" value="<?php echo $_SESSION['desg'];?>"></td>
		</tr>
		<tr><td>
			<label>
			<div align="left">Area of Interest
			  </label>
			</div></td>
			<td><input type="text" name="intrst" size="30" value="<?php echo $_SESSION['intrst'];?>"></td>
		</tr>
		<tr><td>
			<label>
			<div align="left">Mobile No.
			  </label>
			</div></td>
			<td><input type="text" name="mob" size="30" maxlength="12" value="<?php echo $_SESSION['mob'];?>" required></td>
		</tr>
		<tr>
		  <td colspan="2" align="center">
	  		<button type="submit" name="update">Update</button></td>
		</tr>
	</table>
    </div>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
