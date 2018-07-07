<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Product Add </title>
	
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
                                    <li class="active">Add Recipe</li>
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
                                    <h4>Add Recipe</h4>
                                   <?php
								   if(isset($_POST['add_product']))
								   {
									  $product_name=$_POST['product_name'];
									  
									  $raw_name=$_POST['raw_name'];
									  $quantity=$_POST['quantity'];
									  
								if(empty($raw_name)) 
    {
        echo("<p>You didn't select item.</p>\n");
    } 
    else 
    {
       $N = count($raw_name);
        echo("<p>You selected $N Raw item(s): ");
		$arr = array();
        for($i=0; $i < $N; $i++)
        {
            $var1=$raw_name[$i];
            $var2=$quantity[$i];
        
           
		   
		  
            
           $a1 = mysqli_query($connection,"INSERT INTO recipe VALUES ('','$product_name','$var1','$var2')");
			if($a1)
			{
				echo 'Recipe Added';
				$c=0;
			}
			else 
			{
				echo 'Failed';
			}
            
             
        }
		
		
      }
					
					
					
									  
									   
								   }
								   ?>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form role="form" method="POST" action="add-recipe.php" enctype="multipart/form-data">
										<div class="col-lg-12">
										<div class="col-lg-6">
										<div class="form-group">
	  <button type="button" class="btn btn-warning btn-lg" onClick="addlast('dynamiclast');" >
	 <i class="fa fa-plus" aria-hidden="true" ></i>
	  <span>Add Item</span>
	  </button>
	  
	  </div>
	  </div>
	  <div class="col-lg-6">
	   <div class="form-group">
                                                <button type="submit" name="add_product" class="btn btn-success btn-lg">Add Recipe</button>
                                            </div>
	  </div>
	  </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Product Name</p>
                                               <select name="product_name" class="form-control input-rounded">
											   <?php 
											   $a3 = mysqli_query($connection,"SELECT * FROM products");
											   while($a3_data = mysqli_fetch_array($a3))
											   {
											   $name = $a3_data['product_name'];
											   ?>
											   <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
											   <?php } ?>
											   </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Raw Item name</p>
                                                <input type="text" name="raw_name[]" class="form-control input-rounded" placeholder="Raw Item name">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="Quantity">
                                            </div>
											
											<div id="dynamiclast">
	 
											</div>
											
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /# column -->
						<script>
	 var counte = 1;
var limi = 50;
function addlast(divName){
	
	
     if (counte == limi)  {
          alert("You have reached the maximum number of items");
     }
     else {
		 var co = counte + 1;
          var newdiv = document.createElement('div');
          newdiv.innerHTML = '<p><div id="me'+co+'"><div class="form-group"> <p class="text-muted m-b-15 f-s-12">Raw Item name</p> <input type="text" name="raw_name[]" class="form-control input-rounded" placeholder="Raw Item name"> </div> <div class="form-group"> <p class="text-muted m-b-15 f-s-12">Quantity</p> <input type="test" name="quantity[]" class="form-control input-flat" placeholder="Quantity"> </div></div></p>';
		
		
          document.getElementById(divName).appendChild(newdiv);
          
          counte++;
     }
	 
	 $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#me'+button_id+'').remove();  
		   counte--;
      });  
}

	  </script>
                        <<!-- /# column -->
						<style>
						#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}
						</style>
						 <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="order-list-item">
								<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                                    <table class="table" id="myTable">
                                        <thead>
                                        <tr>
											<th>#</th>
                                            <th>Product Name</th>
                                            <th>Items Included</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$i = '1';	
										$ii = '';
										$a2 = mysqli_query($connection,"SELECT DISTINCT(product_name) as p_name FROM recipe");
										
										
										while($a2_data = mysqli_fetch_array($a2))
										{
										$p_name = $a2_data['p_name'];
										
										$a4 = mysqli_query($connection,"SELECT count(raw_name) as c_id FROM recipe WHERE product_name='$p_name'");
										$a4_data = mysqli_fetch_array($a4);
										$c_id = $a4_data['c_id'];
										
										$ii += $i; 
										?>
                                        <tr>
										<td> <?php echo $ii; ?> </td>
                                            <td><?php echo $p_name; ?></td>
											
                                            <td><?php echo $c_id; ?></td>
                                           
                                           
                                           
                                        
											<td>
											<div class="btn-group">
							  <button type="button" class="btn btn-info">Action</button>
							  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
								
								<li><a href="view-recipe.php?id=<?php echo $p_name; ?>"><button type="button" class="btn btn-info btn-rounded">View</button></a></li>
									<li><a href="edit-recipe.php?id=<?php echo $p_name; ?>"><button type="button" class="btn btn-info btn-rounded">Edit</button></a></li>
									<li><a href="delete-recipe.php?id=<?php echo $p_name; ?>"><button type="button" class="btn btn-danger btn-rounded">Delete</button></a></li>
									
									
								
							  </ul>
							</div>
											</td>
                                        </tr>
										<?php } ?>

                                       

                                      
                                        </tbody>
                                    </table>
                                </div>
								<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
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