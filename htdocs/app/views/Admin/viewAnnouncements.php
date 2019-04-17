<html>
    <head>
        <title>Announcements</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

    <div class="container">

        <form action='' method="post" enctype="multipart/form-data">

                <div>
                    <h1 class="createAccountText">Announcements</h1>
                    <br>
                </div>

                <!----------- Table to display all announcements ----------->
                <div>
                    <table border="2px" style="width:100%" cellpadding="10px" cellspacing="10px">
                        <tr>
                            <th>Name</th>
                            <th>Message</th>                            
                            <th style="padding-left: 20px">Modify</th>
                        </tr>
                        <?php 
                        // Create a table row for each
                        foreach($data as $row) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['announcement_name'];?></td>
                            <td><?php echo $row['announcement_message'];?></td>
                            <!--<td><?php echo $row['announcement_date'];?></td>-->
                            <td width="11%">                              
                                <a href="../admin/deleteAnnouncement?id=<?=$row['announcement_id'];?>" onclick="return confirm('Are you sure you want to delete this announcement?')" style="padding-left: 16px">Delete</a>
                            </td>
                        </tr>
                        <?php
                         }
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>