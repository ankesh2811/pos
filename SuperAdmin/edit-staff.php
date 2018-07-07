<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';
$getid = $_GET['id'];
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Staff Add </title>
	
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
    <link href="assets/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="assets/css/lib/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<?php include 'header.php'; ?>

 <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="dashboard.php"><span>Thelewala</span></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>

        
    </div>

	
	
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard">Dashboard</a></li>
                                    <li class="active">Update Staff</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Update </h4>
                                   <?php
								   $a1 = mysqli_query($connection,"SELECT * FROM staff WHERE id='$getid'");
								   $a1_data = mysqli_fetch_array($a1);
								   $name = $a1_data['name'];
								   $number = $a1_data['number'];
								   $salary = $a1_data['salary'];
								   $address = $a1_data['address'];
								   ?>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
									 <?php
									 if(isset($_POST['update_staff']))
									 {
								   
								   $name = $_POST['name'];
								   $number = $_POST['number'];
								   $salary = $_POST['salary'];
								   $address = $_POST['address'];
								   
								   $a2 = mysqli_query($connection,"UPDATE staff SET `name`='$name',`number`='$number',`salary`='$salary',`address`='$address' WHERE id='$getid'");
									 }
								   ?>
                                        <form role="form" method="POST" action="edit-staff.php?id=<?php echo $getid; ?>" enctype="multipart/form-data">
                                          
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Employee Name</p>
                                                <input type="text" name="name" class="form-control input-rounded" value="<?php echo $name?>" placeholder="Employee Name">
                                            </div>
											
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Employee Number</p>
                                                <input type="text" name="number" class="form-control input-rounded" value="<?php echo $number?>" placeholder="Employee Number">
                                            </div>
											
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Employee Salary</p>
                                                <input type="text" name="salary" class="form-control input-rounded" value="<?php echo $salary?>" placeholder="Employee Salary">
                                            </div>
											
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Employee Address</p>
                                                <input type="text" name="address" class="form-control input-rounded" value="<?php echo $address?>" placeholder="Employee Address">
                                            </div>
                                          
                                            <div class="form-group">
                                                <button type="submit" name="update_staff" class="btn btn-success">Update Employee</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /# column -->
                        <!-- /# column -->
						<!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div>
    </div>
	
	<script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->   
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->