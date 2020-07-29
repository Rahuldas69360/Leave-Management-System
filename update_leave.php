<?php
	require('db_conn.inc.php');
	session_start();
	$idn=$_SESSION['idn'];
	$uname=$_SESSION['uname'];
	
	$nameError="";
	if(isset($_POST['update_cl'])){
		$days=mysqli_real_escape_string($con,$_POST['days']);
		
		$query = mysqli_query($con,"UPDATE empregis set cl='$days'");
		if($query==true){
			echo'<script type="text/javascript">
				window.alert("CL Updated Successfully.")</script>';
		}
		else{
			echo'<script type="text/javascript">
				window.alert("Sorry CL not updated.")</script>';
	}
}
if(isset($_POST['update_sl'])){
		$days=mysqli_real_escape_string($con,$_POST['days']);
		
		$query = mysqli_query($con,"UPDATE empregis set sl='$days'");
		if($query==true){
			echo'<script type="text/javascript">
				window.alert("SL Updated Successfully.")</script>';
		}
		else{
			echo'<script type="text/javascript">
				window.alert("Sorry SL not updated.")</script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin- Update Leave</title>
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
.styleapply input[type="text"]
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
.styleapply input[type="text"]:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}

.styleapply button[type="submit"]{
	box-sizing: border-box;
	width: 120px;
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
.searching{
	font: 95% Arial, Helvetica, sans-serif;
	margin: 10px auto;
	padding: 16px;
	background: #F7F7F7;
	width:100%;
	}
	.searching h2{
	background:#43D1AF;
	padding: 20px 0;
	font-size: 140%;
	font-weight: 300;
	text-align: center;
	color: #fff;
	margin: -16px -16px 16px -16px;
}
.tb{
	font-family:Arial, Helvetica, sans-serif;
	border-collapse:collapse;
	width:100%;
}
.tb td,th{
	border:1px solid #dddddd;
	text-align:left;
	padding:8px;
}
.tb a{
text-decoration:none;}
</style>
</head>
<body>
<header>
		<?php require "include/AdminNav.php";?>
	</header>
	<form action="#" method="post" name="register">
  <div class="styleapply">
  	<h2 align="center">Update Leave Days</h2>
	<table align="center">
		<tr><td width="137">
			<label>Enter Leave Days:</label></td>
	  	  <td width="165"><input name="days" type="text" size="30" maxlength="2" required/></td>
		</tr>
		<tr>
			<td>
		  		<button type="submit" name="update_cl">UPDATE CASUAL LEAVE</button></td>
		  	<td>
		  		<button type="submit" name="update_sl">UPDATE SICK LEAVE</button></td>
		</tr>

	</table>
    </div>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer>
</div>
</body>
</html>