<?php include("session.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include '../config.php';?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thelewala : Orders Report </title>
	
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
                                    <li class="active">Purchase Report</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
					<script>
					function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('myTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Ankesh.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}		</script>
                <div class="main-content">
                   
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
                                 <div class="order-list-item" id="customers">
								<button class="btn btn-lg btn-info" onclick="fnExcelReport();">Print Report</button><br><br>
								<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for table number..">
								<?php
								if(!empty(isset($_POST['submit'])))
								{
									$date = $_POST['date'];
									$date1 = $_POST['date1'];
									?>
									<form role="form" method="POST" action="purchase-report.php">
								<div class="form-group">
								<input type="date" name="date" class="form-control input-flat" >
								</div>
								<div class="form-group">
								<input type="date" name="date1" class="form-control input-flat" >
								</div>
								<button class="btn btn-lg btn-info" type="submit" name="submit">Get Report</button>
								</form>
								 <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="order-list-item">
                                    <table class="table" style="width:100%;">
                                        <thead style="background:white;">
                                        <tr>
											
                                            <th style="color:black;">Total Purchase</th>
                                            <th style="color:black;"><?php 	
                                            if(empty($date1))
										{
										  $a3 = mysqli_query($connection,"SELECT SUM(purchase_amount) as sum FROM purchase WHERE purchase_date='$date'");
										 
										  } elseif($date1==$date){ $a3 = mysqli_query($connection,"SELECT SUM(purchase_amount) as sum FROM purchase WHERE purchase_date='$date'");
										 
										  
										  
										
										} else {
										
										$a3 = mysqli_query($connection,"SELECT SUM(purchase_amount) as sum FROM purchase WHERE purchase_date BETWEEN '$date' AND '$date1'");
																}
										
                                            
                                            
										$a3_data = mysqli_fetch_array($a3);
										echo $a3_data['sum']; ?></th>
										
                                           
                                            
                                           
                                          
                                        </tr>
                                        </thead>
                                      
                                    </table>
                                </div>
							</div><!-- /# card -->
						</div><!-- /# column -->
					</div>
                                    <table class="table" id="myTable">
                                        <thead>
                                        <tr>
											<th>#</th>
                                            <th>Purchase Bill</th>
                                            <th>Vendor</th>
                                            <th>Amount</th>
                                            <th>Mode</th>
                                            <th>Date</th>
                                           
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$i = '1';	
										$ii = '';
										if(empty($date1))
										{
										$a2 = mysqli_query($connection,"SELECT * FROM purchase WHERE purchase_date ='$date' ORDER BY id DESC");} elseif($date1==$date){ $a2 = mysqli_query($connection,"SELECT * FROM purchase WHERE purchase_date ='$date' ORDER BY id DESC");
										
										} else {
										
										$a2 = mysqli_query($connection,"SELECT * FROM purchase WHERE purchase_date BETWEEN date AND date1 ORDER BY purchase_date DESC");
										}
										
										
										
										while($a2_data = mysqli_fetch_array($a2))
										{
										$purchase_bill = $a2_data['purchase_bill'];
										$purchase_vendor = $a2_data['purchase_vendor'];
										$amount = $a2_data['purchase_amount'];
										$date = $a2_data['purchase_date'];
										$mode= $a2_data['mode'];
										
										
									
										
										$ii += $i; 
										?>
                                        <tr>
										<td> <?php echo $ii; ?> </td>
                                            <td><?php echo $purchase_bill; ?></td>
											
                                            <td><?php echo $purchase_vendor; ?></td>
                                            <td><?php echo $amount; ?></td>
                                             <td><?php echo $mode; ?></td>
                                            <td><?php echo $date; ?></td>
                                           
                                           
                                           
                                        
											
                                        </tr>
										<?php } ?>
                                       

                                      
                                        </tbody>
                                    </table>
									<?php
									
								}
								else {
								?>
								<form role="form" method="POST" action="purchase-report.php">
								<div class="form-group">
								<input type="date" name="date" class="form-control input-flat" >
								</div>
								<div class="form-group">
								<input type="date" name="date1" class="form-control input-flat" >
								</div>
								<button class="btn btn-lg btn-info" type="submit" name="submit">Get Report</button>
								</form>
								  <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="order-list-item">
                                    <table class="table" style="width:100%;">
                                        <thead style="background:white;">
                                        <tr>
											
                                            <th style="color:black;">Total Purchase</th>
                                            <th style="color:black;"><?php 	
                                            if(empty($date1))
										{
										  $a3 = mysqli_query($connection,"SELECT SUM(purchase_amount) as sum FROM purchase");
										 
										  } elseif($date1==$date){ $a3 = mysqli_query($connection,"SELECT SUM(purchase_amount) as sum FROM purchase");
										 
										  
										  
										
										} else {
										
										$a3 = mysqli_query($connection,"SELECT SUM(purchase_amount) as sum FROM purchase");
																}
										
                                            
                                            
										$a3_data = mysqli_fetch_array($a3);
										echo $a3_data['sum']; ?></th>
										
                                           
                                            
                                           
                                          
                                        </tr>
                                        </thead>
                                      
                                    </table>
                                </div>
							</div><!-- /# card -->
						</div><!-- /# column -->
					</div>
                                    <table class="table" id="myTable">
                                        <thead>
                                        <tr>
											<th>#</th>
                                            <th>Purchase Bill</th>
                                            <th>Vendor</th>
                                            <th>Amount</th>
                                            <th>Mode</th>
                                            <th>Date</th>
                                           
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$i = '1';	
										$ii = '';
										$a2 = mysqli_query($connection,"SELECT * FROM purchase ORDER BY purchase_date DESC");
										
										
										while($a2_data = mysqli_fetch_array($a2))
										{
										$purchase_bill = $a2_data['purchase_bill'];
										$purchase_vendor = $a2_data['purchase_vendor'];
										$amount = $a2_data['purchase_amount'];
										$date = $a2_data['purchase_date'];
										$mode= $a2_data['mode'];
										
										
									
										
										$ii += $i; 
										?>
                                        <tr>
										<td> <?php echo $ii; ?> </td>
                                            <td><?php echo $purchase_bill; ?></td>
											
                                            <td><?php echo $purchase_vendor; ?></td>
                                            <td><?php echo $amount; ?></td>
                                            <td><?php echo $mode; ?></td>
                                            <td><?php echo $date; ?></td>
                                           
                                           
                                           
                                        
											
                                        </tr>
										<?php } ?>

                                       

                                      
                                        </tbody>
                                    </table>
								<?php } ?>
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