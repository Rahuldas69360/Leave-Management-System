<?php
	require('db_conn.inc.php');
	session_start();
	$msg="";
	if(isset($_POST['uname']) && isset($_POST['password'])){
			$uname=mysqli_real_escape_string($con,$_POST['uname']);
			$pass=mysqli_real_escape_string($con,$_POST['password']);
			$res=mysqli_query($con,"SELECT * FROM admin WHERE uname='$uname' and pass='$pass' ");
			$count=mysqli_num_rows($res);
			
			if($count>0)
			{
				$row=mysqli_fetch_assoc($res);
				$_SESSION['idn']=$row['idn'];
				$_SESSION['uname']=$row['uname'];
				header("location:Admin.php");	
			}
			else
			{
				$msg="Please enter valid id/password";
			}
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Login</title>
</head>

<style>
.styleapply{
	font: 95% Arial, Helvetica, sans-serif;
	max-width: 500px;
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
.styleapply input[type="text"],
.styleapply input[type="password"] 
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
.styleapply input[type="text"]:focus,
.styleapply input[type="password"]:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}

.styleapply button[type="submit"]{
	box-sizing: border-box;
	width: 100%;
	padding: 3%;
	background: #43D1AF;
	border-bottom: 2px solid #30C29E;
		border-top-style: none;
	border-right-style: none;
	border-left-style: none;	
	color: #fff;
}
.styleapply button[type="submit"]:hover,
.form-style-6 button[type="submit"]:hover{
	background: #2EBC99;
}


.style4 {color: #FFFF00}
.style5 {color: #FFFFFF; }
.style6 {color: #000000; font-weight:bold}
.styleapply {
	font: 95% Arial, Helvetica, sans-serif;
	max-width: 500px;
	margin: 10px auto;
	padding: 16px;
	background: #F7F7F7;
	color: #000000;
}
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
</style>
</head>
<body>
<header>

<section>
	<img src="Images/headBanner.jpeg" alt="no" width="100%" height="244"></section>
	<div class="navbar">
  <a href="index.php">Employee Login</a>
  <a href="Adminlog.php">Admin Login</a>
 </div>
</header>
<form method="post" name="log" action="#">
	<div class="styleapply">
      <h2 align="center">Admin Login Portal </h2>
	  <table width="333" align="center">
        <tr>
          <td width="77"><label>Username</label></td>
          <td width="168"><input name="uname" type="text" size="30" maxlength="15" /></td>
        </tr>
        <tr>
          <td height="56"><label>Password</label></td>
          <td><input name="password" type="password" size="30" maxlength="15" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><button type="submit" name="log">Login</button></td>
        </tr>
		<tr>
			<td colspan="2"><a href="Forgotpass.php" style="text-decoration:none;color:red;">
		    <div align="center"><span class="style7">Forgot password?</span></div></td>
		</tr>
		<tr>
			<td colspan="2" style="color: red;"><?php echo $msg; ?></td>
		</tr>
      </table>
  </div>
</form>
<footer>
	  <div style="background-color:#666666">
	  	<p align="center" class="style2">&nbsp;</p>
	  	<p align="center" class="style2">ICFAI UNIVERSITY TRIPURA PROJECT</p>
	  	<p align="center" class="style4">Address</p>
	  	<p align="center" class="style5">The ICFAI University,Kamalghat,Tripura</p>
	  	<p align="center" class="style5">Mohanpur, West Tripura -,799210, India</p>
	  	<p align="center" class="style4">Contacts</p>
	  	<p align="center" class="style5">icfai@iutripura.edu.in  </p>
	  	<p align="center" class="style5">8014253635</p>
	  	<p align="center" class="style5">&nbsp;</p>
	  </div>
</footer>
</body>
</html>
