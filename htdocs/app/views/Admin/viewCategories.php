<html>
    <head>
        <title>Categories</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

    <div class="container">

        <form action='' method="post" enctype="multipart/form-data">

                <div>
                    <h1 class="createAccountText">Categories</h1>
                    <br>
                </div>

                <!----------- Table to display all announcements ----------->
                <div>
                    <table class="table" border="2px" style="width:100%" cellpadding="10px" cellspacing="10px">
                        <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>                          
                            <th style="padding-left: 20px">Modify</th>
                        </tr>
                        <?php 
                        // Create a table row for each
                        foreach($data as $row) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['category_name'];?></td>
                            <td><?php echo $row['category_description'];?></td>
                            <td width="11%">                              
                                <a href="../admin/deleteCategory?id=<?=$row['category_id'];?>" onclick="return confirm('Are you sure you want to delete this category <?php echo $row['category_name'];?>?')" style="padding-left: 16px">Delete</a>
                            </td>
                        </tr>
                        <?php
                         }
                        ?>
                    </table>
                    <a href="../admin/addCategory" class="btn btn-primary" role="button">Add Category</a>
                    <a href="../admin/index" class="btn btn-dark" role="button">Back to Admin Control Center</a>
                </div>
            </form>
        </div>
    </body>
</html>