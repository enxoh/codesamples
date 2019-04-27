<html>
    <head>
        <title>Send Newsletter</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

    <div class="container">

        <form action='' method="post" enctype="multipart/form-data">

                <div>
                    <h1 class="createAccountText">Send Newsletter</h1>
                </div>

                <!--
                <div class="input-group">
                    <div class = "col-xs-4 mycustomspace">
                        <label>Recipient<input type="text" required name="Email_Recipients" class="form-control labelfnln"/></label>
                    </div>
                </div>
                -->

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Email Subject</label>
                      <input type="text" name="Email_subject" required class="form-control input-normal label2" />
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Email Body</label>
                      <textarea type="text" style="width: 600px; height: 200px" name="Email_body" required class="form-control input-normal label2">
                      </textarea>
                  </div>
                </div>

	            <div>
	                <br>
	                <input type="submit" name="action" class="btn btn-primary" value="Send Newsletter" required>
                    <a href="../admin/Newsletter" class="btn btn-dark" role="button">Back to Email List</a>
	            </div>
            </form>
        </div>
    </body>
</html>