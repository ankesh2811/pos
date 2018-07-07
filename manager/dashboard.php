<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Restaurant POS</title>
	
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
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="assets/css/lib/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<?php include 'header.php'; ?>
   <!-- /# sidebar -->




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

	
    <!-- END chat Sidebar-->

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
							
                            </div>
                        </div>
                    </div><!-- /# column -->
					<div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <a href="add-order.php"><button type="button" class="btn btn-success btn-rounded" style="margin-top:2%;">Add Order</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-6">
									<div class="card p-0">
										<div class="stat-widget-three">
											<div class="stat-icon bg-primary p-48">
												<i class="ti-eye"></i>
											</div>
											<div class="stat-content p-30">
												<div class="stat-text">Total Orders</div>
												<div class="stat-digit"><?php $a1 = mysqli_query($connection,"SELECT COUNT(id) as c_id FROM orders");  $a1_data = mysqli_fetch_array($a1);   $c_id = $a1_data['c_id']; echo $c_id; ?></div>
											</div>
										
										</div>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div class="card p-0">
										<div class="stat-widget-three">
											<div class="stat-icon bg-success p-48">
												<i class="ti-bag"></i>
											</div>
											<div class="stat-content p-30">
												<div class="stat-text">Online Orders</div>
												<div class="stat-digit"><?php $a2 = mysqli_query($connection,"SELECT COUNT(id) as s_id FROM orders WHERE type='online'");  $a2_data = mysqli_fetch_array($a2);   $s_id = $a2_data['s_id']; echo $s_id; ?></div>
											</div>
										
										</div>
									</div>
								</div>
								
								
								
								<div class="col-lg-6">
									<div class="card bg-success">
										<div class="stat-widget-six">
											<div class="stat-icon p-15">
												<i class="ti-stats-up"></i>
											</div>
											<div class="stat-content p-t-12 p-b-12">
											   <div class="text-left dib">
												<div class="stat-heading">Today's sales</div>
												<div class="stat-text">Total: <?php
												$d = date("Y-m-d");
												$a5 = mysqli_query($connection,"SELECT SUM(amount) as today FROM orders WHERE date='$d'");  $a5_data = mysqli_fetch_array($a5);   $today = $a5_data['today']; if(!empty($today)) { echo $today; } else { echo '0'; } ?></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
							
							</div>
						</div><!-- /# column -->
						<!-- /# column -->
                    </div><!-- /# row -->
					<div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="order-list-item">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Customer Number</th>
                                            <th>Order ID</th>
                                           
                                            <th>Total Amount</th>
                                           
                                            <th>Payment Status</th>
                                            <th>Payment Mode</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$a6 = mysqli_query($connection,"SELECT * FROM orders WHERE type='online' ORDER BY id DESC LIMIT 10");
										while($a6_data = mysqli_fetch_array($a6))
										{
										$contact_number = $a6_data['contact_number'];
										$order_amount = $a6_data['amount'];
										$id = $a6_data['id'];
										$status = $a6_data['status'];
										$payment_status = $a6_data['payment_status'];
										$payment_type = $a6_data['payment_type'];
										?>
                                        <tr>
                                            <td><?php echo $contact_number?></td>
                                            <td>#<?php echo $id?></td>
                                           
                                            <td><button type="button" class="btn btn-success btn-rounded"><?php echo $order_amount; ?></button></td>
                                            
                                           <td><button type="button" class="btn btn-success btn-rounded"><?php echo $payment_status; ?></button></td>
										   <td><button type="button" class="btn btn-success btn-rounded"><?php echo $payment_type; ?></button></td>
                                            <td><button type="button" class="btn btn-success btn-rounded"><?php echo $status; ?></button></td>
                                           <td><a href="view-order.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-info btn-rounded">View</button></a></td>
                                        </tr>
										<?php } ?>
                                        

                                      
                                        </tbody>
                                    </table>
                                </div>
							</div><!-- /# card -->
						</div><!-- /# column -->
					</div><!-- /# row -->
					
					<!-- /# row -->
				</div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div><!-- /# content wrap -->
	
	
	
    <script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->    
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
	<!--  Chart js -->
	<script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
	<script src="assets/js/lib/chart-js/chartjs-init.js"></script>
	<!-- // Chart js -->
	
	<!--  Datamap -->
    <script src="assets/js/lib/datamap/d3.min.js"></script>
    <script src="assets/js/lib/datamap/topojson.js"></script>
    <script src="assets/js/lib/datamap/datamaps.world.min.js"></script>
    <script src="assets/js/lib/datamap/datamap-init.js"></script>
	<!-- // Datamap -->-->
    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>	
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->
</body>



</html>









