<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/style.css">  
	</head>
	<body>
		
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
			<div class="card-group">
				<?php
					foreach ($data['recentProducts'] as $row) {		
				?>
				<div class="card" style="width: 18rem;">
					<img src="../images/products/<?php echo $row['product_image']; ?>" class="img-responsive" />
					<div class="card-body">
					<h5 class="card-title">TODO: FILL WITH PROD TITLE</h5>
					<p class="card-text">TODO: FILL WITH PRODUCT DESC</p>				
					</div>
				</div>
				<?php
	            	} // end for loop
	            ?>
			</div>
		</div>





	</body>
</html>