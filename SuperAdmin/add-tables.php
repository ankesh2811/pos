<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Tables Add </title>
	
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
                                    <li class="active">Add Tables</li>
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
                                    <h4>Add Tables</h4>
                                   
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12"></p>
                                                <input type="text" class="form-control input-rounded " placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Product price</p>
                                                <input type="text" class="form-control input-rounded" placeholder="Product price">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Product Image</p>
                                                <input type="file" class="form-control input-flat" placeholder="Input Rounded">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Add Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /# column -->
                        <<!-- /# column -->
						 <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="order-list-item">
                                    <table class="table">
                                        <thead>
                                        <tr>
											<th>#</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                           
                                            <th>Image</th>
                                           
                                            
                                            
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
										<td>1</td>
                                            <td>Pav Bhaji</td>
                                            <td>100</td>
                                           
                                           
                                             <td><img src="images/food.png" width="150px" height="150px"></td>
                                        
                                           
                                           <td><a href="edit-product.php"><button type="button" class="btn btn-info btn-rounded">Edit</button></a></td>
                                        </tr>

                                        <tr>
										<td>2</td>
                                            <td>Chole Bathure</td>
                                            <td>150</td>
                                           
                                          
                                             <td><img src="images/food.png" width="150px" height="150px"></td>
                                          
                                           
                                            <td><a href="edit-product.php"><button type="button" class="btn btn-info btn-rounded">Edit</button></a></td>
                                        </tr>

										<tr>
										<td>3</td>
                                            <td>Kadai Paneer</td>
                                            <td>180</td>
                                           
                                           
                                            
                                           <td><img src="images/food.png" width="150px" height="150px"></td>
                                           
                                          <td><a href="edit-product.php"><button type="button" class="btn btn-info btn-rounded">Edit</button></a></td>
                                        </tr>

                                        <tr>
										<td>4</td>
                                            <td>Matar Panner</td>
                                            <td>150</td>
                                           
                                           
                                             <td><img src="images/food.png" width="150px" height="150px"></td>
                                           
                                           
                                             <td><a href="edit-product.php"><button type="button" class="btn btn-info btn-rounded">Edit</button></a></td>
                                        </tr>

                                        <tr>
										<td>5</td>
                                            <td>Butter Roti</td>
                                            <td>15</td>
                                           
                                           
                                             <td><img src="images/food.png" width="150px" height="150px"></td>
                                          
                                           
                                          <td><a href="edit-product.php"><button type="button" class="btn btn-info btn-rounded">Edit</button></a></td>
                                        </tr>

                                      
                                        </tbody>
                                    </table>
                                </div>
							</div><!-- /# card -->
						</div><!-- /# column -->
					</div><!-- /# main content -->
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