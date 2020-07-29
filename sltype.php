<?php
	require('db_conn.inc.php');
	session_start();
	$id=$_SESSION['id'];
	$name=$_SESSION['name'];
	$res="select * from empregis where id='$id' ";
	$query_run=mysqli_query($con,$res);
	$row=mysqli_fetch_assoc($query_run);
	$sl=$row['sl'];
	
	$msgSl="";
	$errStart=$errEnd=$errDays="";
	
	if(isset($_POST['apply'])){
		$sdate=mysqli_real_escape_string($con,$_POST['start_date']);
		$edate=mysqli_real_escape_string($con,$_POST['end_date']);
		$days=mysqli_real_escape_string($con,$_POST['days']);
		$reason=mysqli_real_escape_string($con,$_POST['reason']);
		if(($sl<$days)){
			$msgCl="Please check available sick leave.";
			}
			else{
				$sl=($sl-$days);	
				$query = "INSERT INTO allleave(id,name,type,start_date,end_date,days,reason,status) VALUES ('$id','$name','Sick Leave','$sdate','$edate','$days','$reason','Applied')";
				$res=mysqli_query($con,$query);
				if($res==true){
					$up = "UPDATE empregis SET sl='$sl' where id='$id'";
					mysqli_query($con,$up);
					echo'<script type="text/javascript">
					window.alert("Your sick leave application has been applied")</script>';
				}
				else
				{
				echo'<script type="text/javascript">
				window.alert("Some query issue occurs.")</script>';
				}	
				}	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LMS- Apply for leave</title>
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
.leaveApply input[type="text"],
.leaveApply input[type="date"],
.leaveApply select,
.leaveApply textarea
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
.leaveApply input[type="text"]:focus,
.leaveApply input[type="date"]:focus,
.leaveApply select:focus,
.leaveApply textarea:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}

.leaveApply button[type="submit"],
.leaveApply button[type="submit"]{
	box-sizing: border-box;
	width: 100;
	padding: 3%;
	background: #43D1AF;
	border-bottom: 2px solid #30C29E;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;	
	color: #fff;
}
.leaveApply button[type="submit"]:hover,
{
	background: #2EBC99;
}
</style>
</head>

<body>
	<header>
		<?php require "include/emp_nav.php"?>
	</header>
	<form action="#" method="post" name="applyLeave">
  <div class="leaveApply">
  	<h2 align="center">Selected Type: <b>Sick Leave</b></h2>
	<p>Sick Leave Available: 
    <label><?php echo $sl;?></label>
	<table align="center">
		<tr><td width="120">
			<label>Name</label></td>
	  	  <td width="216"><input name="name" type="text" value="<?php echo $name;?>" size="30" maxlength="15" readonly/></td>
		  <td></td>
		</tr>
		<tr><td height="37">
			<label>Leave Start Date </label></td>
			<td><input type="date" name="start_date" required></td>
			<td style="color:red; text-align:center"><?php echo $errStart;?></td>
		</tr>
		<tr>
			<td>Leave End Date</td>
			<td><input type="date" name="end_date" required></td>
			<td style="color:red; text-align:center"><?php echo $errEnd;?></td>
		</tr>
		<tr>
			<td>Total Days</td>
			<td><input type="text" name="days" placeholder="Enter total leave days" size="30" required></td>
			<td style="color:red; text-align:center"><?php echo $errDays;?><?php echo $msgSl;?></td>
		</tr>
		<tr>
			<td>Reason For Leave</td>
			<td><textarea name="reason" rows="7"></textarea></td>
			<td></td>
		</tr>
		<tr>
		  <td colspan="2" align="center">
	  		<button type="submit" name="apply">Apply</button></td>
		</tr>
	</table>
	<p align="center"></p>
    </div>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
