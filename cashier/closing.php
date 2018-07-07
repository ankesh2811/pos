<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Add Payment </title>
	
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
                                <h1>Add Payment</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Add Closing Amount</li>
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
                                    <h4>Closing Amount</h4>
                                   <?php
								   if(isset($_POST['add_inventory']))
								   {
								   $amount = $_POST['amount'];
								   $mode = $_POST['mode'];
								   $date = $_POST['date'];
								   if($mode=='cash')
								   {
									   $p2000 = $_POST['p2000'];
									   $p500 = $_POST['p500'];
									   $p200 = $_POST['p200'];
									   $p100 = $_POST['p100'];
									   $p50 = $_POST['p50'];
									   $p20 = $_POST['p20'];
									   $p10 = $_POST['p10'];
									   $p5 = $_POST['p5'];
									   $p2 = $_POST['p2'];
									   $p1 = $_POST['p1'];
									   
									   $a = $p2000*2000;
									   $b = $p500*500;
									   $c = $p200*200;
									   $d = $p100*100;
									   $e = $p50*50;
									   $f = $p20*20;
									   $g = $p10*10;
									   $h = $p5*5;
									   $i = $p2*2;
									   $j = $p1*1;
									   
									   $amount = $a+$b+$c+$d+$e+$f+$g+$h+$i+$j;
									   
								   }
								   
								   
								$a6 = mysqli_query($connection,"INSERT INTO closing_counter VALUES ('','$amount','$mode','$date')");
								
								if($a6)
								{
									echo 'success';
									
								}else
								{
									echo 'failed';
								}
								  
								   
								   
								   }
								   ?>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form role="form" method="POST" action="closing.php" enctype="multipart/form-data"> 
                                           
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">2000 X</p>
                                                <input type="text" name="p2000" class="form-control input-rounded " placeholder="2000 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">500 X</p>
                                                <input type="text" name="p500" class="form-control input-rounded " placeholder="500 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">100 X</p>
                                                <input type="text" name="p100" class="form-control input-rounded " placeholder="100 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">50 X</p>
                                                <input type="text" name="p50" class="form-control input-rounded " placeholder="50 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">20 X</p>
                                                <input type="text" name="p20" class="form-control input-rounded " placeholder="20 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">10 X</p>
                                                <input type="text" name="p10" class="form-control input-rounded " placeholder="10 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">5 X</p>
                                                <input type="text" name="p5" class="form-control input-rounded " placeholder="5 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">2 X</p>
                                                <input type="text" name="p2" class="form-control input-rounded " placeholder="2 X">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">1 X</p>
                                                <input type="text" name="p1" class="form-control input-rounded " placeholder="1 X">
                                            </div>
											
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Amount</p>
                                                <input type="text" name="amount" class="form-control input-rounded " placeholder="Amount">
                                            </div>
										
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Payment By</p>
                                                <select name="mode" class="form-control input-rounded">
											   <option value="cash">Cash</option>
											   <option value="card"> Card</option>
											   <option value="paytm">Paytm</option>
											   <option value="zomato">zomato</option>
											   
											   </select>
                                            </div>
											
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Date</p>
                                                <input type="date" name="date" class="form-control input-rounded " placeholder="Invoice Number">
											   
                                            </div>
											
                                            <div class="form-group">
                                                <button type="submit" name="add_inventory" class="btn btn-success">Add Closing Amount</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /# column -->
                        <<!-- /# column -->
                    </div><!-- /# row -->
					<div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Closing Balance</h4>
									
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Amount</th>
                                                <th>Mode</th>
                                                <th>Date</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										
										$i = '1';	
										$ii = '';
										$a2 = mysqli_query($connection,"SELECT * FROM closing_counter ORDER BY date DESC");
										while($a2_data = mysqli_fetch_array($a2))
										{
											$id = $a2_data['id'];
											$amount = $a2_data['amount'];
											$mode = $a2_data['mode'];
											$date = $a2_data['date'];
											
											
											
											$ii += $i; 
										?>
                                            <tr>
                                                <th scope="row"><?php echo $ii; ?></th>
                                                <td><?php echo $amount; ?></td>
                                                <td><?php echo $mode; ?></td>
                                                <td><?php echo $date; ?></td>
                                                
											
												
                                                
                                            </tr>
										<?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						</div>
					<!-- /# row -->
					<!-- /# row -->
					<!-- /# row -->
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