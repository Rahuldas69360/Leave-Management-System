<?php 
	require('db_conn.inc.php');
	session_start();
	$error="";
	if(isset($_POST['id']) && isset($_POST['pass'])){
			$id=mysqli_real_escape_string($con,$_POST['id']);
			$pass=mysqli_real_escape_string($con,$_POST['pass']);
			$res=mysqli_query($con,"SELECT * FROM empregis WHERE id='$id' and pass='$pass' ");
			$count=mysqli_num_rows($res);
			if($count>0)
			{
				$row=mysqli_fetch_assoc($res);
				$_SESSION['id']=$row['id'];
				$_SESSION['name']=$row['name'];
				header("location: emp_home.php");
				die();
			}
			else
			{
				echo'<script type="text/javascript">
					window.alert("Enter correct username/password")</script>';
				//$error="Please enter valid id/password";
			}
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Home - LMS</title>
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
.styleapply input[type="password"],
.stleapply input[type="dept"],
.styleapply select 
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
.styleapply button[type="submit"]:hover{
	background: #2EBC99;
	text-align: inherit;
}


.style4 {color: #FFFF00}
.style5 {color: #FFFFFF; }
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
.style7 {color: #FF0000}
</style>
</head>
<body>
<header>

<section>
	<img src="Images/headBanner.jpeg" alt="lms" width="100%" height="244" ></section>
	<div class="navbar">
 		 <a href="index.php">Employee Login</a>
 	 	<a href="Adminlog.php">Admin Login</a>
 </div>
</header>
<form method="post" name="log" action="#">
  <div class="styleapply">
      <h2 align="center">Employee Login Portal </h2>
	  
      <table width="400" height="215" align="center">
        <tr>
          <td width="145" height="45"><label>ID No</label></td>
          <td width="220"><input name="id" type="text" id="id" size="30" maxlength="15" required/></td>
        </tr>
        <tr>
          <td height="45"><label>Password</label></td>
          <td><input name="pass" type="password" id="pass" size="30" maxlength="15" required/></td>
        </tr>
        <tr>
          <td height="45" colspan="2" align="center"><button type="submit" name="login">Login</button></td>
        </tr>
		<tr>
			<td height="22" colspan="2"><a href="Forgotpass.php" style="text-decoration:none;color:red;">
	      <div align="center"><span class="style7">Forgot password?</span></div></td>
		</tr>
        <tr>
          <td height="19" colspan="2"><div align="center"><a href="empidcheck.php" style="text-decoration:none;color:red; ">New Registration Click Here</a></div></td>
        </tr>
        <tr>
          <td colspan="2" style="color:red"><div align="center"><?php echo $error;?></div></td>
        </tr>
    </table>
  </div>
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
  </form>
</body>
</html>
