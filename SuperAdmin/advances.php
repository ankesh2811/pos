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
                                <h1>Advance Payment</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Add Advance Payment</li>
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
                                    <h4>Advance payment</h4>
                                   <?php
								   if(isset($_POST['add_inventory']))
								   {
								   $name = $_POST['name'];
								   $amount = $_POST['amount'];
								   $reason = $_POST['reason'];
								   $date = $_POST['date'];
								   
								   
								$a6 = mysqli_query($connection,"INSERT INTO advance_payment VALUES ('','$name','$amount','$reason',NOW())");
								
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
                                        <form role="form" method="POST" action="advances.php" enctype="multipart/form-data"> 
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Amount</p>
                                                <input type="text" name="amount" class="form-control input-rounded " placeholder="Amount">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Name</p>
                                                <input type="text" name="name" class="form-control input-rounded " placeholder="Name">
                                            </div>
											
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Reason</p>
                                                <input type="text" name="reason" class="form-control input-rounded " placeholder="reason">
											   
                                            </div>
											
                                            <div class="form-group">
                                                <button type="submit" name="add_inventory" class="btn btn-success">Add Amount</button>
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
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Reason</th>
                                                <th>Date</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										
										$i = '1';	
										$ii = '';
										$a2 = mysqli_query($connection,"SELECT * FROM advance_payment ORDER BY date DESC");
										while($a2_data = mysqli_fetch_array($a2))
										{
											$id = $a2_data['id'];
											$name = $a2_data['name'];
											$amount = $a2_data['amount'];
											$reason = $a2_data['reason'];
											$date = $a2_data['date'];
											
											
											
											$ii += $i; 
										?>
                                            <tr>
                                                <th scope="row"><?php echo $ii; ?></th>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $amount; ?></td>
                                                <td><?php echo $reason; ?></td>
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