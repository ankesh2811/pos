<?php 
ob_start();
session_start();
include("../config.php");
define('CONST_SERVER_TIMEZONE', 'UTC');
		
$time_now = mktime(date('h')+5,date('i')+30,date('s'));
$right_time = date('H:i:s',$time_now);
$app_time = date('h:i A',$time_now);
$today_date = date('Y-m-d',$time_now);

if(isset($_SESSION["email"]))
{
       
		  
			$email 		= $_SESSION["email"];
			$password	= $_SESSION["password"];
			$id 		= $_SESSION["id"];
			$role		= $_SESSION["role"];
			$empcode 	= $_SESSION["empcode"];
			$showlogin 	= $_SESSION["showlogin"];
			$authority 	= $_SESSION["authority"];
			$username 	= $_SESSION["username"];
			 
		  $check_user =mysqli_query($connection, "select * from  login where email  ='$email'");
			$check_user_data	=mysqli_fetch_array($check_user);
				$check_role  	= $check_user_data['role'];
				$check_password  		= $check_user_data['password'];
				
		if($role == $check_role)
			{
				
			}
		else{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('You are not Authorized User')
					window.location.href='../LogOut.php';
					</SCRIPT>");
			}
		 
}
else
{
	header("location:../index.php");
}
ob_end_flush();
?>