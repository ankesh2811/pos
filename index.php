<!DOCTYPE html>
<html lang="en">
<?php
 ob_start();
 session_start();
 ini_set('session.save_path', '/var/chroot/home/content/08/10125908/html/tmp');
	if(isset($_SESSION["role"]))
  	{
		if($_SESSION["role"]=="Super_Admin")
		 {
		
			 echo "<script>";
			 echo "window.location='SuperAdmin/home.php'";
			 echo "</script>";
		 } 
		else{
			
			
		}
		
		
  	}
ob_end_flush();
?>
<?php include("config.php");?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Login</title>
	
	<!-- ================= Favicon ================== -->
    <!-- Standard -->
  <link rel="apple-touch-icon" sizes="57x57" href="favi/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favi/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favi/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favi/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favi/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favi/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favi/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favi/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favi/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favi/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favi/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favi/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favi/favicon-16x16.png">
<link rel="manifest" href="favi/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favi/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	
	<!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

	<div class="unix-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="login-content">
						<div class="login-logo">
							<a href="index.php"><span>Thelewala</span></a>
						</div>
						<div class="login-form">
							<h4>Administratior Login</h4>
							<form role="form" action="check.php" method="POST">
								<div class="form-group">
									<label>Email address</label>
									<input type="email" name="email" class="form-control" placeholder="Email">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
							
								<button type="submit" name="login" class="btn btn-primary btn-flat m-b-30 m-t-30">Log In</button>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>



</html>