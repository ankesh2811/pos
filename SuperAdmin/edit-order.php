<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>
<?php $getid = $_GET['id']?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Order Add </title>
	
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                                    <li class="active">Add Order</li>
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
                                    <h4>Add Order </h4>
                                       <?php
								   if(isset($_POST['add_order']))
								   {
									  $table=$_POST['table'];
									  $number=$_POST['number'];
									  $waiter=$_POST['waiter'];
									  $captain=$_POST['captain'];
									  $b = date("m-d-y");
									  $k = date("h:i:sa");
									  
										  if(empty($_POST['discount']))
									  {
									  $discount = 0;
									  } else 
									  {
										 $discount=$_POST['discount']; 
									  }
									  
									   if(empty($_POST['delivery']))
									  {
									  $delivery = 0;
									  } else 
									  {
										 $delivery=$_POST['delivery']; 
									  }
									  
									 
									  $type=$_POST['type'];
									  $today = date("mdy");
									  $rand = rand(100,999);
									  
									  $item_name=$_POST['item_name'];
									  $quantity=$_POST['quantity'];
									  
									  $arr = array();
									  array_push($arr,"TWL");
									  array_push($arr,$today);
									  array_push($arr,$rand);
									  $invoice = implode($arr);
									  
									  $l3 = mysqli_query($connection,"DELETE FROM orders WHERE id='$getid'");
									  $l4 = mysqli_query($connection,"DELETE FROM order_product WHERE order_id='$getid'");
									  
									  $a2 = mysqli_query($connection,"INSERT INTO orders VALUES ('','$invoice','$table','$number','','$waiter',NOW(),'$k','','$type','','','$discount','','','$captain','$delivery')");
									  
									  $a3 = mysqli_query($connection,"SELECT max(id) as m_id FROM orders");
									  $a3_data = mysqli_fetch_array($a3);
									  $m_id = $a3_data['m_id'];
									  
									  
							if(empty($item_name)) 
    {
        echo("<p>You didn't select item.</p>\n");
    } 
    else 
    {
       $N = count($item_name);
        echo("<p>You selected $N Items(s): ");
		$arr = array();
        for($i=0; $i < $N; $i++)
        {
            $var1=$item_name[$i];
            $var2=$quantity[$i];
        
           $a1 = mysqli_query($connection,"SELECT * FROM products WHERE product_name='$var1'");
		   $a1_data = mysqli_fetch_array($a1);
		   $p_name = $a1_data['product_name'];
		   $p_price = $a1_data['product_price'];
		   
		   $c = $p_price*$var2;
		   array_push($arr,$c);
            
			if(!empty($var1))
			{
			
            $q3 = mysqli_query($connection,"INSERT INTO order_product VALUES ('','$m_id','$p_name','$p_price','$var2','$c',NOW())");
			if($q3)
			{
				echo 'Item Added';
				$c=0;
			}
			else 
			{
				echo 'Failed';
			}
			}
			else 
			{
				
			}
            
             
        }
		
		$a = array_sum($arr);
		$dis = $discount/100;
		$b=$a*$dis;
		$c = $a-$b;
		$d = $c*0.05;
		
		
		$a4 = mysqli_query($connection,"UPDATE orders SET `amount`='$a',`status`='complete',`discount_price`='$c',`taxes`='$d' WHERE id='$m_id'");
									if(!empty($number))
									  {
										  $k9 = mysqli_query($connection,"SELECT count(id) as c_id FROM reward_point WHERE contact_number='$number'");
										  $k9_data = mysqli_fetch_array($k9);
										  $c_id = $k9_data['c_id'];
										  if($c_id=='0')
										  {
											  $point = $a*0.01;
											  $k1 = mysqli_query($connection,"INSERT INTO reward_point VALUES ('','$number','$point',NOW())");
										  }
										  else 
										  {
											  $k2 = mysqli_query($connection,"SELECT points FROM reward_point WHERE contact_number='$number'");
											  $k2_data = mysqli_fetch_array($k2);
											  $points = $k2_data['points'];
											  
											  $point = $a*0.1;
											  $point = $point+$points;
											  
											  $k1 = mysqli_query($connection,"UPDATE reward_point SET points='$point', date=NOW() WHERE contact_number='$number'");
											  
											  
										  }
									  }
		if($a4)
		{
        echo "Order Complete";
		}
      }
					
					
					
									  
									   
								   }
								   ?>
                                </div>
								<style>
								#mybutton {
  position: fixed;
  bottom: -4px;
  right: 10px;
}
								</style>
								<?php 
								$l1 = mysqli_query($connection,"SELECT * FROM orders WHERE id='$getid'");
								$l1_data =  mysqli_fetch_array($l1);
								$table = $l1_data['table_number'];								
								$contact = $l1_data['contact_number'];								
								$waiter_name = $l1_data['waiter_name'];	
								$captain= $l1_data['captain_name'];								
								?>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form role="form" method="POST" action="edit-order.php?id=<?php echo $getid; ?>" enctype="multipart/form-data">
										<div id="mybutton">
										<div class="col-lg-12">
										<div class="col-lg-6">
										<div class="form-group">
	 
	  
	  </div>
	  </div>
	  <div class="col-lg-12">
	  <div class="form-group">
                                                <button type="submit" name="add_order" class="btn btn-success btn-lg">Complete Order</button>
                                            </div>
	  </div>
	  </div>
	  </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Table Number</p>
                                                <input type="text" name="table" value="<?php echo $table; ?>" class="form-control input-rounded " placeholder="Table Number">
                                            </div>
											
											 <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Waiter Name</p>
                                                <input type="text" name="waiter" value="<?php echo $waiter_name ; ?>" class="form-control input-rounded " placeholder="Waiter Name">
                                            </div>
                                            
                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Captain Name</p>
                                                <input type="text" name="captain" value="<?php echo $captain; ?>" class="form-control input-rounded " placeholder="Captain Name">
                                            </div>
                                            
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Discount</p>
                                                <input type="text" name="discount" class="form-control input-rounded " placeholder="Discount">
                                            </div>
                                            
                                             <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Delivery Charge</p>
                                                <input type="text" name="delivery" class="form-control input-rounded " placeholder="Delivery Charge">
                                            </div>
                                            
											
											  <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Contact Number</p>
                                                <input type="text" name="number" value="<?php echo $contact; ?>" class="form-control input-rounded " placeholder="Contact Number">
                                            </div>
											
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Order By</p>
                                               <select name="type" class="form-control input-rounded">
											   <option value="table">Table</option>
											   <option value="call">On Call</option>
											   </select>
                                            </div>
											
	 
											
											
											<?php $l2 = mysqli_query($connection,"SELECT * FROM order_product WHERE order_id='$getid'");
											while($l2_data = mysqli_fetch_array($l2))
											{
												$product = $l2_data['product_name'];
												$quantity = $l2_data['product_quantity'];
											?>
											
                                            <div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" value="<?php echo $product; ?>" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" value="<?php echo $quantity; ?>" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
								<?php } ?>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
											<div class="form-group">
											
                                                <p class="text-muted m-b-15 f-s-12">Item Name</p>
                                                <input type="text" name="item_name[]" placeholder="item name" class="form-control input-rounded" list="products">
												<datalist id="products">
												<?php $a5 = mysqli_query($connection,"SELECT * FROM products");
												while($a5_data = mysqli_fetch_array($a5))
												{
												?>
												<option value="<?php echo $a5_data['product_name']; ?>">
												<?php } ?>
												</datalist>
                                            
										
                                                <p class="text-muted m-b-15 f-s-12">Quantity</p>
                                                <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity">
                                           
											
                                            </div>
											
												
                                            
                                            
                                            
                                        </form>
                                    </div>
                                </div>
								
								
                            </div>
                        </div><!-- /# column -->
                        <<!-- /# column -->
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
          newdiv.innerHTML = '<p><div id="me'+co+'"><div class="form-group"> <p class="text-muted m-b-15 f-s-12">Item Name</p> <input type="text" name="item_name[]" class="form-control input-rounded" list="products"> <datalist id="products"> <?php $a5 = mysqli_query($connection,"SELECT * FROM products"); while($a5_data = mysqli_fetch_array($a5)) { ?> <option value="<?php echo $a5_data['product_name']; ?>"> <?php } ?> </datalist> </div> <div class="form-group"> <p class="text-muted m-b-15 f-s-12">Quantity</p> <input type="text" name="quantity[]" class="form-control input-flat" placeholder="quantity"> </div></div></p>';
		
		
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
						 <div class="row" id="alpha">
                        <div class="col-lg-12">
                            <?php 
							
								 $a4 = mysqli_query($connection,"SELECT max(id) as m_id FROM orders");
									  $a4_data = mysqli_fetch_array($a4);
									  $m_id = $a4_data['m_id'];
									
									  $a6 = mysqli_query($connection,"SELECT * FROM orders WHERE id='$m_id'");
									  $a6_data = mysqli_fetch_array($a6);
									  $amount = $a6_data['amount'];
									  $invoice = $a6_data['invoice'];
									  $discount = $a6_data['discount'];
									    $waiter= $a6_data['waiter_name'];
									      $captain= $a6_data['captain'];
									       $table_number= $a6_data['table_number'];
									        $delivery= $a6_data['delivery'];
							?>
                            <div class="card alert">
                                <div class="order-list-item">
								<button class="btn btn-success btn-rounded btn-lg" onClick="printData();">Print</button>
								<a href="edit-order.php?id=<?php echo $m_id; ?>"><button class="btn btn-success btn-rounded btn-lg">EDIT</button></a>
								<hr>
								
                                    <table class="table" border="0" width="60mm" height="100mm" id="printTable">
									<tr>
        <td>

          <table border="0" width="100%" >
           
            <tr>
              <td align="center"><nobr><?php echo date("d-m-y h:i:sa"); ?><time></nobr></td>
            </tr>
            <tr>
              <td align="center" style="font-size:30px;"><nobr><strong>Thelewala</strong></nobr></td>
			    <tr>
              <td align="center"><nobr>RH-14, Scheme No. 54, </nobr></td>
            </tr><tr>
              <td align="center"><nobr>Near Satya Sai Sqaure, Vijaynagar. </nobr></td>
            </tr>
            </tr>
			<tr>
              <td align="center"><nobr>GSTIN : 23AYDPM1453C1Z0</nobr></td>
            </tr>
            <tr>
              <td align="center"><nobr>Invoice Number: <?php echo $invoice; ?></nobr></td>
            </tr>
            
            <tr>
              <td align="center"><nobr>Table Number: <?php echo $table_number; ?></nobr></td>
            </tr>
            
             <tr>
              <td align="center"><nobr>Waiter Name: <?php echo $waiter; ?></nobr></td>
            </tr>
            
            <tr>
              <td align="center"><nobr>Captain Name: <?php echo $captain; ?></nobr></td>
            </tr>
            
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
		  <table border="1" width="100%">
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
                                             <?php if($product_name=='Delivery Charge (5km)') { ?>
                                            <td>Delivery Charge</td>
										<?php } elseif($product_name=='Delivery Charge (5-8 km)') { ?>
                                             <td>Delivery Charge</td>
										<?php } else { ?>
										<td><?php echo $product_name; ?></td>
										<?php } ?>
                                            <td><?php echo $product_price; ?></td>
                                           
                                            <td><?php echo $product_quantity; ?></td>
                                            <td><?php echo $product_total; ?></td>
                                          
                                        </tr>

                                        <?php } ?>
										
										
										
										
                                        </tbody>
                                    </table>
									    <table border="2" width="100%">
            <tr>
			  <td align="left"><nobr>Total:</nobr></td>
              <td align="right"><nobr><?php echo $amount; ?><nobr></td>
			</tr>
			
			<?php if($delivery!='0') { ?>
			 <tr>
			  <td align="left"><nobr>Delivery Charges:</nobr></td>
              <td align="right"><nobr><?php echo $delivery; $amount = $amount+$delivery; ?><nobr></td>
			</tr>
			<?php } ?>
			
			<?php if($discount!='0') { ?>
			 <tr>
			  <td align="left"><nobr>Discount(<?php echo $discount; ?>%):</nobr></td>
              <td align="right"><nobr><?php $dis = $discount/100; $b=$amount*$dis; $amount = $amount-$b; echo $b; ?><nobr></td>
			</tr>
			<?php } ?>
			<tr>
              <td align="left"><nobr>CGST @ 2.5%:</nobr></td>
              <td align="right"><nobr><?php $l=$amount*0.025; echo $l; ?><nobr></td>
            </tr>
            <tr>
              <td align="left"><nobr>SGST @ 2.5%:</nobr></td>
              <td align="right"><nobr><?php $p=$amount*0.025; echo $p; ?><nobr></td>
            </tr>
           
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left"><nobr>Total Amount:</nobr></td>
              <td align="right"><nobr><?php $w = $amount+$l+$p; echo round($w); ?><nobr></td>
            </tr>
			
          </table>
		   <table border="0" width="100%" >
            
			<tr>
              <td align="center"><nobr>Thank you for your visit.</nobr></td>
            </tr>
			<tr>
              <td align="center"><nobr>See you soon!</nobr></td>
            </tr>
            
            
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
									</table>
                                </div>
								 <script>
    function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}


    </script>
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
						</div>
						<!-- /# card -->
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