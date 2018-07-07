<?php include("session.php");?>

<!DOCTYPE html>
<script language="javascript" type="text/javascript">
function windowClose() {
window.open('','_parent','');
window.close();
}
</script>
<html lang="en">
<?php include '../config.php';?>
  <?php
								   if(isset($_POST['add_order']))
								   {
									 
									  
									  $table=$_POST['table'];
									  $number=$_POST['number'];
									  $waiter=$_POST['waiter'];
									  $captain=$_POST['captain'];
									  
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
									  
									  $b = date("m-d-y");
									  $k = date("h:i:sa");
									 
									  $type=$_POST['type'];
									  $today = date("mdy");
									  $rand = rand(100,999);
									  
									  
									  
									  $arr = array();
									  array_push($arr,"TWL");
									  array_push($arr,$today);
									  array_push($arr,$rand);
									  $invoice = implode($arr);
									  
									  
									  $a2 = mysqli_query($connection,"INSERT INTO orders_mid VALUES ('','$invoice','$table','$number','','$waiter',NOW(),'$k','','$type','','','$discount','','','$captain','$delivery')");
									  
									   
									 
								   }
								   ?>
								   <?php
								   $a3 = mysqli_query($connection,"SELECT max(id) as m_id FROM orders_mid");
									  $a3_data = mysqli_fetch_array($a3);
									  $m_id = $a3_data['m_id'];
								   ?>
<head>
<title> <?php echo $table; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 100%;
    height: 260px;
}

.tab1 {
    float: right;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 40%;
    height: auto;
}

/* Style the buttons inside the tab */
.tab button {
 margin-left:2%;
 padding-left:15px; 
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    
    width: 60%;
    border-left: none;
    height: auto;
}

div.ex1 {
    background-color: lightblue;
    width: 100%;
    height: 264px;
    overflow: scroll;
}

div.ex3 {
    background-color: white;
    width: 80%;
    height: 300px;
    overflow: scroll;
}

div.ex2 {
    background-color: lightblue;
    width: 40%;
    height: 600px;
    overflow: scroll;
}
#third1 {

 

    position: absolute;

    top: 411px;

}
#top {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
  width: 100%;
  height: 268px;
}
</style>
<link rel="stylesheet" media="print" href=",../print.css" type="text/css" />
<style>
/*!
 * bootstrap-vertical-tabs - v1.2.1
 * https://dbtek.github.io/bootstrap-vertical-tabs
 * 2014-11-07
 * Copyright (c) 2014 İsmail Demirbilek
 * License: MIT
 */
.tabs-left, .tabs-right {
  border-bottom: none;
  padding-top: 2px;
}
.tabs-left {
  border-right: 1px solid #ddd;
}
.tabs-right {
  border-left: 1px solid #ddd;
}
.tabs-left>li, .tabs-right>li {
  float: none;
  margin-bottom: 2px;
}
.tabs-left>li {
  margin-right: -1px;
}
.tabs-right>li {
  margin-left: -1px;
}
.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
  border-bottom-color: #ddd;
  border-right-color: transparent;
}

.tabs-right>li.active>a,
.tabs-right>li.active>a:hover,
.tabs-right>li.active>a:focus {
  border-bottom: 1px solid #ddd;
  border-left-color: transparent;
}
.tabs-left>li>a {
  border-radius: 4px 0 0 4px;
  margin-right: 0;
  display:block;
}
.tabs-right>li>a {
  border-radius: 0 4px 4px 0;
  margin-right: 0;
}
.sideways {
  margin-top:50px;
  border: none;
  position: relative;
}
.sideways>li {
  height: 20px;
  width: 120px;
  margin-bottom: 100px;
}
.sideways>li>a {
  border-bottom: 1px solid #ddd;
  border-right-color: transparent;
  text-align: center;
  border-radius: 4px 4px 0px 0px;
}
.sideways>li.active>a,
.sideways>li.active>a:hover,
.sideways>li.active>a:focus {
  border-bottom-color: transparent;
  border-right-color: #ddd;
  border-left-color: #ddd;
}
.sideways.tabs-left {
  left: -50px;
}
.sideways.tabs-right {
  right: -50px;
}
.sideways.tabs-right>li {
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.sideways.tabs-left>li {
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  transform: rotate(-90deg);
}
</style>
<script>
$(document).ready(function () {
    target_offset = $('#third1').offset(),
    target_top = target_offset.top;
    $('html, body').animate({
        scrollTop: target_top
    }, 800);
});
</script>
<script>
  function toggleTable()
    {
         var elem=document.getElementById("loginTable");
         var hide = elem.style.display =="none";
         if (hide) {
             elem.style.display="table";
        } 
        else {
           elem.style.display="none";
        }
    }
</script>

<style>
								#mybutton {
  position: fixed;
  bottom: -4px;
  align:right;
  right: 10px;
}

p.b {
    word-wrap: break-word;
}
								</style>
