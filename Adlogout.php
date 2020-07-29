<?php
session_start();
unset($_SESSION['idn']);
unset($_SESSION['uname']);
header('location:Adminlog.php');
die();
?>