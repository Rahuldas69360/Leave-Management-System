<?php
	require('db_conn.inc.php');
	session_start();
	$id=$_SESSION['id'];
	$res=mysqli_query($con,"select * from new_emp where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$_SESSION['id']=$row['id'];
	$_SESSION['name']=$row['name'];
	$_SESSION['cont']=$row['cont'];
	$id=$row['id'];
	$name=$row['name'];
	$cont=$row['cont'];
	$cl=10;
	$sl=10;
	
	$desgErr=$genderErr=$passErr=$stateErr=$cityErr=$countErr=$pinErr=$dojErr="";
	
	if(isset($_POST['submit']))
	{
			$id=mysqli_real_escape_string($con,$_POST['id']);
			$name=mysqli_real_escape_string($con,$_POST['name']);
			$desg=mysqli_real_escape_string($con,$_POST['desg']);
			$gender=mysqli_real_escape_string($con,$_POST['gender']);
			$pass=mysqli_real_escape_string($con,$_POST['pass']);
			$state=mysqli_real_escape_string($con,$_POST['state']);
			$city=mysqli_real_escape_string($con,$_POST['city']);
			$count=mysqli_real_escape_string($con,$_POST['count']);
			$pin=mysqli_real_escape_string($con,$_POST['pin']);
			$doj=mysqli_real_escape_string($con,$_POST['doj']);
			$mob=mysqli_real_escape_string($con,$_POST['cont']);
			
			
			$desg=test_input($desg);
			if(!preg_match("/^[a-zA-Z- ]*$/",$desg)){
				$desgErr="Only characters allowed!";
				}
			$pass=test_input($pass);	
			if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]
{6,15}$/',$pass)) {
    $passErr="Password must contain 6 characters of letters, numbers and 
    at least one special character.";
}
			$state=test_input($state);
			if(!preg_match("/^[a-zA-Z]*$/",$state)){
				$stateErr="Only characters allowed!";
				}

			$city=test_input($city);
			if(!preg_match("/^[a-zA-Z]*$/",$city)){
					$cityErr="Only characters allowed!";
				}
			$count=test_input($count);
			if(!preg_match("/^[a-zA-Z]*$/",$count)){
				$countErr="Only characters allowed!";
				}
			$pin=test_input($pin);
			if(!preg_match("/^[0-9]{6}$/",$pin)){
				$pinErr="6 digit pin numbers allowed!";
				}
			else{
				$res="INSERT INTO empregis(id,name,desg,gender,pass,state,city,count,pin,doj,mob,cl,sl) VALUES ('$id','$name','$desg','$gender','$pass','$state','$city','$count','$pin','$doj','$mob','$cl','$sl')";
				$run=mysqli_query($con,$res);
				if($run==true)
				{
					mysqli_query($con,"delete from new_emp where id='$id'");
					echo'<script type="text/javascript">
					window.alert("Successfully Registered, now your account is ready for access.")</script>';	
				}
				else
				{
				echo'<script type="text/javascript">
					window.alert("Some query issue occurs.")</script>';
				}
			}
		}
			function test_input($data){
				$data=trim($data);
				$data=stripslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Registration</title>
<style>
.styleapply{
	font: 95% Arial, Helvetica, sans-serif;
	max-width: 100%;
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
.styleapply input[type="text"],
.styleapply input[type="Password"],
.stleapply input[type="date"],
.styleapply input[type="date"],
.styleapply input[text="text"],
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
.styleapply input[type="text"]:focus,
.styleapply input[type="text"]:focus,
.styleapply input[type="Password"]:focus,
.styleapply input[type="date"]:focus,
.styleapply input[type="date"]:focus,
.styleapply input[type="text"]:focus,
.styleapply input[type="text"]:focus,
.styleapply input[type="radio"]:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}

.styleapply button[type="submit"],
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
.styleapply a{
text-decoration:none;
float:right;
font-weight:bolder;}
</style>
</head>


<body>
		<h2 align="center">Employee Leave Management System</h2>
	<form action="#" method="post" name="register">
  <div class="styleapply">
  	<h2 align="center">Register An Employee</h2>
	<a href="index.php">Click Here For Login</a>
	<table align="center">
		<tr><td width="130">
			<label>Id no</label></td>
		  	<td width="168"><input name="id" type="text" value="<?php echo $id;?>" size="30" maxlength="15" readonly/></td>
			<td><div align="center"></div></td>
		</tr>
		<tr><td width="130">
			<label>Name</label></td>
		  	<td width="168"><input name="name" type="text" value="<?php echo $name;?>" size="30" maxlength="15" readonly/></td>
			<td><div align="center"></div></td>
		</tr>
		<tr><td>
			<label>Designation</label></td>
			<td><input name="desg" type="text" size="30" maxlength="15" required/></td>
			<td width="252" style="color:red;"><div align="center"><?php echo $desgErr;?></div></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><input name="gender" id="gen" type="radio" value="Male" required/>Male
			<input name="gender" id="gen" type="radio" value="Female" required/>Female</td>
			<td style="color:red;"><div align="center"><?php echo $genderErr;?></div></td>
		</tr>
		<tr><td>
			<label>Password</label></td>
			<td><input type="Password" name="pass" size="30" required></td>
			<td></td>
		</tr>
		<tr><td>
			<label>State</label></td>
			<td><input type="text" name="state" size="30" maxlength="15" required></td>
			<td style="color:red;"><div align="center"><?php echo $stateErr;?></div></td>
		</tr>
		<tr><td>
			<label>City</label></td>
			<td><input type="text" name="city" size="30" maxlength="15" required></td>
			<td style="color:red;"><div align="center"><?php echo $cityErr;?></div></td>
		</tr>
		<tr><td>
			<label>Country</label></td>
			<td><input type="text" name="count" size="30" maxlength="15" required></td>
			<td style="color:red;"><div align="center"><?php echo $countErr;?></div></td>
	  </tr>
			<tr><td>
			<label>Pin Code</label></td> 
			<td><input type="text" name="pin" size="30" maxlength="7" ></td>
			<td style="color:red;"><div align="center"><?php echo $pinErr;?></div></td>
			</tr>
			<tr><td>
			<label>Date of Joining</label></td>
			<td><input type="date" name="doj" size="30" maxlength="15" required></td>
			<td style="color:red;"><div align="center"><?php echo $dojErr;?></div></td>
			</tr>
			<tr>
				<td>Contact No.</td>
				<td><input type="text" name="cont" size="30" maxlength="12" value="<?php echo $cont;?>" readonly></td>
			</tr>
		<tr>
			<td></td>
		  <td align="center">
	  		<button type="submit" name="submit">Register</button></td>
			<td></td>
		</tr>
	</table>
	<p align="center" style="color:red"><?php echo $passErr;?></p>
    </div>
	
</form>
<div><footer>
		<?php require('include/Footer.php');?></footer>
</div>
</body>
</html>