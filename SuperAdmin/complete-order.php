<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Complete Order </title>
	
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
                                <h1>Complete Order</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Complete Order</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
				<div class="row">
				<div class="col-lg-12">
			  <div class="page-header">
                            <div class="page-title">
                            
                            </div>
                        </div>
                        </div>
			</div>
			 
			 <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="order-list-item">
                                    <table class="table" style="width:100%;">
                                        <thead style="background:white;">
                                        <tr>
											
                                            <th style="color:black;">Total Amount</th>
                                            <th style="color:black;"><?php 	$a3 = mysqli_query($connection,"SELECT amount as sum FROM orders WHERE id='$getid'");
										$a3_data = mysqli_fetch_array($a3);
										echo $a3_data['sum']; ?></th>
                                           
                                            
                                           
                                          
                                        </tr>
                                        </thead>
                                      
                                    </table>
                                </div>
							</div><!-- /# card -->
						</div><!-- /# column -->
					</div>
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
                                           
                                            <th>Quantity</th>
                                           
                                            <th>Amount</th>
                                            
                                         
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$i = '1';	
										$ii = '';
										
										 $a4 = mysqli_query($connection,"SELECT max(id) as m_id FROM orders");
									  $a4_data = mysqli_fetch_array($a4);
									  $m_id = $a4_data['m_id'];
									  
									  
										$a1 = mysqli_query($connection,"SELECT * FROM order_product WHERE order_id='$m_id' ORDER BY id DESC");
										while($a1_data = mysqli_fetch_array($a1))
										{
										$id = $a1_data['id'];
										$product_name = $a1_data['product_name'];
										$product_price = $a1_data['product_price'];
										$product_quantity = $a1_data['product_quantity'];
										$product_total = $a1_data['product_total'];
										$ii += $i; 
										
										?>
                                        <tr>
										<td><?php echo $ii; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $product_price; ?></td>
                                           
                                            <td><?php echo $product_quantity; ?></td>
                                            <td><?php echo $product_total; ?></td>
                                          
                                        </tr>

                                        <?php } ?>

                                      
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