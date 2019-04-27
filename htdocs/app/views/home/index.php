<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/style.css">  
	</head>
	<body>
		<!--
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="slider">
						<div><img src="https://www.w3schools.com/w3css/img_lights.jpg"></div>
						<div><img src="https://www.w3schools.com/w3css/img_lights.jpg"></div>

					</div>					
				</div>
			</div>
		</div>
		-->
		
		<div class="container">			
			<div id="announce" class="carousel slide" data-ride="carousel">
				<ul class="carousel-indicators">
					<li class="active" data-target="#announce" data-slide-to="0"></li>
					<li data-target="#announce" data-slide-to="1"></li>
					<li data-target="#announce" data-slide-to="2"></li>
				</ul>

				<!-- Images --> 
				
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="https://www.w3schools.com/w3css/img_lights.jpg" width="1100" height="400">
					</div>
					<div class="carousel-item">
						<img src="https://www.w3schools.com/w3css/img_lights.jpg" width="1100" height="400">
					</div>
					<div class="carousel-item">
						<img src="https://www.w3schools.com/w3css/img_lights.jpg" width="1100" height="400">
					</div>
				</div>

				<!-- Previous/Next -->
				
				<a class="carousel-control-prev" href="#announce" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
  				</a>
				<a class="carousel-control-next" href="#announce" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				</a>
			</div>
		</div>
		<br>		

		<!-- Recent Products -->		
		<div class="container">
			<label style="color: DarkBlue;	font-size: 25px; font-weight:350; text-align: center" >Recently Added Products</label><br>
			<div class="card-group">
				<?php
					$i = 0;

                    foreach ($data['recentProducts'] as $row) {
                        if($i > 1 && ($i + 1)% 4 == 0){
                            echo '</div>';
                            $i = 0;
                            echo '<div class="card-group">';
                        }	
				?>
				<div class="card" style="width: 10rem;">					
					<a href="../catalog/details/<?php echo $row['product_id'];?>">
						<img style="height: 200px; width: 200px" src="../images/products/<?php echo $row['product_image']; ?>" class="img-responsive" />
					</a>
					<div class="card-body">
					<h5 class="card-title"><?php echo $row['product_name']; ?></h5>
					<p class="card-text"><?php echo $row['product_description']; ?></p>	
					<p class="card-text" style="font-size: 17px; font-weight: bold;">$<?php echo $row['product_price']; ?></p>	
					</div>
				</div>
				<?php
					$i++;
	            	} // end for loop
	            ?>
			</div>
		</div>

		<!-- Products 
		<div class="container">
			<h4 style="color: DarkBlue; font-size: 25px; font-weight: 400;text-align:center;">Recently Added</h4>
			<?php
			foreach ($data['recentProducts'] as $row) {		
			?>
			<div class="col-md-4 game">
				<div class="game-price"><?php echo $row['product_price'] ?>	</div>	
				<img src="../images/products/<?php echo $row['product_image']; ?>" class="img-responsive" />	
				<div class="game-title"><?php echo $row['product_name'] ?></div>			
			</div>
			<?php
            }
            ?>
		</div>-->

		<!-- Randdom Categories -->		
		<div class="container">
			<br>
			<label style="color: DarkBlue;	font-size: 25px; font-weight:350; text-align: center" >Explore By Category</label><br>
			<div class="card-group">
				<?php
					$i = 0;

                    foreach ($data['randomCategories'] as $row) {
                        if($i > 1 && ($i + 1)% 4 == 0){
                            echo '</div>';
                            $i = 0;
                            echo '<div class="card-group">';
                        }	
				?>
				<div class="card text-center border-0" style="width: 18rem; ">
					<a href="">
					<img style="height: 200px; width: 200px" src="../images/categories/<?php echo $row['category_image']; ?>" class="img-responsive" /></a>
					<div class="card-body">
					<h5 class="card-title"><?php echo $row['category_name']; ?></h5>
					<!--<p class="card-text"><?php echo $row['category_description']; ?></p>	-->				
					</div>
				</div>
				<?php
					$i++;
	            	} // end for loop
	            ?>
			</div>
		</div>
	</body>
</html>