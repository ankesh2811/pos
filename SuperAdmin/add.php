
<?php include '../config.php'; ?>


<?php  $pro_id = $_GET['q'];
		
	   
		$store = mysqli_query($connection,"SELECT * FROM orders_mid WHERE id='$pro_id'");
		$store_data = mysqli_fetch_array($store);
		$invoice = $store_data['invoice'];
		$table_number = $store_data['table_number'];
		$contact_number = $store_data['contact_number'];
		$amount = $store_data['amount'];
		$waiter_name = $store_data['waiter_name'];
		$date = $store_data['date'];
		$time = $store_data['time'];
		$status = $store_data['status'];
		$type = $store_data['type'];
		$discount = $store_data['discount'];
		$discount_price = $store_data['discount_price'];
		$taxes = $store_data['taxes'];
		$captain_name = $store_data['captain_name'];
		$delivery = $store_data['delivery'];
		
		$dis = $discount/100;
		$b=$amount*$dis;
		$c = $amount-$b;
		$e = $amount+$delivery;
		$d = $c*0.05;
		
			
		$a2 = mysqli_query($connection,"INSERT INTO orders VALUES ('','$invoice','$table_number','$contact_number','$amount','$waiter_name','$date','$time','$status','$type','','','$discount','$e','$d','$captain_name','$delivery')");
		
		$a3 = mysqli_query($connection,"SELECT max(id) as m_id FROM orders");
									  $a3_data = mysqli_fetch_array($a3);
									  $m_id = $a3_data['m_id'];
		
		
		$a1 = mysqli_query($connection,"SELECT * FROM order_mid_product WHERE order_id='$pro_id'");
		while($a1_data = mysqli_fetch_array($a1))
		{
			$order_id = $a1_data['order_id'];
			$product_name = $a1_data['product_name'];
			$product_price = $a1_data['product_price'];
			$product_quantity = $a1_data['product_quantity'];
			$product_total = $a1_data['product_total'];
			$dates = $a1_data['date'];
			
			$cart = mysqli_query($connection,"INSERT INTO order_product VALUES ('','$m_id','$product_name','$product_price','$product_quantity','$product_total','$dates')");
		}
		
       
?>