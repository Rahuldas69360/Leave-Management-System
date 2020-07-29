<?php 
	require('db_conn.inc.php');
	session_start();
	$error="";
	if(isset($_POST['search']))
	{
			$id=$_POST['id'];
			$query="SELECT * FROM new_emp WHERE id='$id'";
			$result=mysqli_query($con,$query);
			$count=mysqli_num_rows($result);

			if($count>0)
			{
				$row=mysqli_fetch_assoc($result);
				$_SESSION['id']=$row['id'];
				$_SESSION['name']=$row['name'];
				header("location: Register_emp.php");
			}
			else
			{
				echo'<script type="text/javascript">
					window.alert("Enter valid Id number.")</script>';
			}
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LMS- Registration</title>
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
</style>
</head>

<body>
	<form action="#" method="post" name="login">
  <div class="searching">
  	<h2 align="center">Check Employee Id</h2>
	
	<table width="327" align="center">	
		<tr><td width="74">
			<label>Enter Id</label></td>
	  	  <td width="241"><input name="id" type="text" size="30" maxlength="15" required/></td>
	  </tr>
		  <tr>
		  <td height="32" colspan="2" align="center">
  		  <button type="submit" name="search">Submit</button></td>
		</tr>
		</tr>
	</table>
    </div>
</form>
<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
