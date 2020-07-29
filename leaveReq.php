<?php
	require('db_conn.inc.php');
	session_start();
	$idn=$_SESSION['idn'];
	$uname=$_SESSION['uname'];

	if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['sl'])){
		$sl=mysqli_real_escape_string($con,$_GET['sl']);
		$status=mysqli_real_escape_string($con,$_GET['status']);
		mysqli_query($con, "update allleave set status='$status' where sl='$sl'");
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin - Accept or Reject Leave</title>
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
.searching select
{

	outline: none;
	width: 50%;
	background: #fff;
	margin-bottom: 4%;
	border: 1px solid #ccc;
	padding: 3%;
	color: #555;
	font: 95% Arial, Helvetica, sans-serif;
}
.searching select:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
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
	<header><?php require "include/AdminNav.php"?></header>
  <div class="searching">
  	<h2 align="center">Accept/Reject Leave </h2>
		<div class="record">
		<table width="98%" align="center" class="tb">
			<tr bgcolor="#CCCCCC">
				<th width="4%">ID No.</th>
				<th width="14%">Name</th>
				<th width="13%">Leave Type</th>
				<th width="9%">Leave Start Date</th>
				<th width="10%">Leave End Date</th>
				<th width="10%">Total Days</th>
				<th width="10%">Reason</th>
				<th width="11%">Status</th>
			</tr>
<?php

				$query ="SELECT * FROM `allleave` order by sl desc";
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
				<td width="19%"><select name="select"  onchange="update_status('<?php echo $row['sl'];?>',this.value);">
					<option value="0">--Select Status--</option>
					<option value="Approved">Approved</option>
					<option value="Rejected">Rejected</option>
			  </select></td>
			</tr>
<?php 
				}
?>

		</table>
		
	</div>
    </div>
	<script type="text/javascript">
		function update_status(sl,select_value){
			window.location.href='leaveReq.php?sl='+sl+'&type=update&status='+select_value;
				}
	</script>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
