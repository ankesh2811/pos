
<?php include '../config.php'; ?>


<?php  $pro_id = $_GET['q'];
		$order_id = $_GET['od'];
	   
		$store = mysqli_query($connection,"SELECT * FROM products WHERE id='$pro_id'");
		$store_data = mysqli_fetch_array($store);
		$product_name = $store_data['product_name'];
		$product_price = $store_data['product_price'];
			
		$k = date("h:i:sa");
		
		$var2 = 1;
		
		$c = $product_price*$var2;
		
		$d1 = mysqli_query($connection,"SELECT * FROM orders_mid WHERE id='$order_id'");
		$d1_data = mysqli_fetch_array($d1);
		$delivery = $d1_data['delivery'];
		$discount = $d1_data['discount'];
		
		$a1 = mysqli_query($connection,"SELECT count(id) as c_id FROM order_mid_product WHERE order_id='$order_id'");
		$a1_data = mysqli_fetch_array($a1);
		$c_id = $a1_data['c_id'];
		
		if($c_id=='0')
		{
		
		$cart = mysqli_query($connection,"INSERT INTO order_mid_product VALUES ('','$order_id','$product_name','$product_price','$var2','$c',NOW())");
		}
		else
		{
			$a2 = mysqli_query($connection,"SELECT count(id) as s_id FROM order_mid_product WHERE product_name='$product_name' AND order_id='$order_id'");
			$a2_data = mysqli_fetch_array($a2);
			$s_id = $a2_data['s_id'];
			
			if($s_id=='0')
			{
				$cart = mysqli_query($connection,"INSERT INTO order_mid_product VALUES ('','$order_id','$product_name','$product_price','$var2','$c',NOW())");
			}
			else
			{
				$a4 = mysqli_query($connection,"SELECT * FROM order_mid_product WHERE product_name='$product_name' AND order_id='$order_id'");
				$a4_data = mysqli_fetch_array($a4);
				$pro_q = $a4_data['product_quantity'];
				$pro = $pro_q+1;
				$pp = $product_price*$pro;
				
				$cart = mysqli_query($connection,"UPDATE order_mid_product SET product_quantity='$pro',product_total='$pp' WHERE product_name='$product_name' AND order_id='$order_id'");
				
				
			}
			
		}
		
		if($cart)
		{
			
		}
	
		
		
				echo '
  
   <table border="1" width="100%">
    <thead>
      <tr>
        <th style="font-size:15px;">Name</th>
		<th style="font-size:15px;">Price</th>
        <th style="font-size:15px;">Quantity</th>
        <th style="font-size:15px;">Total Price</th>
      </tr>
    </thead>
    <tbody>';
	
	
     
      
    
				
				
				
				$user_total = mysqli_query($connection,"SELECT SUM(product_total) AS u_total FROM order_mid_product WHERE order_id='$order_id'");
				$user_total_data = mysqli_fetch_array($user_total);
				$u_total = $user_total_data['u_total'];
				
				$th = mysqli_query($connection,"UPDATE orders_mid SET amount='$u_total' WHERE id='$order_id'");
				
			echo '   <ul class="nav nav-tabs tabs-left" role="tablist" style="list-style-type: none;">';
				$store_total = mysqli_query($connection,"SELECT * FROM order_mid_product WHERE order_id='$order_id'");
				while($store_total_data = mysqli_fetch_array($store_total))
				{
					$pname = $store_total_data['product_name'];
					$bata = mysqli_query($connection,"SELECT * FROM products WHERE product_name='$pname'");
					$bata_data = mysqli_fetch_array($bata);
					
					
					
					echo '<tr>
						<td style="font-size:15px;"><li role="presentation"><a href="#'.$bata_data['id'].'" aria-controls="'.$bata_data['id'].'" role="tab" data-toggle="tab">'; echo $store_total_data['product_name']; echo '</li></td>
						<td style="font-size:15px;">'; echo $store_total_data['product_price']; echo '</td>
						<td style="font-size:15px;">'; echo $store_total_data['product_quantity']; echo '</td>
						<td style="font-size:15px;">'; echo $store_total_data['product_total']; echo '</td>
					</tr>';
				}
				echo '</ul></tbody></table>';
				
				
  echo'
   <table border="2" width="100%">
            <tr>
			  <td align="left"><nobr>Total:</nobr></td>
              <td align="right"><nobr>'; echo $u_total;  echo '<nobr></td>
			</tr>';
			
			if($delivery!='0') { 
			 echo '<tr>
			  <td align="left"><nobr>Delivery Charges:</nobr></td>
              <td align="right"><nobr>'; echo $delivery; $u_total = $u_total+$delivery; echo '<nobr></td>
			</tr>';
			 } 
			
			if($discount!='0') { 
			 echo '<tr>
			  <td align="left"><nobr>Discount(';  echo $discount; echo '%):</nobr></td>
              <td align="right"><nobr>'; $dis = $discount/100; $b=$u_total*$dis; $u_total = $u_total-$b; echo $b; echo '<nobr></td>
			</tr>';
			}
			
			echo '<tr>
              <td align="left"><nobr>CGST @ 2.5%:</nobr></td>
              <td align="right"><nobr>';  $l=$u_total*0.025; echo $l; echo '<nobr></td>
            </tr>
            <tr>
              <td align="left"><nobr>SGST @ 2.5%:</nobr></td>
              <td align="right"><nobr>';  $p=$u_total*0.025; echo $p; echo '<nobr></td>
            </tr>
           
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left"><nobr>Total Amount:</nobr></td>
              <td align="right"><nobr>';  $w = $u_total+$l+$p; echo round($w); echo'<nobr></td>
            </tr>
			
          </table>
';
				
		
       
?>