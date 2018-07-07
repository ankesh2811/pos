<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Grievances </title>
	
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
                                    <li class="active">Add Grievances</li>
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
                                    <h4>Edit Recipe</h4>
                                   <?php
								   if(isset($_POST['add_product']))
								   {
									  $product_name=$_POST['product_name'];
									  
									  $reason=$_POST['reason'];
									  $prepared_by=$_POST['prepared_by'];
									  
									  $a1 = mysqli_query($connection,"INSERT INTO grievances VALUES ('','$product_name','$reason','$prepared_by',NOW(),NOW())");
							
					
					
					
									  
									   
								   }
								   ?>
                                </div>
							
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form role="form" method="POST" action="grievances.php" enctype="multipart/form-data">
										
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="product_name" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Reason for discard</p>
                                                <textarea rows="5" cols="60" name="reason" class="form-control" placeholder="Reason for discard">
												Reason for discard
												</textarea>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Prepared by</p>
                                                <input type="text" name="prepared_by" class="form-control input-flat" placeholder="Prepared by">
                                            </div>
											
										<div class="form-group">
                                                <button type="submit" name="add_product" class="btn btn-success btn-lg">Add Grievance</button>
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