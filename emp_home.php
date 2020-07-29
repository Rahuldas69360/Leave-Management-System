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
<title>LMS - Employee Home</title>

</head>

<body>
	<header>
		<?php include 'include/emp_nav.php';?>
	</header>
	<div>
	  <h2 align="center">Welcome <?php echo $_SESSION['name']; ?></h2>
	   <section><?php require('include/slides.php');?></section>
	</div>
	<div>
		<footer><?php require('include/Footer.php');?></footer></div>
</body>
</html>
