<?php
include("session.php");

$getid = $_GET["id"];




	$update_brand_logo  = mysqli_query($connection,"DELETE FROM `products` where id ='$getid'");
	
	
	
	if($update_brand_logo){
		
		echo "<script>";
		echo "alert('Delete Done');";
		 echo "window.location='view-product.php'";
		 echo "</script>";
		
	}else{
		
		echo "<script>";
		echo "alert('Delete Not Done');";
		 echo "window.location='view-product.php'";
		 echo "</script>";
		
	}
	
	
	$connection->close();			
							






?>