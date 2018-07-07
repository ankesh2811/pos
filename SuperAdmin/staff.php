<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Add Staff</title>
	
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
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Staff Details</li>
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
                                    <h4>Add Staff</h4>
                                   <?php if(isset($_POST['add_staff']))
								   {
									   $name = $_POST['name'];
									   $number = $_POST['number'];
									   $salary = $_POST['salary'];
									   $address = $_POST['address'];
									   
									   $journalName = preg_replace('/\s+/', '_', $name);
					
					$extension = explode(".", $_FILES["image"]["name"]);
					$upload_extension = end($extension);

					$image1 = $journalName.".".$upload_extension;
					$temp = $_FILES["image"]["tmp_name"];

					move_uploaded_file($temp, "../../staff_photo/".$journalName.".".$upload_extension);
					
					
					$arr = array();
					array_push($arr,$journalName);
					array_push($arr,'photoid');
					$journalName1 = implode("-",$arr);
					
					$extension = explode(".", $_FILES["image1"]["name"]);
					$upload_extension = end($extension);

					$image2 = $journalName1.".".$upload_extension;
					$temp = $_FILES["image"]["tmp_name"];

					move_uploaded_file($temp, "../../staff_id/".$journalName1.".".$upload_extension);
					
					$a1 = mysqli_query($connection,"INSERT INTO staff VALUES ('','$name','$number','$salary','$address','$image1','$image2')");
									   
									   
								   }
								   
								   ?>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form role="form" method="POST" action="staff.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Name</p>
                                                <input type="text" name="name" class="form-control input-rounded " placeholder="Employee Name">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Number</p>
                                                <input type="text" name="number" class="form-control input-rounded" placeholder="Employee Number">
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Salary</p>
                                                <input type="text" name="salary" class="form-control input-flat" placeholder="Employee Salary">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Address</p>
                                                <input type="text" name="address" class="form-control input-flat" placeholder="Employee Address">
                                            </div>
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Photo</p>
                                                <input type="file" name="image" class="form-control input-flat">
                                            </div> <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Id Proof</p>
                                                <input type="file" name="image1" class="form-control input-flat">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="add_staff" class="btn btn-success">Add Staff</button>
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
                                <div class="card-header">
                                    <h4>Staff Members </h4>
									
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Salary</th>
                                                <th>Address</th>
                                                <th>Photo</th>
                                                <th>Id Proof</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$i = '1';	
										$ii = '';
										
										$a2 = mysqli_query($connection,"SELECT * FROM staff ORDER BY id DESC");
										while($a2_data = mysqli_fetch_array($a2))
										{
												$ii += $i;
										?>
                                            <tr>
                                                <th scope="row"><?php echo $ii; ?></th>
                                                <td><?php echo $a2_data['name']; ?></td>
                                                <td><span class="badge badge-primary"><?php echo $a2_data['number']; ?></span></td>
                                                <td><?php echo $a2_data['salary']; ?></td> 
												<td><?php echo $a2_data['address']; ?></td>
                                                <td><img src="../../staff_photo/<?php echo $a2_data['photo']; ?>" width="150px" height="150px"></td>
                                                <td><img src="../../staff_id/<?php echo $a2_data['id_proof']; ?>" width="150px" height="150px"></td>
												<td><a href="edit-staff.php?id=<?php echo $a2_data['id'];?>"><button type="button" class="btn btn-info btn-rounded">Edit</button></a></td>
												 <td><a href="delete-staff.php?id=<?php echo $a2_data['id'];?>"><button type="button" class="btn btn-danger btn-rounded">Delete</button></a></td>
                                            </tr>
										<?php } ?>
                                           
                                        </tbody>
                                    </table>
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