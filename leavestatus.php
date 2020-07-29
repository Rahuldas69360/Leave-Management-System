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
<title>LMS-  Leave Status</title>
<style>
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
.searching input[type="text"]
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
.searching input[type="text"]:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}.searching button[type="submit"]{
	box-sizing: border-box;
	padding: 3%;
	background: #43D1AF;
	border-bottom: 2px solid #30C29E;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;	
	color: #fff;
}
.searching button[type="submit"]:hover{
	background: #2EBC99;
	text-align: inherit;
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
	<form action="#" method="post" name="applyleave">
	<header><?php require "include/emp_nav.php"?></header>
  <div class="searching">
  	<h2 align="center">Leave Status</h2>
		<div class="record">
		<table width="98%" align="center" class="tb">
			<tr bgcolor="#CCCCCC">
				<th width="5%">ID No.</th>
				<th width="15%">Name</th>
				<th width="10%">Leave Type</th>
				<th width="11%">Leave Start Date</th>
				<th width="11%">Leave End Date</th>
				<th width="11%">Total Days</th>
				<th width="11%">Reason</th>
				<th>Status</th>
			</tr>
<?php
			require('db_conn.inc.php');
				$id=$_SESSION['id'];
				$query ="SELECT * FROM `allleave` where id='$id'";
				$query_run=mysqli_query($con,$query);
				while($row = mysqli_fetch_array($query_run))
				{	
?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><?php echo $row['start_date']; ?></td>
				<td><?php echo $row['end_date']; ?></td>
				<td><?php echo $row['days']; ?></td>
				<td><?php echo $row['reason']; ?></td>
				<td><?php echo $row['status']; ?></td>
			</tr>
<?php 
				}
?>

		</table>
		
	</div>
    </div>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer></div>
<body>
</body>
</html>
