<?php
require('db_conn.inc.php');
session_start();
$idn=$_SESSION['idn'];
$uname=$_SESSION['uname'];
$id=$_SESSION['id'];
echo "$id";
//$id=mysqli_real_escape_string($con,$_POST['id']);
$res="delete from empregis where id='$id'";
$run=mysqli_query($con,$res);
	if($run==true){
			echo'<script type="text/javascript">
					window.alert("Employee deleted successfully. Please refresh the page")</script>';
			header('location:Remove_emp.php');
		}
	else{
		echo "Some error occured";
		}
?>