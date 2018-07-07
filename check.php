 <?php include("config.php");
  ob_start();
  if(isset($_POST['login']))
  {
	 $email=$_POST['email'];
	 $pass=$_POST['password']; 
	 
$email_seccond 		= stripslashes($email);
$password_seccond 	= stripslashes($pass);
$email_check 		= mysqli_real_escape_string($connection, $email_seccond);
$password_check		= mysqli_real_escape_string($connection, $password_seccond);
	
	 $result=mysqli_query($connection,"select * from login where email  ='$email_check'");
	 $data=mysqli_fetch_array($result);
		 $f_id 			  = $data['id'];
		 $f_email   	  = $data['email'];
		 $f_password  	  = $data['password'];
		 $f_empcode 	  = $data["empcode"];
		 $f_role  	  	  = $data['role']; 
		 $f_showlogin	  = $data['session']; 
		 $f_authority  	  = $data['authority']; 
		 $f_username  	  = $data['username']; 
		 
	 if($f_role == "Super_Admin" && $f_password == $pass && $f_authority == "Yes")
	 {
		session_start();
		 $_SESSION['email']=$f_email;
		 $_SESSION['password']=$f_password;
		 $_SESSION['id']=$f_id;
		 $_SESSION['role']=$f_role;
		 $_SESSION['showlogin']=$f_showlogin;
		 $_SESSION['authority']=$f_authority;
		 $_SESSION['empcode'] = $f_empcode;
		 $_SESSION['username'] = $f_username;
		 
		$session_update=mysqli_query($connection,"UPDATE `login` SET `session`='Active' where email='$email'"); 
		
		 echo "<script>";
		 echo "window.location='SuperAdmin/dashboard.php'";
		 echo "</script>";
	 }elseif($f_role == "manager" && $f_password == $pass && $f_authority == "Yes")
	 {
		session_start();
		 $_SESSION['email']=$f_email;
		 $_SESSION['password']=$f_password;
		 $_SESSION['id']=$f_id;
		 $_SESSION['role']=$f_role;
		 $_SESSION['showlogin']=$f_showlogin;
		 $_SESSION['authority']=$f_authority;
		 $_SESSION['empcode'] = $f_empcode;
		 $_SESSION['username'] = $f_username;
		 
		$session_update=mysqli_query($connection,"UPDATE `login` SET `session`='Active' where email='$email'"); 
		
		 echo "<script>";
		 echo "window.location='manager/dashboard.php'";
		 echo "</script>";
	 }elseif($f_role == "cashier" && $f_password == $pass && $f_authority == "Yes")
	 {
		session_start();
		 $_SESSION['email']=$f_email;
		 $_SESSION['password']=$f_password;
		 $_SESSION['id']=$f_id;
		 $_SESSION['role']=$f_role;
		 $_SESSION['showlogin']=$f_showlogin;
		 $_SESSION['authority']=$f_authority;
		 $_SESSION['empcode'] = $f_empcode;
		 $_SESSION['username'] = $f_username;
		 
		$session_update=mysqli_query($connection,"UPDATE `login` SET `session`='Active' where email='$email'"); 
		
		 echo "<script>";
		 echo "window.location='cashier/dashboard.php'";
		 echo "</script>";
	 }
	 else
	 {
		 echo "<script>";
		 echo "alert('Invalid Username & Password');";
		 echo "window.location='index.php'";
		 echo "</script>";
	 }
  }
  ob_end_flush();
?>