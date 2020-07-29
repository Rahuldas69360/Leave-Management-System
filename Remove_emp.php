<?php
	require('db_conn.inc.php');
	session_start();
	$idn=$_SESSION['idn'];
	$uname=$_SESSION['uname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin-Remove employee</title>
<style>
	.searching{
	font: 95% Arial, Helvetica, sans-serif;
	margin: 10px auto;
	padding: 16px;
	background: #F7F7F7;
	width:100%;
	}
	.record{
	font: 95% Arial, Helvetica, sans-serif;
	margin: 1px solid #dddddd;
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
<header>
	<?php require "include/AdminNav.php"?>
</header>
	<form action="#" method="post">
 	 <div class="searching">
  		<h2 align="center">Search An Employee For Remove</h2>
	
	<table width="309" align="center">	
		<tr><td>
			<label>ID No </label></td>
	  	  <td><input name="id" type="text" size="30" maxlength="15" required="required" /></td>
	  </tr>
		  <tr>
		  <td height="32" colspan="2" align="center">
  		  <button type="submit" name="search"> Search</button></td>
		</tr>
	</table>
    </div>
	</form>
	<div class="record">
		<table class="tb" align="center">
			<tr bgcolor="#CCCCCC">
				<th>Name</th>
				<th>Date Of Joining</th>
				<th>Designation</th>
				<th>State</th>
				<th>Contact</th>
				<th>Action</th>
			</tr>
<?php			
			if(isset($_POST['search'])){
				$id = mysqli_real_escape_string($con,$_POST['id']);
				$query ="SELECT * FROM empregis WHERE id='$id' ";
				$query_run=mysqli_query($con,$query);
				while($row = mysqli_fetch_array($query_run))
				{	
					$_SESSION['id']=$row['id'];
?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['doj']; ?></td>
				<td><?php echo $row['desg']; ?></td>
				<td><?php echo $row['state']; ?></td>
				<td><?php echo $row['mob']; ?></td>
				<td> <a href="del_emp.php">Delete</a> </td>
			</tr>
<?php 
				}

			}
?>

		</table>
		
	</div>
	<div>
		<footer><?php require('include/Footer.php');?></footer></div>

</body>
</html>
