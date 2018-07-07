

<!DOCTYPE html>
<html>
<?php include '../config.php';?>

      <!-- /.row -->
      <!-- Main row -->
      
       <?php error_reporting(E_ERROR | E_PARSE);?>

          <!-- Logo -->
        
					<?php  

//connect to the database 

// 

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            mysqli_query($connection,"INSERT INTO products (product_name, product_price,category) VALUES 
                ( 
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."',
                    '".addslashes($data[3])."'
                    
                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,2000,",","'")); 
    // 

    //redirect 
    

} 

?> 
					
					
					  <!-- general form elements -->
					
						<!-- /.box-header -->
						<!-- form start -->
						
<?php if (!empty($_GET['success'])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <button type="submit" name="submit" class="btn btn-success">Upload</button>
</form> 
					  
					  
					
					
					
	
