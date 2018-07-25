<?php
	include_once('include/config.php');
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	header('location:login.php');
?>