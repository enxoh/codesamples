<html>
    <head>
        <title>Edit Product</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

    <div class="container">

        <form action='' method="post" enctype="multipart/form-data">

                <div>
                    <h1 class="createAccountText">Edit Product</h1>
                </div>

                <div class="input-group">
                    <div class = "col-xs-4 mycustomspace">
                        <label>Product Name<input type="text" value="<?php echo ($data['product']["product_name"])?>" required name="Product_Name" class="form-control labelfnln"/></label>
                    </div>
                </div>

                <!-- Get categories for category table -->
                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Category</label>
                    <select name="Product_Category">
                      <?php                                            
                      foreach ($data['category'] as $row) {
                        $category_name = $row['category_name']; 
                        $selected = $data['product']["category"];                            
                        echo "<option value='$category_name' ".($row['category_name']==$selected?'selected ':'').">$category_name</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Description</label>
                      <!--<input type="text" name="Product_Description" style="height: 250px" class="form-control input-normal label2" />-->
                      <textarea type="text" name="Product_Description" required maxlength="500 "style="height: 250px" class="form-control input-normal label2"><?php echo ($data['product']["product_description"])?></textarea> 
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="Quantity">Quantity</label>
                      <input type="number" required name="Product_Quantity" value="<?php echo ($data['product']["product_quantity"])?>" min="0" class="form-control input-normal label2" />
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Product Status<small> (1 = Available. 0 = Unavailable)</small> </label>
                      <input type="number" required min="0" max="1" value="<?php echo ($data['product']["product_status"])?>" placeholder="Enter 1 for available. Enter 0 for unavailable." name="Product_Status" class="form-control input-normal label2" />
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Product Price</label>                    
                      <input type="number" name="Product_Price" value="<?php echo ($data['product']["product_price"])?>" required step="0.01" min="0" class="form-control input-normal label2" />
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Sale Price</label>                    
                      <input type="number" step="0.01" min="0" placeholder="Leave blank if not on sale." value="<?php echo ($data['product']["sale_price"])?>" name="Product_Sale" class="form-control input-normal label2" />
                  </div>
                </div>

                <!-- Product image 
                <div class="input-group">
                    <div class = "col-xs-4 mycustomspace">
                    	<label for="code">Product Image</label>
                		<input type="file" name="file"/>     	
                </div>
              -->

	            <div>
	                <br>
	                <input type="submit" name="action" class="btn btn-primary" value="Edit Product" required>
                  <a href="../admin/viewProducts" class="btn btn-dark" role="button">Back to Products</a>
	            </div>
            </form>
        </div>
    </body>
</html>