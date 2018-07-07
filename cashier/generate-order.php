<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>
<?php if(!empty($_GET['id']))
{
$kid = $_GET['id'];
$k1 = mysqli_query($connection,"SELECT * FROM orders WHERE id='$kid'");
$k1_data = mysqli_fetch_array($k1);
$invoice = $k1_data['invoice'];
$table_number = $k1_data['table_number'];
$contact_number = $k1_data['contact_number'];
$amount = $k1_data['amount'];
$waiter_name = $k1_data['waiter_name'];
$date = $k1_data['date'];
$time = $k1_data['time'];
$status = $k1_data['status'];
$type = $k1_data['type'];
$payment_status = $k1_data['payment_status'];
$payment_type = $k1_data['payment_type'];
$discount = $k1_data['discount'];
$discount_price = $k1_data['discount_price'];
$taxes = $k1_data['taxes'];
$captain_name = $k1_data['captain_name'];

$k2 = mysqli_query($connection,"INSERT INTO orders VALUES ('','$invoice','$table_number','$contact_number','$amount','$waiter_name','$date','$time','$status','$type','$payment_status','$payment_type','$discount','$discount_price','$taxes','$captain_name')");

$k5 = mysqli_query($connection,"SELECT max(id) as l_id from orders");
$k5_data = mysqli_fetch_array($k5);
$l_id = $k5_data['l_id'];

$k3 = mysqli_query($connection,"SELECT * FROM order_mid_product WHERE order_id='$kid'");
while($k3_data = mysqli_fetch_array($k3))
{
	$product_name = $k3_data['product_name'];
	$product_price = $k3_data['product_price'];
	$product_quantity = $k3_data['product_quantity'];
	$product_total = $k3_data['product_total'];
	$date = $k3_data['date'];
	
	$k4 = mysqli_query($connection,"INSERT INTO order_product VALUES ('','$l_id','$product_name','$product_price','$product_quantity','$product_total','$date')");
	
}

header('Location: '.$_SERVER['REQUEST_URI']);

}	
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Order Estimate </title>
	
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
               <!-- /# column -->
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
						 <div class="row" >
                        <div class="col-lg-12">
                            <?php 
							
								 $a4 = mysqli_query($connection,"SELECT max(id) as m_id FROM orders");
									  $a4_data = mysqli_fetch_array($a4);
									  $m_id = $a4_data['m_id'];
									
									  $a6 = mysqli_query($connection,"SELECT * FROM orders WHERE id='$m_id'");
									  $a6_data = mysqli_fetch_array($a6);
									  $amoun = $a6_data['amount'];
									  $invoice = $a6_data['invoice'];
									  $disc = $a6_data['discount'];
									   $waiter= $a6_data['waiter_name'];
									      $captain= $a6_data['captain_name'];
									       $table_number= $a6_data['table_number'];
							?>
                            <div class="card alert" >
                                <div class="order-list-item" name="alpha">
								
								<a href="edit-order.php?id=<?php echo $m_id; ?>" target="_blank"><button class="btn btn-info btn-rounded btn-lg">EDIT</button></a>
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
              <td align="center"><nobr>Invoice Number: <?php echo $a6_data['invoice']; ?></nobr></td>
            </tr>
            
                  
            <tr>
              <td align="center"><nobr>Table Number: <?php echo $a6_data['table_number']; ?></nobr></td>
            </tr>
            
             <tr>
              <td align="center"><nobr>Waiter Name: <?php echo $a6_data['waiter_name']; ?></nobr></td>
            </tr>
            
            <tr>
              <td align="center"><nobr>Captain Name: <?php echo $a6_data['captain_name']; ?></nobr></td>
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
										<?php if($a1_data['product_name']=='Delivery Charge (5km)') { ?>
                                            <td>Delivery Charge</td>
										<?php } elseif($a1_data['product_name']=='Delivery Charge (5-8 km)') { ?>
                                             <td>Delivery Charge</td>
										<?php } else { ?>
										<td><?php echo $a1_data['product_name']; ?></td>
										<?php } ?>
										<td><?php echo $a1_data['product_price']; ?></td>
                                            <td><?php echo $a1_data['product_quantity']; ?></td>
                                            <td><?php echo $a1_data['product_total']; ?></td>
                                          
                                        </tr>

                                        <?php } ?>
										
										
										
										
                                        </tbody>
                                    </table>
									    <table border="2" width="100%">
            <tr>
			  <td align="left"><nobr>Total:</nobr></td>
              <td align="right"><nobr><?php echo $a6_data['amount']; ?><nobr></td>
			</tr>
			<?php if($disc!='0') { ?>
			 <tr>
			  <td align="left"><nobr>Discount(<?php echo $a6_data['discount']; ?>%):</nobr></td>
              <td align="right"><nobr><?php $dis = $disc/100; $b=$amoun*$dis; $amoun = $amoun-$b; echo $b; ?><nobr></td>
			</tr>
			<?php } ?>
			<tr>
              <td align="left"><nobr>CGST @ 2.5%:</nobr></td>
              <td align="right"><nobr><?php $l=$amoun*0.025; echo $l; ?><nobr></td>
            </tr>
            <tr>
              <td align="left"><nobr>SGST @ 2.5%:</nobr></td>
              <td align="right"><nobr><?php $p=$amoun*0.025; echo $p; ?><nobr></td>
            </tr>
           
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left"><nobr>Total Amount:</nobr></td>
              <td align="right"><nobr><?php $w = $amoun+$l+$p; echo round($w); ?><nobr></td>
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