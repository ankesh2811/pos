<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Tables </title>
	
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
                                <h1>Online Order</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Order</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="order-list-item">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Table Number</th>
                                            <th>Order ID</th>
                                           
                                            <th>Total Amount</th>
                                           
                                            <th>Payment Status</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>#8546677</td>
                                           
                                            <td><button type="button" class="btn btn-success btn-rounded">$29</button></td>
                                            
                                           <td><button type="button" class="btn btn-success btn-rounded">Paid</button></td>
                                            <td><button type="button" class="btn btn-success btn-rounded">Complete</button></td>
                                           <td><a href="view-order.php"><button type="button" class="btn btn-info btn-rounded">View</button></a></td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>#8546678</td>
                                           
                                            <td><button type="button" class="btn btn-success btn-rounded">$30</button></td>
                                         
                                            <td><button type="button" class="btn btn-warning btn-rounded">Pending</button></td>
                                            <td><button type="button" class="btn btn-warning btn-rounded">In Progress</button></td>
											<td><a href="view-order.php"><button type="button" class="btn btn-info btn-rounded">View</button></a></td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>#8546679</td>
                                           
                                            <td><button type="button" class="btn btn-success btn-rounded">$31</button></td>
                                          
                                        <td><button type="button" class="btn btn-warning btn-rounded">Pending</button></td>
                                            <td><button type="button" class="btn btn-warning btn-rounded">In Progress</button></td>
											<td><a href="view-order.php"><button type="button" class="btn btn-info btn-rounded">View</button></a></td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>#8546680</td>
                                         
                                            <td><button type="button" class="btn btn-success btn-rounded">$32</button></td>
                                          
                                            <td><button type="button" class="btn btn-success btn-rounded">Paid</button></td>
                                            <td><button type="button" class="btn btn-success btn-rounded">Complete</button></td>
											<td><a href="view-order.php"><button type="button" class="btn btn-info btn-rounded">View</button></a></td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>#8546681</td>
                                           
                                            <td><button type="button" class="btn btn-success btn-rounded">$34</button></td>
                                        
                                           <td><button type="button" class="btn btn-warning btn-rounded">Pending</button></td>
                                            <td><button type="button" class="btn btn-warning btn-rounded">In Progress</button></td>
											<td><a href="view-order.php"><button type="button" class="btn btn-info btn-rounded">View</button></a></td>
                                        </tr>

                                      
                                        </tbody>
                                    </table>
                                </div>
							</div><!-- /# card -->
						</div><!-- /# column -->
					</div><!-- /# row -->
                </div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div>

	
	<script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->   
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->
    <script src="assets/js/scripts.js"></script><!-- scripit init-->