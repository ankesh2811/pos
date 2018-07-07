<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : View Products </title>
	
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
                                <h1>View Products</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    
                                    <li class="active">View Products</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->






                <div class="main-content">
				<aside class="lg-side">
                                            <div class="inbox-head">
                                                <h3></h3>
                                                <form action="#" class="pull-right position">
                                                    <div class="input-append">
                                                        <input type="text" class="sr-input" placeholder="Search Mail">
                                                        <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
											</aside>
                    <div class="row">
				<?php
	$a1 = mysqli_query($connection,"SELECT * FROM products ORDER BY id DESC");
	while($a1_data = mysqli_fetch_array($a1))
	{
		
		$id = $a1_data['id'];
		$product_name = $a1_data['product_name'];
		$product_price = $a1_data['product_price'];
		$product_image = $a1_data['product_image'];
	?>
                        <div class="col-lg-4">
                            <div class="card alert">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="product-3-img">
                                            <img src="../../product_images/<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>"/>
                                        </div>
										<br>
										<br>
										<button type="button" class="btn btn-success btn-rounded">INR <?php echo $product_price?></button>
                                    </div>
									
                                    <div class="col-lg-8">
                                        <div class="product_details_3">
                                            <div class="product_name">
                                                <h4><?php echo $product_name; ?></h4>
                                            </div>
                                          <br>
										<br>
                                            <div class="prdt_add_to_cart">
                                             
                                               <a href="edit-product.php?id=<?php echo $id; ?>""><button type="button" class="btn btn-primary btn-rounded  m-l-5">Edit</button></a>
											    <a href="delete_product.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-danger btn-rounded  m-l-5">Delete</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div><!-- /# card -->
						</div>
					<?php } ?>


					</div><!-- /# row -->
                </div><!-- /# main content -->



                <!-- /# main content -->





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