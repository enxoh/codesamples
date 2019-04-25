<html>
    <head>
        <title>Newsletter</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

    <div class="container">

        <form action='' method="post" enctype="multipart/form-data">

                <div>
                    <h1 class="createAccountText">Newsletter</h1>
                    <br>
                </div>

                <!----------- Table to display all announcements ----------->
                <div>
                    <table class="table" border="2px" style="width:100%" cellpadding="10px" cellspacing="10px">
                        <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>           
                        </tr>
                        <?php 
                        // Create a table row for each
                        foreach($data as $row) {                        
                        ?>
                        <tr>
                            <td><?php echo $row['first_name'] . ' ' . $row['last_name'];?></td>
                            <td><?php echo $row['email'];?></td>
                        </tr>
                        <?php
                         }
                        ?>
                    </table>
                    <a href="../admin/createNewsletter" class="btn btn-primary" role="button">Create Newsletter</a>
                    <a href="../admin/index" class="btn btn-dark" role="button">Back to Admin Control Center</a>
                </div>
            </form>
        </div>
    </body>
</html>