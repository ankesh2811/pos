<?php include 'config.php'; ?>
<?php include 'session.php'; ?>


<?php  $pro_id = $_GET['q'];

		$store = mysqli_query($connection,"SELECT * FROM hf7_product_to_store WHERE product_sr_id='$pro_id'");
		$store_data = mysqli_fetch_array($store);
		$store_id = $store_data['store_id'];
		$price = $store_data['price'];
		$product_id = $store_data['product_id'];

		$user = mysqli_query($connection,"SELECT * FROM products_added WHERE username='$id' AND product_id='$pro_id' AND store_id='$store_id'");
		$user_data = mysqli_num_rows($user);
		$ser_data = mysqli_fetch_array($user);
		$quantity = $ser_data['quantity'];
		$amount = $ser_data['amount'];
		$pr = $ser_data['price'];
		
		if($user_data>'1')
		{
			$w = '1';
			$q = $quantity-$w;
			$a = $pr*$q;
			
			$cart_date = mysqli_query($connection,"UPDATE `products_added` SET `quantity`='$q',`amount`='$a' WHERE product_id='$pro_id' AND username='$id' AND store_id='$store_id'");
			if($cart_date)
			{
				
			}
		}
		
		else
		{ 
			
			$del = mysqli_query($connection,"DELETE FROM products_added WHERE product_id='$pro_id' AND store_id='$store_id' AND username='$id'");
		}
	
				
				$store_total = mysqli_query($connection,"SELECT SUM(amount) AS s_total FROM products_added WHERE store_id='$store_id' AND username='$id'");
				$store_total_data = mysqli_fetch_array($store_total);
				$s_total = $store_total_data['s_total'];
				
				$user_total = mysqli_query($connection,"SELECT SUM(amount) AS u_total FROM products_added WHERE username='$id'");
				$user_total_data = mysqli_fetch_array($user_total);
				$u_total = $user_total_data['u_total'];
				
				
				if(!empty($s_total)) {
				echo '<div class="col-lg-6" style="margin-top:2%;">';echo 'Tienda Total :'; echo '$'; echo round($s_total,2); echo'</div>';
				 } 
				if(!empty($u_total)) { 
				echo '<div class="col-lg-6" style="margin-top:2%;">';echo 'Carro Total :'; echo '$'; echo round($u_total,2); echo'</div>';
				 } 
	?>