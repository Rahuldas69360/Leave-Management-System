<?php
	require('db_conn.inc.php');
	session_start();
	$idn=$_SESSION['idn'];
	$uname=$_SESSION['uname'];
	
	$nameError="";
	if(isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$name=mysqli_real_escape_string($con,$_POST['name']);
		$cont=mysqli_real_escape_string($con,$_POST['cont']);
		
		$sql="select * from new_emp where id='$id'";
		$res=mysqli_query($con,$sql);
		if (mysqli_num_rows($res) > 0) {
  	 		 $nameError = "This id number already taken";
		}
		else{
			 $query = mysqli_query($con,"INSERT INTO new_emp(id,name,cont) VALUES ('$id', '$name', '$cont')");
             echo'<script type="text/javascript">
					window.alert("New employee added successfully.")</script>';	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin- New Employee Register</title>
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
  	<h2 align="center">Add Employee</h2>
	<table align="center">
		<tr><td width="137">
			<label>Create ID No.</label></td>
	  	  <td width="165"><input name="id" type="text" size="30" maxlength="15" required/></td>
		</tr>
		<tr><td width="137">
			<label>Name</label></td>
	  	  <td width="165"><input name="name" type="text" size="30" maxlength="15" required/></td>
		</tr>
		<tr><td width="137">
			<label>Contact No.</label></td>
	  	  <td width="165"><input name="cont" type="text" size="30" maxlength="15" required/></td>
		</tr>
		
				  <td colspan="2" align="center">
	  		<button type="submit" name="submit">Submit</button></td>
		</tr>
	</table>
	<p align="center" style="color:red;"><?php echo $nameError;?></p>
    </div>
</form>
  <div class="searching">
  	<h2 align="center">All Employees</h2>
		<div class="record">
		<table width="98%" align="center" class="tb">
			<tr bgcolor="#CCCCCC">
				<th width="5%">ID No.</th>
				<th width="15%">Name</th>
				<th width="10%">Email</th>
				<th width="11%">State</th>
				<th width="11%">City</th>
				<th width="11%">Date of Joining</th>
			</tr>
<?php
			require('db_conn.inc.php');
				$query ="SELECT * FROM empregis order by id desc";
				$query_run=mysqli_query($con,$query);
				while($row = mysqli_fetch_array($query_run))
				{	
?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['state']; ?></td>
				<td><?php echo $row['city']; ?></td>
				<td><?php echo $row['doj']; ?></td>
			</tr>
<?php 
				}
?>

		</table>
		
	</div>
    </div>
<div>
		<footer><?php require('include/Footer.php');?></footer>
</div>
</body>
</html>