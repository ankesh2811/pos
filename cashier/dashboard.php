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

<?php
$b1 = mysqli_query($connection,"SELECt * FROM orders ORDER BY id DESC LIMIT 1");
$b1_data = mysqli_fetch_array();
$date = $b1_data['date'];


?>


    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="dashboard.php"><span>Thelewala  </span></a></div>
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
                                <a href="add-order.php"><button type="button" class="btn btn-success btn-rounded" style="margin-top:2%;">Add Order</button></a>
                            </div>
                        </div>
                    </div>
					
					<div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <button type="button" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#myModal21">Parcel</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#myModal22">Zomato</button>
                            </div>
                        </div>
                    </div>
					
                   <!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
				<?php include 'tables.php'; ?>
				<?php include 'modal.php'; ?>
					<!-- /# row -->
					
      <div class="row" style="margin-top:2%;margin-bottom:3%;">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="background-color:#d2d2d2;"> <table class="table table-striped" style="font-size:15px;">
    <thead>
      <tr class="success">
        <th>Net Sale (Today)</th>
        <th ><?php
												$d = date("Y-m-d");
												$a13 = mysqli_query($connection,"SELECT SUM(discount_price) as dis FROM orders WHERE date='$dates'"); 
												$a13_data = mysqli_fetch_array($a13);   
												$dis = $a13_data['dis'];
												$a14 = mysqli_query($connection,"SELECT SUM(taxes) as tax FROM orders WHERE date='$dates'"); 
												$a14_data = mysqli_fetch_array($a14);   
												$tax = $a14_data['tax'];
												$k = $dis+$tax;
												


												if(!empty($k)) { echo round($k); } else { echo '0'; } ?></th>
        
      </tr>
    </thead>
    <tbody>
      <tr class="info">
        <td>Cash</td>
        <td><?php
												$d = date("Y-m-d");
												$a130 = mysqli_query($connection,"SELECT SUM(amount) as dis FROM closing_counter WHERE date='$dates' AND mode='cash' ORDER BY id DESC LIMIT 1"); 
												$a130_data = mysqli_fetch_array($a130);   
												$dis = $a130_data['dis'];
												
												
												


												if(!empty($dis)) { echo round($dis); } else { echo '0'; } ?></td>
        
      </tr>
      <tr class="warning">
        <td>Card</td>
        <td><?php
												$d = date("Y-m-d");
												$a131 = mysqli_query($connection,"SELECT SUM(amount) as dis FROM closing_counter WHERE date='$dates' AND mode='card' ORDER BY id DESC LIMIT 1"); 
												$a131_data = mysqli_fetch_array($a131);   
												$disc = $a131_data['dis'];
												
												
												


												if(!empty($disc)) { echo round($disc); } else { echo '0'; } ?></td>
        
      </tr>
      <tr class="danger">
        <td>Paytm</td>
        <td><?php
												$d = date("Y-m-d");
												$a132 = mysqli_query($connection,"SELECT SUM(amount) as dis FROM closing_counter WHERE date='$dates' AND mode='paytm' ORDER BY id DESC LIMIT 1"); 
												$a132_data = mysqli_fetch_array($a132);   
												$dist = $a132_data['dis'];
												
												
												


												if(!empty($dist)) { echo round($dist); } else { echo '0'; } ?></td>
        
      </tr>
	  <tr class="success">
        <td>Zomato</td>
        <td><?php
												$d = date("Y-m-d");
												$a132 = mysqli_query($connection,"SELECT SUM(amount) as dis FROM closing_counter WHERE date='$dates' AND mode='zomato' ORDER BY id DESC LIMIT 1"); 
												$a132_data = mysqli_fetch_array($a132);   
												$dist = $a132_data['dis'];
												
												
												


												if(!empty($dist)) { echo round($dist); } else { echo '0'; } ?></td>
        
      </tr>
    </tbody>
  </table></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background-color:#d2d2d2;"><div class="stat-text">Closing Balance (Cash)</div>
												<div class="stat-digit">Total: <?php
												$e = date("Y-m-d");
												
											
												$a17 = mysqli_query($connection,"SELECT * FROM closing_cash ORDER BY id DESC LIMIT 1"); 
												$a17_data = mysqli_fetch_array($a17);   
												$date = $a17_data['date'];
												
												$a10 = mysqli_query($connection,"SELECT SUM(amount) as amount FROM closing_cash WHERE date='$date'");
												$a10_data = mysqli_fetch_array($a10);
												$disc = $a10_data['amount'];
												
												$a18 = mysqli_query($connection,"SELECT * FROM closing_counter WHERE mode='cash' ORDER BY id DESC LIMIT 1"); 
												$a18_data = mysqli_fetch_array($a18);   
												$taxe = $a18_data['amount'];
												
												$lal = $taxe - $disc;
												
												if(!empty($lal)) { echo round($lal); } else { echo '0'; }


												 ?></div></div>
      </div>
	  
	  <div class="row" style="margin-top:2%;margin-bottom:3%;">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color:#d2d2d2;"><div class="stat-text">Cash Recieved BY</div>
												<div class="stat-digit"><p style="font-size:15px;"><?php
												$d = date("Y-m-d");
												
												$h14 = mysqli_query($connection,"SELECT * FROM closing_cash ORDER BY id DESC LIMIT 1");  $h14_data = mysqli_fetch_array($h14);   $clo_amount = $h14_data['amount']; $clo_name = $h14_data['name']; echo $clo_name; echo '--'; echo $clo_amount; ?></p></div></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color:#d2d2d2;"><div class="stat-text">Total Purchase</div>
												<div class="stat-digit"><?php $a4 = mysqli_query($connection,"SELECT SUM(purchase_amount) as purchase FROM purchase");  $a4_data = mysqli_fetch_array($a4);   $purchase_amount = $a4_data['purchase']; if(!empty($purchase_amount)) { echo $purchase_amount; } else { echo '0'; } ?></div></div>
      </div>
	    <div class="row" style="margin-top:2%;margin-bottom:3%;">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color:#d2d2d2;"><div class="stat-text">Counter Purchase (Today)</div>
												<div class="stat-digit"><?php
												$d = date("Y-m-d");
												
												$a15 = mysqli_query($connection,"SELECT SUM(purchase_amount) as pur FROM purchase WHERE purchase_date='$dates' AND mode='counter'");  $a15_data = mysqli_fetch_array($a15);   $purchase_today = $a15_data['pur']; if(!empty($purchase_today)) { echo $purchase_today; } else { echo '0'; } ?></div></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background-color:#d2d2d2;"><div class="stat-text">Counter Cash (Today)</div>
												<div class="stat-digit"><?php
												
												$alpha = $lal+$dis-$purchase_today;
												if(!empty($alpha)) { echo $alpha; } else { echo '0'; } ?></div></div>
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
	<!-- // Datamap -->
    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>	
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->
</body>



</html>









