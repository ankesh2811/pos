<?php
	include("config.php");
	
	
	if(isset($_POST["submit"]))
	{
		$email=$_POST["email"];
		
		$query="select * from login where email='$email'";
		$result=mysql_query($query) or die(error);
		
			$data=mysql_fetch_array($result);
			$password 		  = $data["password"];
		 
		 
		 
		if(mysql_num_rows($result))
		{
			
			$message="Your Current Password is: " .$password;
			$mailsend=mail($email, "Password Recovery", $message);
			if($mailsend)
			{
				echo "<script>
					alert('Mail sent successfully. Please Check Your Inbox.');
					window.location.href='index.php';
					</script>";
			}
			else
			{
				echo "<script>
					alert('Error while sending mail. Please try after some time');
					window.location.href='index.php';
					</script>";
			}
			
		}
		else
		{
			echo "<script>
					alert('This email ID is not Registered. Please Enter valid Email.');
					window.location.href='index.php';
					</script>";
		}
	}
?>