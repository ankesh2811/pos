<?php
include("../config.php");	
	
	
session_start();

	$email 		= $_SESSION["email"];
	
	$session_update=mysqli_query($connection,"UPDATE `login` SET `session`='InActive' where email='$email'"); 

		 unset($_SESSION['email']);
		 unset($_SESSION['password']);
		 unset($_SESSION['id']);
		 unset($_SESSION['role']);
		 unset($_SESSION['showlogin']);
		 unset($_SESSION['authority']);
		 unset($_SESSION['empcode']);
		 unset($_SESSION['username'] );
	
	
session_destroy();
	echo "<script>";
		echo "alert('LogOut Done');";
		 echo "window.location='../index.php'";
		 echo "</script>";
	
?>