<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LMS - Forget Password</title>
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
.styleapply input[type="text"]:focus
{
	box-shadow: 0 0 5px #43D1AF;
	padding: 3%;
	border: 1px solid #43D1AF;
}

.styleapply button[type="submit"]{
	box-sizing: border-box;
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
</style>
</head>

<body>
	<h2 style=" text-align:center; font-family:Arial, Helvetica, sans-serif;color:black;">Employee Leave Management System</h2>
  <form method="post" name="forgotpass" action="#">
  	<div class="styleapply">
      <h2 align="center">Recover Your password</h2>
	  <table align="center">
	  		<tr>
				<td width="118" height="75"><div align="center">Enter Your Email: </div></td>
				<td width="340"><div align="center">
				  <input type="text" name="email" />
				</div></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><button type="submit" name="submit">Submit</button></td>
			</tr>
	  </table>
	</div>
	</form>
</body>
</html>
