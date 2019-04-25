<html>
    <head>
        <title>Products</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

    <div class="container">

        <form action='' method="post" enctype="multipart/form-data">

                <div>
                    <h1 class="createAccountText">View Products</h1>
                    <br>
                </div>

                <!----------- Table to display all products ----------->
                <div>
                    <table class="table" border="2px" style="width:100%" cellpadding="10px" cellspacing="10px">
                        <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>   
                            <th>Quantity</th> 
                            <th>Status</th>
                            <th>Price</th>
                            <th>Sale</th> 
                            <th>Date Added</th>                       
                            <th style="padding-left: 20px">Modify</th>
                        </tr>
                        <?php 
                        // Create a product table
                        foreach($data as $row) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['product_name'];?></td>
                            <td><?php echo $row['category'];?></td>
                            <td><?php echo $row['product_description'];?></td>
                            <td><?php echo $row['product_quantity'];?></td>
                            <td><?php echo $row['product_status'];?></td>
                            <td><?php echo $row['product_price'];?></td>
                            <td><?php echo $row['sale_price'];?></td>
                            <td><?php echo $row['insert_date'];?></td>
                            <td width="11%">  
                                <a href="../admin/editProduct?id=<?=$row['product_id'];?>" name="">Edit</a>                                       
                                <a href="../admin/deleteProduct?id=<?=$row['product_id'];?>" onclick="return confirm('Are you sure you want to delete product <?php echo $row['product_name'];?>?')" style="padding-left: 16px">Delete</a>
                            </td>
                        </tr>
                        <?php
                         }
                        ?>

                    </table>
                    <a href="../admin/index" class="btn btn-dark" role="button">Back to Admin Control Center</a>
                </div>
            </form>
        </div>
    </body>
</html>