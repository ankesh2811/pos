<?php
include("session.php");

$getid = $_GET["id"];




	$update_brand_logo  = mysqli_query($connection,"DELETE FROM `staff` where id ='$getid'");
	
	
	
	if($update_brand_logo){
		
		echo "<script>";
		echo "alert('Delete Done');";
		 echo "window.location='staff.php'";
		 echo "</script>";
		
	}else{
		
		echo "<script>";
		echo "alert('Delete Not Done');";
		 echo "window.location='staff.php'";
		 echo "</script>";
		
	}
	
	
	$connection->close();			
							






?>