</head>
<body>
<script>
function showUser(str,odr) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		
		
        xmlhttp.open("GET","insert.php?q="+str+"&od="+odr,true);
        xmlhttp.send();
    }
}
</script>
<script>
function showminus(str,odr) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		
		
        xmlhttp.open("GET","minus.php?q="+str+"&od="+odr,true);
        xmlhttp.send();
    }
}
</script>
<script>
function showdelete(str,odr) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		
		
        xmlhttp.open("GET","del.php?q="+str+"&od="+odr,true);
        xmlhttp.send();
    }
}
</script>
<script>
function showbill(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		
		
        xmlhttp.open("GET","add.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


   
							<div class="row">
							
<div class="tab ex1 col-lg-12" >
<p style="color:black;font-size:22px;text-align:center">Menu</p>
  <?php 
$sql1 = mysqli_query($connection,"SELECT DISTINCT(category) as category FROM products ORDER BY category ASC");
while($sql_data1 = mysqli_fetch_array($sql1))
{
$category1 = $sql_data1['category'];

?>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-bottom:5px;">
  <button class="btn btn-primary tablinks" style="width:130px;font-size:auto;" onclick="openCity(event, '<?php echo $category1; ?>')" id="defaultOpen"><?php echo $category1; ?></button>
  </div>
  <?php } ?>
  
	  

</div>

 <div id="mybutton" class="col-lg-12" style="margin-right:65%;">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
<a href="dashboard.php"><button class="btn btn-success btn-lg">Back to Orders</button></a> 
</div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
	  
                                               <button class="btn btn-warning btn-lg" type="submit" onClick="toggleTable();showbill(<?php echo $m_id; ?>);printData();windowClose();">Print</button>
                                            
	  </div>
</div>

</div>
<div class="row">
<style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<style>
 .printMe {display: none;}
            @media print {
                table {display: none;}
                .printMe {display: block;}
            }
</style>

<div class="tab1 ex2" >
<p style="color:black;font-size:22px;text-align:center">Billing</p>
				<?php

	echo'
  <div class="tab-content">';
  	$aplha = mysqli_query($connection,"SELECT * FROM products");
				while($aplha_data = mysqli_fetch_array($aplha))
				{
						$prod = $aplha_data['product_name'];
					
					
					echo '
					<div id="'.$aplha_data['id'].'" role="tabpanel" class="tab-pane no-print"><p style="text-align: center;">
					'.$aplha_data['product_name'].'</p>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align:center;">
					 <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
   <button type="submit" class="btn btn-success" onClick="showUser(this.value, '.$m_id.')" value="'.$aplha_data['id'].'" name="cart">+</button>
  </div>
  <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
  <button type="submit" class="btn btn-danger" onClick="showminus(this.value,'.$m_id.')" value="'.$aplha_data['id'].'" name="cart">-</button></div>
   <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
  <button type="submit" class="btn btn-danger" onClick="showdelete(this.value,'.$m_id.')" value="'.$aplha_data['id'].'" name="cart">X</button>
</div></div> </div>';
				} echo '</div>';				
				?>
				<br>
	
	<table class="table" border="0" width="60mm" height="100mm" id="printTable" >
									<tr>
        <td>

          <table id="loginTable" border="0" width="100%" style="display:none">
           
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
            
             <?php if($table=='Zomato') { ?>     
            <tr>
              <td align="center"><nobr>Zomato Order</nobr></td>
            </tr>
			 <?php } elseif($table='Parcel') { ?>
             <tr>
              <td align="center"><nobr>Delivery</nobr></td>
            </tr>
			 <?php } else { ?>
			 
			 <tr>
              <td align="center"><nobr>Table Number: <?php echo $table; ?></nobr></td>
            </tr>
			 <?php } ?>
			 
			 <?php if(!empty($waiter)) { ?>
			 
             <tr>
              <td align="center"><nobr>Waiter Name: <?php echo $waiter; ?></nobr></td>
            </tr>
			 <?php } ?>
			  <?php if(!empty($captain)) { ?>
            <tr>
              <td align="center"><nobr>Captain Name: <?php echo $captain; ?></nobr></td>
            </tr>
			  <?php } ?>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
		
		  <div id="third1">
  <div class="col-lg-12" id="txtHint" style="height: auto;font-size: 18px;"></div>
  </div>
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


  <?php 
$sql1 = mysqli_query($connection,"SELECT DISTINCT(category) as category FROM products");
while($sql_data1 = mysqli_fetch_array($sql1))
{
$category2 = $sql_data1['category'];


?>
<div id="<?php echo $category2; ?>" class="tabcontent col-lg-12">
  <h3><?php echo $category2; ?></h3>
  <?php
  $sql3 = mysqli_query($connection,"SELECT * FROM products WHERE category='$category2' ORDER BY product_name ASC");
  while($sql3_data = mysqli_fetch_array($sql3))
  {
  ?>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 btn btn-success" onClick="showUser(<?php echo $sql3_data['id']; ?>,<?php echo $m_id; ?>)"  style="border-width:1px; border-style:solid;width:110px;height:83px;margin:1px;">
 
   <p style="font-size:13px;color:black;"><?php echo wordwrap($sql3_data['product_name'],12,"<br>\n"); ?></p>
   
  
 
 
  </div>
  <?php } ?>
</div>
 <?php } ?>
 
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
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

     	<script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->   
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->
</body>
</html> 
