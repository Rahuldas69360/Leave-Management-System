<?php
	require('db_conn.inc.php');
	session_start();
	$idn=$_SESSION['idn'];
	$uname=$_SESSION['uname'];
	
	if(isset($_POST['submit'])){
		$query=mysqli_query($con,"select * from admin where uname='$uname'");
		$row=mysqli_fetch_array($query);
		if ($_POST["currpass"] == $row["pass"]) 
			{
				$newpass=mysqli_real_escape_string($con,$_POST['newpass']);
				mysqli_query($con,"update admin set  pass='" . $_POST["newpass"] . "' where uname='$uname'");
					echo'<script type="text/javascript">
						window.alert("Password has been changed")</script>';	
			}
		else
			{
			echo'<script type="text/javascript">
					window.alert("Old password dose not matched!")</script>';	
			}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin- Change Password</title>
<style>
.styleapply{
	font: 95% Arial, Helvetica, sans-serif;
	max-width: 580px;
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
.styleapply input[type="Password"]
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
.styleapply input[type="password"]:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}

.styleapply button[type="submit"]{
	box-sizing: border-box;
	width: 80px;
	padding: 3%;
	background: #43D1AF;
	border-bottom: 2px solid #30C29E;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;	
	color: #fff;
}
.styleapply button:hover {
	background: #2EBC99;
}
</style>
</head>
<body>
<header>
		<?php require "include/AdminNav.php";?>
	</header>
	<form action="#" method="post" name="register">
  <div class="styleapply">
  	<h2 align="center">Change Password</h2>
	<table align="center">
		<tr><td width="137">
			<label>Current password</label></td>
	  	  <td width="165"><input name="currpass" type="password" size="30" maxlength="15" required="required" /></td>
		</tr>
		<tr><td width="137">
			<label>New Password</label></td>
	  	  <td width="165"><input name="newpass" type="password" size="30" maxlength="15" required="required" /></td>
		</tr>
		
				  <td colspan="2" align="center">
	  		<button type="submit" name="submit">Submit</button></td>
		</tr>
	</table>
    </div>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
