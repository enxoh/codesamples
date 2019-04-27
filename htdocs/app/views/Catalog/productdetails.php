<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/style.css">  
	</head>
	<body>
		
		<!-- Product Description -->
		<div class="container">		
			<br>
			<div style="background: #333;
    color: #fff; padding:6px; width: 100%;">
    			<h3 style="font-size: 18px; text-align: left;">Product Details</h3>
			</div>		
			<div class="row details">				
			    <div class="col-md-4">	
			    	<br>			    			    	
			        <img src="/images/products/<?php echo $data['products']['product_image']; ?>" alt="Product Image" style="width: 238px; height: 238px; ">
			    </div>
			    <div class="col-md-6">
			    	<br>
			    	<div>
			    		<p style="font-size: 22px; font-weight: bold"><?php echo $data['products']['product_name'];?></p>   
			    	</div>
			    	<hr style="border-top: 1px solid #3d484d;">

			    	<!-- Checks if there is a sale -->
			        <?php if($data['products']['sale_price'] > 0.00){	        	

			    	
			    	?>
			        <div>
			        	<p style="font-size: 18px; font-weight: bold; text-decoration: line-through;"><small>Was: </small>$<?php echo $data['products']['product_price'];?></p>        
			        </div>
			    	<div>
			    		<p style="font-size: 23px; font-weight: bold; color: red;">$<?php echo $data['products']['sale_price'];?><small style="font-size: 16px;"><br>
			    			Save $<?php echo ($data['products']['product_price'] - $data['products']['sale_price']);?>			    			
			    		</small></p>         
			        </div>

			        <!-- Else if no sale -->
			        <?php
			    	}
			    	else{

			    	?>
			    	<div>
			        	<p style="font-size: 23px; font-weight: bold">$<?php echo $data['products']['product_price'];?></p>        
			        </div>
			        <?php
			    	}
			    	?>
			        <div>
			        	<p><?php echo $data['products']['product_description'];?></p>    
			        </div>
			        <div>
			            <form action="" method="post">
			                Quantity: <input type="number" name="item_quantity" value="1">
			                <button class="btn btn-primary" type="submit">Add to Cart</button>
			            </form>
			        </div>
			    </div>
			</div>
		</div>



		<br>		
	</body>
</html>