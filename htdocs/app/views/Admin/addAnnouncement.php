<html>
    <head>
        <title>Create Announcement</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

    <div class="container">

        <form action='' method="post" enctype="multipart/form-data">

                <div>
                    <h1 class="createAccountText">Create New Announcement</h1>
                </div>

                <div class="input-group">
                    <div class = "col-xs-4 mycustomspace">
                        <label>Announcement Name<input type="text" required name="Announcement_Name" class="form-control labelfnln"/></label>
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Announcement Message</label>
                      <input type="text" name="Announcement_Msg" required class="form-control input-normal label2" />
                  </div>
                </div>

                <!-- Announcement image -->
                <div class="input-group">
                    <div class = "col-xs-4 mycustomspace">
                    	<label for="code">Announcement Image</label>
                		<input type="file" name="img" required/>     	
               		</div>
                    <div class="col-xs-4">
                    	<!--<label>&nbsp<input type="submit" name="Sumbit" id"Submit" value="Upload" /></label>		-->				
                	</div>
                </div>

	            <div>
	                <br>
	                <input type="submit" name="action" class="btn btn-primary" value="Create Announcement" required>
	            </div>
            </form>
        </div>
    </body>
</html>